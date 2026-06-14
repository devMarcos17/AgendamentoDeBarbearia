<?php
session_start();

$role = $_SESSION["usuario"]["role"];
if($role != "admin"){
    header("Location: paginaInicial.php?acessoNegado");
    exit;
}

$nome = $_SESSION["usuario"]["nome"];
echo "Ola" . $nome;
?>
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
    rgba(255,215,0,.15),
    transparent 30%),

    radial-gradient(circle at bottom right,
    rgba(255,215,0,.10),
    transparent 30%),

    linear-gradient(
    135deg,
    #000000,
    #111111,
    #1b1b1b,
    #000000);
}

.container{
    width:100%;
    display:flex;
    justify-content:center;
    align-items:center;
}

.servico-form{
    width:500px;

    background:rgba(15,15,15,.95);

    border:1px solid rgba(255,215,0,.25);

    border-radius:25px;

    padding:40px;

    backdrop-filter:blur(15px);

    box-shadow:
    0 0 30px rgba(255,215,0,.15),
    0 10px 40px rgba(0,0,0,.8);

    display:flex;
    flex-direction:column;
}

.servico-form h1{
    text-align:center;
    color:#FFD700;
    margin-bottom:30px;
    letter-spacing:2px;
    text-transform:uppercase;
}

.servico-form label{
    color:#d4af37;
    margin-bottom:8px;
    font-weight:500;
}

.servico-form input[type="text"],
.servico-form input[type="number"]{
    width:100%;
    padding:14px;
    margin-bottom:20px;

    border:none;
    outline:none;

    border-radius:12px;

    background:#111;
    color:#fff;

    border:1px solid #333;

    transition:.3s;
}

.servico-form input[type="text"]:focus,
.servico-form input[type="number"]:focus{
    border-color:#FFD700;

    box-shadow:
    0 0 15px rgba(255,215,0,.5);
}

.servico-form input[type="file"]{
    background:#111;
    color:#fff;

    border:1px dashed #FFD700;

    border-radius:12px;

    padding:12px;

    margin-bottom:25px;
}

.servico-form input[type="file"]::file-selector-button{
    background:linear-gradient(
    135deg,
    #FFD700,
    #D4AF37);

    border:none;

    padding:10px 15px;

    border-radius:8px;

    cursor:pointer;

    font-weight:600;

    color:#000;

    margin-right:10px;
}

.btn{
    padding:15px;

    border:none;

    border-radius:12px;

    cursor:pointer;

    font-size:16px;
    font-weight:700;

    color:#000;

    background:linear-gradient(
    135deg,
    #FFD700,
    #F4C430,
    #D4AF37
    );

    transition:.4s;
}

.btn:hover{
    transform:translateY(-4px);

    box-shadow:
    0 0 25px rgba(255,215,0,.6);
}

@media(max-width:600px){

    .servico-form{
        width:90%;
        padding:30px;
    }

}
</style>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Serviço</title>
    <link rel="stylesheet" href="../css/criarServico.css">
</head>
<body>

<div class="container">

    <form action="../controle/processarCriarServico.php" method="post" enctype="multipart/form-data" class="servico-form">

        <h1>Criar Serviço</h1>

        <label>Nome do Serviço</label>
        <input type="text" name="nome" placeholder="Digite o nome do serviço" required>

        <label>Preço (R$)</label>
        <input type="number" step="0.01" name="preco" placeholder="0.00" required>

        <label>Duração (minutos)</label>
        <input type="number" name="duracao" placeholder="Ex: 60" required>

        <label>Imagem do Serviço</label>
        <input type="file" name="imagem" required>

        <input type="submit" value="Criar Serviço" class="btn">

    </form>

</div>

</body>
</html>