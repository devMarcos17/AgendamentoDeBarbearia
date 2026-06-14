<?php
session_start();
if($_SESSION["usuario"]["role"] != "admin"){
    header("Location: paginaInicial.php?acessoNegado");
    exit;
}
$nome = $_SESSION["usuario"]["nome"];
echo "Olá " . $nome;
?>
<a href="paginaCriarServico.php">Criar Servico</a>
<a href="paginaDeletarServico.php">Deletar</a>
<a href="paginaAtualizarServico.php">Editar Servico</a>