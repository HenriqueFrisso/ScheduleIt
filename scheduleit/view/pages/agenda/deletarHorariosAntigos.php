<?php
error_reporting(E_ALL); //REPORTAR ERROS
ini_set('display_errors', 1); //REPORTAR ERROS

require_once '../../../model/agendaDAO.php';
require_once '../../../model/notificacaoDAO.php';
require_once '../../../model/conexaobd.php';

$con = conectarBD();
$currentDate = new DateTime();
$currentDate = $currentDate->format('Y-m-d');

echo $currentDate;
deletarHorariosAntigos($con, $currentDate);
deletarNotificacoesAntigas($con, $currentDate);
?>