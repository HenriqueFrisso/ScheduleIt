<?php
    require_once '../../../model/conexaobd.php';

function carregarFuncionarios($idSala){
    require_once '../../../controller/funcionarioDisplay.php';
    if (isset($_SESSION['id']) && $_SESSION['id']==$_GET['idSala']) {
        $removerFuncionarioButton = "<button class='m-0 p-0 btn btn-link text-decoration-none cornerButton text-danger' onclick='removerFuncionario(this)'><i class='bi bi-x-circle-fill'></i></button>";
    } else {
        $removerFuncionarioButton = "";
    }
    try {
        $con = conectarBDPDO();
        $sth = $con->prepare("SELECT * FROM funcionario WHERE idSala=".$_GET["idSala"].";");
        $sth->setFetchMode(PDO:: FETCH_OBJ);
        $sth->execute();
        if ($sth->rowCount() > 0) {
            $i=1;
            while($row=$sth->fetch()) {
              if(!isset($row->foto)) {
                $foto = addslashes('../../styles/blank.png');
                $imgTag = "<img class='rounded imgsala me-2' style='padding: 0!important; width: 80px; height: 80px;'  src='$foto'>";
              } else {
                $foto = base64_encode($foto);
                $imgTag = "<img class='rounded imgsala me-2' style='padding: 0!important; width: 80px; height: 80px;'  src='data:image/png;base64,$foto'>";
              }
              $i++;
              echo  "<div class='funcionarioDisplay border rounded bg-white me-3 mb-3 p-0'>
                      <div class='m-0 p-2 d-flex align-items-center gallery_product' onclick='redirectAgenda($row->idFuncionario)'>
                          <div class='d-inline'>"
                            ,$imgTag,
                          "</div>
                          <div class='d-inline lh-1'>
                              <span style='max-width: 220px;' class='d-inline-block text-truncate mb-1 fw-bold title-card'></span>
                          </div>
                      </div>",$removerFuncionarioButton,
                    "</div>";
            }
        } else {
            echo  "<br><div class='alert alert-danger col-md-2 text-center mx-auto' role='alert'>
                      Nenhum resultado encontrado.
                  </div>";
        }
      } catch(PDOException $e) {
        echo "Error: ". $e->getMessage();
      }
    }

?>