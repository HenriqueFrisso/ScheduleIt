<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ScheduleIt - Home</title>
</head>
<body class="bg-light">
    <!-- HEADER -->
    <?php include '../parts/header.php';?>

    <?php
        // Exibir caso não ache nenhum departamento
        //if (isset($mensagem)) {  // Verifica se tem mensagem de ERRO 
            
            //echo "<br><div class='alert alert-danger col-md-2 text-center mx-auto' role='alert'>
            //         Nenhum departamento encontrado.
            //     </div>";
                
        //}


        //Conexao no método PDO (?)

        if(isset($_POST["submit"])) {
            try {
                $con = new PDO("mysql:host=localhost;dbname=scheduleit",'root','');
                $str = $_POST["busca"];

                $search_string = "SELECT * FROM sala WHERE ";
                $display_words = "";
                                    
                // format each of search keywords into the db query to be run
                $keywords = explode(' ', $str);
                $multiple = FALSE;
                foreach ($keywords as $word){
                    if (strlen($word) > 3){
                        $search_string .= "nomeFantasia LIKE '%".$word."%' OR ";
                        $display_words .= $word.' ';
                        $multiple = TRUE;
                    }
                };

                if ($multiple == TRUE){
                $search_string = substr($search_string, 0, strlen($search_string)-4);
                $display_words = substr($display_words, 0, strlen($display_words)-1);
                echo $search_string;

                $sth = $con->prepare("$search_string");

                $sth->setFetchMode(PDO:: FETCH_OBJ);
                $sth->execute();
                
                if ($sth->rowCount() > 0) {
                    $i=1;
                    while($row=$sth->fetch()) {
                    ?>
                        <div class="container pt-3">
                            <div class="row justify-content-center">
                                <div style="width: 22rem; height: 15rem;" class="d-flex border rounded bg-white mr-2 mb-2">
                                    <a><?php echo $row->nomeFantasia; ?></a>
                                    <a><?php echo $row->estado; ?></a>
                                    <a><?php echo $row->cidade; ?></a>
                                    
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    } else {
                        echo "<br><div class='alert alert-danger col-md-2 text-center mx-auto' role='alert'>
                            Nenhum resultado encontrado.
                        </div>";
                    }
                } } catch(PDOException $e) {
                    echo "Error: ". $e->getMessage();
                }

                } if ($multiple == FALSE) {
                    echo "<br><div class='alert alert-danger col-md-2 text-center mx-auto' role='alert'>
                    Nenhum resultado encontrado.
                </div>";
                }
        
    ?>

    <!--
    <div class="container pt-3">
        <div class="row justify-content-center">
            <div style="width: 22rem; height: 15rem;" class="d-flex border rounded bg-white mr-2 mb-2">
        </div>
        
    </div>
    -->
    
    
    <!-- FOOTER -->
    <?php include '../parts/footer.php';?>
</body>
</html>