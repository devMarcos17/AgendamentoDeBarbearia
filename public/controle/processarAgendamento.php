<?php

use Marcos\Modelo\Agendamento;
use Marcos\Modelo\ExecucaoAgendamento;
use Marcos\Modelo\Servico;
use Marcos\Modelo\Usuario;

require_once __DIR__ . "/../../config/conexao.php";
require_once __DIR__  . "/../../vendor/autoload.php";

$data = new DateTimeImmutable();
if($_SERVER["REQUEST_METHOD"]){
    $idUsuario = $_POST["id"];
    $idAgendamento = $_POST["idAgendamento"];


    $execucaoAgendamento = new ExecucaoAgendamento($conexao);

    $marcar = $execucaoAgendamento->marcarAgendamento($idUsuario, $idAgendamento);

    if($marcar){
        header("Location: /paginas/paginaInicial.php?agendamentoMarcado");
        exit;
    }
    header("Location: /paginas/paginaInicial.php?falhaAoMarcarAGendamento");
        exit;
}
?>