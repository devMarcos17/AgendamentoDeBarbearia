
<?php
session_start();

$role = $_SESSION["usuario"]["role"] ?? null;

if ($role != "admin") {
    header("Location: paginaInicial.php?acessoNegado");
    exit;
}

$nome = $_SESSION["usuario"]["nome"] ?? "Usuário";

?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;

    background:
        radial-gradient(circle at top left,
            rgba(255,215,0,.12),
            transparent 40%),

        radial-gradient(circle at bottom right,
            rgba(255,215,0,.08),
            transparent 40%),

        linear-gradient(135deg,#000,#111,#1a1a1a);
}

.container{
    width:100%;
    max-width:500px;
    padding:20px;
}

.boas-vindas{
    color:#FFD700;
    text-align:center;
    margin-bottom:15px;
    font-weight:600;
}

.servico-form{
    background:rgba(15,15,15,.95);
    border:1px solid rgba(255,215,0,.25);
    border-radius:20px;
    padding:30px;

    box-shadow:0 0 25px rgba(0,0,0,.8);
}

.servico-form h1{
    color:#FFD700;
    text-align:center;
    margin-bottom:25px;
    letter-spacing:2px;
}

label{
    display:block;
    margin:10px 0 5px;
    color:#ddd;
    font-size:14px;
}

input{
    width:100%;
    padding:12px;
    border-radius:10px;

    border:1px solid rgba(255,215,0,.2);
    background:#111;
    color:#fff;

    outline:none;
    transition:.3s;
}

input:focus{
    border-color:#FFD700;
    box-shadow:0 0 10px rgba(255,215,0,.2);
}

.btn{
    margin-top:20px;
    width:100%;

    padding:14px;
    border:none;
    border-radius:12px;

    cursor:pointer;
    font-weight:700;

    color:#000;

    background:linear-gradient(135deg,#FFD700,#F4C430,#D4AF37);

    transition:.3s;
}

.btn:hover{
    transform:scale(1.02);
    box-shadow:0 0 20px rgba(255,215,0,.5);
}
</style>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Serviço</title>

    <link rel="stylesheet" href="../css/criarServico.css">
</head>

<body>

<div class="container">

    <div class="boas-vindas">
        👋 Olá, <?php echo $nome; ?>
    </div>

    <form action="../controle/processarAtualizarServico.php"
          method="post"
          enctype="multipart/form-data"
          class="servico-form">

        <h1>Editar Serviço</h1>

        <label>ID do Serviço</label>
        <input type="number" name="id" placeholder="Digite o ID" required>

        <label>Nome do Serviço</label>
        <input type="text" name="nome" placeholder="Digite o nome do serviço" required>

        <label>Preço (R$)</label>
        <input type="number" step="0.01" name="preco" placeholder="0.00" required>

        <label>Duração (minutos)</label>
        <input type="number" name="duracao" placeholder="Ex: 60" required>

        <label>Imagem do Serviço</label>
        <input type="file" name="imagem" required>

        <input type="submit" value="Salvar Alterações" class="btn">

    </form>

</div>

</body>
</html>