<?php
    if(!isset($_SESSION)) {
        session_start();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>ScheduleIt - Agenda</title>
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <link href="../../styles/css/cover.css" rel="stylesheet">
  <!-- Plugin CSS -->
  <link href="../../../resources/libraries/vanilla-calendar-2.1.1/build/vanilla-calendar.min.css" rel="stylesheet">
  <!-- Plugin JS -->
  <script src="../../../resources/libraries/vanilla-calendar-2.1.1/build/vanilla-calendar.min.js" defer></script>
  <script src="js.js"></script>
</head>
<body class="bg-light">
    <?php 
      if (!isset($_GET['dataDMA'])) {
        $currentDate = new DateTime();
        $_GET['dataDMA'] = $currentDate->format('Y-m-d');

      }
      include "../parts/header.php";
      require_once "../../../controller/agenda/agenda.php";
    ?>
      <div class="container">
        <?php
        /*
          if($dados['imagem']) {
              echo "<img class='rounded' src='data:foto/jpeg;base64,".$dados['imagem']."' width='50' height='50'>";
          } else {
              echo "<img class='rounded' src='../../styles/blank.png' width='50' height='50'>";
          }  
        */
        ?>  
        <div class="bg-secondary rounded mb-2 text-center mx-auto title-cards">
          <p class="p-2 m-0 font-weight-bold text-white">Agenda - <?php echo $dados['nome']; ?></p>
        </div>
        <div class="d-flex justify-content-center">
          <div id="calendar" style="height: 400px;" class="border vanilla-calendar vanilla-calendar_default calendar-info me-2">
            <script>
              document.addEventListener('DOMContentLoaded', () => {
                const calendar =  new VanillaCalendar('#calendar', {
                  actions: {
                    clickDay(event, dates) {
                      window.location.href = "agenda.php?id="+<?php echo $_GET['id'];?>+"&dataDMA="+dates;
                    },
                  },
                  settings: {
                    lang: 'pt-BR',
                    selected: {
                      dates: ['<?php echo $_GET['dataDMA'];?>'],
                    },
                  },
                  type: 'default',
                });
                calendar.init();
              });
            </script>
          </div>
          <div style="height: 400px;" class="overflow-auto calendar-info bg-white border lh-1">
            <div class="">
              <table class="table table-hover m-0 p-0">
                <thead class="">
                  <tr>
                    <th scope="col">Horário</th>
                    <th scope="col">Nome</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class=""> 
                  <?php
                    $con = conectarBDPDO();
                    $sth = $con->prepare("SELECT * FROM horario WHERE idFuncionario=".$_GET['id']." AND dataDMA='".$_GET['dataDMA']."';");
                    $sth->setFetchMode(PDO:: FETCH_OBJ);
                    $sth->execute();

                    $arr = array();
                    while($row=$sth->fetch()) {
                      array_push($arr, $row->idHorario);
                    }

                    
                    $h=7;
                    for ($i=1; $i<=9; $i++) {
                      if (in_array($i, $arr)) {
                        echo "<tr class='table-danger'>
                                <td class='align-middle' scope='row'>".$h.":00 - ".($h+1).":00</td>
                                <td class='align-middle'>Nome</td>
                                <td class='align-middle text-end'><button class='btn btn-sm btn-outline-danger' onclick='post(".$_GET['id'].",".$_SESSION['id'].",\"".$_GET['dataDMA']."\",$i,2)'>Reservado</button></td>
                                <td class='p-0 align-middle'><button class='btn btn-sm btn-outline-secondary'><i class='bi bi-calendar-x'></i></button></td>
                              </tr>";
                      } else {
                        echo "<tr>
                                <td class='align-middle' scope='row'>".$h.":00 - ".($h+1).":00</td>
                                <td class='align-middle'></td>
                                <td class='align-middle text-end'><button class='btn btn-sm btn-outline-success' onclick='post(".$_GET['id'].",".$_SESSION['id'].",\"".$_GET['dataDMA']."\",$i,1)'>Agendar</button></td>
                                <td class='p-0 align-middle'><button class='btn btn-sm btn-outline-secondary'><i class='bi bi-calendar-x'></i></button></td>
                              </tr>";
                      }
                      if ($i==4) {
                        $h+=3;
                      } else {
                        $h++;
                      }
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    <?php include "../parts/footer.php"; ?>
  </body>
</html>
