<?php
    include('../../../controller/protect.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ScheduleIt - Minhas Salas</title>
    <script src="script.js"></script>
    <link href="../../styles/css/cover.css" rel="stylesheet">
</head>
<body class="bg-light">
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="plus" viewBox="0 0 16 16">
            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
        </symbol>
    </svg>

    <!-- HEADER -->
    <?php 
        include '../parts/header.php';
        require_once "../../../controller/minhasSalas/funcoesMinhasSalas.php";
        require_once "../../../controller/mensagem.php";
        mensagem(null); // Exibir a mensagem de ERRO caso OCORRA
    ?>

    <div class="container pt-3">
        <div class="row justify-content-center">
            <?php
                carregarMinhasSalas();
            ?>
        </div>
    </div>

    <br><div class='col-md-2 text-center mx-auto' role='alert'>
        <a href='../cadastroSala/cadastroSala.php'>
            <button type='button' class='btn btn-primary'>
                + Adicionar sala
            </button>
        </a>        
    </div>
    
    
    <!-- FOOTER -->
    <?php include '../parts/footer.php';?>
</body>
</html>