<?php
    if(!isset($_SESSION)) {
        session_start();
    }
?>

<html lang="pt-BR"><head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sala de agendamento</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link href="../../styles/css/cover.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="js.js"></script>

</head>

<body class="bg-light">

<?php include "../parts/header.php"; 
      require_once "../../../model/conexaobd.php";

//Conexao no método PDO (?)


              require_once '../../../model/conexaobd.php';
  
            try {
              $con = conectarBDPDO();
              $sth = $con->prepare("SELECT * FROM Sala WHERE idSala=".$_GET["idSala"].";");
              $sth->setFetchMode(PDO:: FETCH_OBJ);
              $sth->execute();

              if ($sth->rowCount() > 0) {
                  $i=1;
                  while($row=$sth->fetch()) {
                      $img = base64_encode($row->imgLogo);
                      $nomeFantasia = $row->nomeFantasia;
                      $idSala = $row->idSala;
                      $descricao = $row->descricao;
                      $cep = $row->cep;
                      $cidade = $row->cidade;
                      $estado = $row->estado;
                      $bairro = $row->bairro;
                      $rua = $row->rua;
                      $numero = $row->numero;
                      $complemento = $row->complemento;
                      $email = $row->email;
                      $telefone = $row->telefone;
                      $idProprietario = $row->idProprietario;

                  }
              } 
            } catch(PDOException $e) {
                echo "Error: ". $e->getMessage();
            }
  
?>

<div class="container border rounded bg-white p-0 mt-5 rounded">
  <div>
    <div>
      <div  class="d-flex align-items-center p-3 text-white-50 bg-info rounded">
        <?php
          if($img) {
            echo "<img id='imgShow' class='rounded' src='data:image/jpeg;base64,$img' alt='' width='160' height='160'>";
          } else {
            echo "<img id='imgShow' class='rounded' src='../../styles/blank.png' alt='' width='160' height='160'>";
                      }
          if ($_SESSION["id"] == $idProprietario) {
            echo "<div class='lh-100 me-auto ms-2'>
                    <a href='../editarSala/editarSala.php?idSala=$idSala'><button type='button' class='btn btn-light mb-2'>Editar</button></a>
                  <div class=''>
                    <a href='../teste/comprarSala.php?idSala=$idSala'><button type='button' class='btn btn-light'>Publicar</button></a>
                  </div>
                    <form method='post' name='FormEditarImgLogo' action='../../../controller/config/attSala.php' enctype='multipart/form-data'>
                      <div class=''>
                        <label for='imgLogo' class='form-label'><small>Editar Logo</small></label>
                        <input name='imgLogo' class='form-control form-control-sm' id='imgLogo' type='file'>
                      </div>
                    </form>
                  </div>";
              }
        ?>


      </div>  
      <div class="card-body p-0 pt-3">
        <h4 class="card-title text-center"><?php echo $nomeFantasia ?></h4> 
        <hr>
        <div class="px-4 d-flex justify-content-between">
          <div class="col-3 border rounded p-2 me-2 bg-light">
            <p class="card-text"> <?php echo $descricao ?> <br><br> <?php echo "CEP: $cep. $cidade - $estado. $bairro, $rua, $numero, $complemento."?> <br><br> Horário de atendimento <br><br> <?php echo "Email: $email" ?> <br> <?php echo "Telefone: $telefone" ?> </p> 
          </div>
        </div>

            <!--
            <div>
              <div class="pt-5">
                <fieldset class="rating">
                  <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                  <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                  <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                  <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                  <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                </fieldset>
              </div>
            </div>
            -->
          </div>
          
        </div>
      </div>
      <hr class="my-4">
    </div>
  </div>
</div>
    
  

    <?php include "../parts/footer.php"; ?>
  </body>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" 
    crossorigin="anonymous"></script>

</html>