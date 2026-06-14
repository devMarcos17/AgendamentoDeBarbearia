<?php

use Marcos\Modelo\ExecucaoAgendamento;

require_once __DIR__ . "/../../config/conexao.php";
require_once __DIR__  . "/../../vendor/autoload.php";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    
  $idUsuario = $_POST["id"];
  $idAgendamento = $_POST["idAgendamento"];

  $execucaoAgendamento = new ExecucaoAgendamento($conexao);

  $desmarcar = $execucaoAgendamento->desmarcarAgendamento($idUsuario, $idAgendamento);
  if($desmarcar){
    header("Location: /paginas/paginaInicial.php?agendamentoDesmarcado");
    exit;
  }
  header("Location: /paginas/paginaInicial.php?falhaAoDesmarcar");
  exit;
}
?>