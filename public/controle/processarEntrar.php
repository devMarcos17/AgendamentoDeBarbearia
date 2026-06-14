<?php

use Marcos\Modelo\ExecucaoUsuario;
use Marcos\Modelo\Usuario;

require_once __DIR__ . "/../../config/conexao.php";
require_once __DIR__  . "/../../vendor/autoload.php";

session_start();

if($_SERVER["REQUEST_METHOD"] ==="POST"){
    
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $usuario = new Usuario("", $email, $senha, "", "user");

    $autenticar = new ExecucaoUsuario($conexao);

    $sucesso = $autenticar->autenticarUsuario($usuario);

    if($sucesso){

        $_SESSION["usuario"] = [
            "id" => $sucesso["id"],
            "nome" => $sucesso["nome"],
            "email" => $sucesso["email"],
            "imagem" => $sucesso["imagem"],
            "role" => $sucesso["role"]
        ];
        header("Location: /paginas/paginaInicial.php?autenticao=BemSucedida");
        exit;
    }
    unset($_SESSION["usuario"]);
    header("Location: /paginas/paginaEntrar.php?FalhaAoAutetincar");
    exit;

}
?>