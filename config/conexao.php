<?php

$caminhoBanco = __DIR__ . "/../database/banco.sqlite";
try{
$conexao = new PDO("sqlite:" . $caminhoBanco);
}catch(PDOException $e){
    die($e->getMessage());
}

?>