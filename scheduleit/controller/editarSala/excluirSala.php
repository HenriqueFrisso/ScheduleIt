<?php
include('../../controller/protect.php');
require_once '../funcoesUteis.php';
require_once '../../model/conexaobd.php';
require_once '../../model/salasDAO.php';

$conexao=conectarBD();

excluirSala($conexao, $idSala);
    header("Location:../../view/pages/minhasSalas/minhasSalas.php?msg=0&msgType=2");
?>