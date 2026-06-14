<?php

use Marcos\Modelo\ExecucaoServico;
use Marcos\Modelo\Servico;

require_once __DIR__ . "/../../config/conexao.php";
require_once __DIR__  . "/../../vendor/autoload.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $id = $_POST["id"];

    $nome = $_POST["nome"];

    $preco = $_POST["preco"];

    $duracao = $_POST["duracao"];

    $imagem = $_POST["imagem"]["name"];
    $tmp = $_POST["imagem"]["tmp_name"];
    $destino = "../uploads/" . $imagem;

    move_uploaded_file($tmp, $destino);

    $servico = new Servico($nome, $preco, $duracao, $imagem, $id);

    $execucaoServico = new ExecucaoServico($conexao);

    $atualizar = $execucaoServico->atualizarServico($servico);
    if ($atualizar) {
        header("Location: /paginas/paginaInicial.php?ServicoAtualizadoComSucesso!");
        exit;
    }
    header("Location: /paginas/paginaAtualizarServico.php?falhaAoAtualizarServico!");
    exit;
}
