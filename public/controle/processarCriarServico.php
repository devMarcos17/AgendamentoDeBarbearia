<?php

use Marcos\Modelo\ExecucaoServico;
use Marcos\Modelo\Servico;

require_once __DIR__ . "/../../config/conexao.php";
require_once __DIR__  . "/../../vendor/autoload.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nome = $_POST["nome"];

    $preco = $_POST["preco"];

    $duracao = $_POST["duracao"];

    $imagem = $_FILES["imagem"]["name"];
    $tmp = $_FILES["imagem"]["tmp_name"];
    $destino = "../uploads/" . $imagem;

    move_uploaded_file($tmp, $destino);

    $servico = new Servico($nome, $preco, $duracao, $imagem);

    $execucaoServico = new ExecucaoServico($conexao);

    $criar = $execucaoServico->criarServico($servico);

    if ($criar) {
        header("Location: /paginas/paginaInicial.php?servicoCriado");
        exit;
    }
    header("Location: /paginas/paginaCriarServico.php?falhaAoCriarServico");
    exit;
}
