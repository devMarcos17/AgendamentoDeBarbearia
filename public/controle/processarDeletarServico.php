<?php

use Marcos\Modelo\ExecucaoServico;

require_once __DIR__ . "/../../config/conexao.php";
require_once __DIR__  . "/../../vendor/autoload.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];

    $execucaoServico = new ExecucaoServico($conexao);

    $deletar = $execucaoServico->deletarServico($id);

    if ($deletar) {
        header("Location: /paginas/paginaInicial.php?servicoDeletado");
        exit;
    }
    header("Location: /paginas/paginaDeletarServico.php?falhaAoDeletar");
    exit;
}
