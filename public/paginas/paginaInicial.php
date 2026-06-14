<?php

session_start();

if(!isset($_SESSION["usuario"])){

    unset($_SESSION["usuario"]);

    header("Location: paginaEntrar.php?sessaoInexistente");
    exit;
}

if($_SESSION["usuario"]["role"] != "admin"){
    header("Location: paginas/paginaEntrar.php?acessoNegado");
    exit;
}

$nome = $_SESSION["usuario"]["nome"];
$id = $_SESSION["usuario"]["id"];
$email = $_SESSION["usuario"]["email"];
$imagem = $_SESSION["usuario"]["imagem"];

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
    linear-gradient(135deg,#000,#111,#1b1b1b,#000);
}

.dashboard{
    width:500px;
    background:rgba(15,15,15,.95);
    border:1px solid rgba(255,215,0,.25);
    border-radius:25px;
    padding:40px;
    text-align:center;
    backdrop-filter:blur(15px);

    box-shadow:
    0 0 30px rgba(255,215,0,.15),
    0 10px 40px rgba(0,0,0,.8);
}

.perfil img{
    width:160px;
    height:160px;
    border-radius:50%;
    object-fit:cover;

    border:4px solid #FFD700;

    box-shadow:
    0 0 25px rgba(255,215,0,.5);
}

.perfil h1{
    color:#FFD700;
    margin-top:20px;
    font-size:2rem;
}

.perfil p{
    color:#ddd;
    margin-top:10px;
}

.perfil span{
    display:block;
    margin-top:8px;
    color:#b8860b;
    font-size:.9rem;
}

.menu{
    margin-top:35px;
    display:flex;
    flex-direction:column;
    gap:15px;
}

.btn{
    text-decoration:none;
    padding:15px;

    border-radius:12px;

    background:linear-gradient(
    135deg,
    #FFD700,
    #F4C430,
    #D4AF37
    );

    color:#000;
    font-weight:700;

    transition:.4s;
}

.btn:hover{
    transform:translateY(-4px);

    box-shadow:
    0 0 20px rgba(255,215,0,.6);
}

.sair{
    background:linear-gradient(
    135deg,
    #8b0000,
    #c0392b
    );

    color:white;
}

.sair:hover{
    box-shadow:
    0 0 20px rgba(192,57,43,.6);
}

@media(max-width:550px){

    .dashboard{
        width:90%;
        padding:30px;
    }

    .perfil img{
        width:130px;
        height:130px;
    }
}
</style>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Usuário</title>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>

<div class="dashboard">

    <div class="perfil">

        <img src="../uploads/<?php echo $imagem; ?>" alt="Foto Perfil">

        <h1><?php echo $nome; ?></h1>

        <p><?php echo $email; ?></p>

        <span>ID #<?php echo $id; ?></span>

    </div>

    <div class="menu">

        <a href="paginaServico.php" class="btn">
            Serviços
        </a>

        <a href="paginaAgendamentos.php" class="btn">
            Agendamentos
        </a>

        <a href="Sair.php" class="btn sair">
            Sair
        </a>

    </div>

</div>

</body>
</html>