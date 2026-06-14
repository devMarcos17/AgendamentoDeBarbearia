<?php

use Marcos\Modelo\ExecucaoUsuario;
use Marcos\Modelo\Usuario;

require_once __DIR__ . "/../../config/conexao.php";
require_once __DIR__  . "/../../vendor/autoload.php";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    
    $imagem = $_FILES["imagem"]["name"];

    $tmpName = $_FILES["imagem"]["tmp_name"];

    $destino = "../uploads/" . $imagem;

    move_uploaded_file($tmpName, $destino);

    $usuario = new Usuario($nome, $email, $senha, $imagem, "user");

    $cadastrar = new ExecucaoUsuario($conexao);
    
    $sucesso = $cadastrar->cadastrarUsuario($usuario);

    if($sucesso){
        header("Location: /paginas/paginaEntrar.php?cadastro=true");
        exit;
    }
    header("Location: /paginas/paginaCadastrar.php?cadastro=false");
        exit;

}
?>