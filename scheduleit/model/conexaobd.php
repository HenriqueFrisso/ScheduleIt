<?php

function conectarBD() {
    $conexao = mysqli_connect("127.0.0.1:3306", "root", "", "scheduleit" ) 
                 or die ("Erro ao conectar no banco de dados");


    // PARA RESOLVER PROBLEMAS DE ACENTUAÇÃO 
    // Converte CODIFICAÇÃO para UTF-8
    mysqli_query($conexao, "SET NAMES 'utf8'");
    mysqli_query($conexao, "SET character_set_connection=utf8");
    mysqli_query($conexao, "SET character_set_client=utf8");
    mysqli_query($conexao, "SET character_set_results=utf8");
    
    return $conexao;    
}

function conectarBDPDO() { 
    $con = new PDO("mysql:host=127.0.0.1:3306;dbname=scheduleit",'root','');
    return $con;
}

?>

