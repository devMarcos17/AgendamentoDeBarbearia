<?php

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
        radial-gradient(circle at top left, rgba(255,215,0,.15), transparent 30%),
        radial-gradient(circle at bottom right, rgba(255,215,0,.10), transparent 30%),
        linear-gradient(135deg,#000,#111,#1b1b1b,#000);
}

.cadastro-container{
    width:450px;
    background:rgba(15,15,15,.95);
    border:1px solid rgba(255,215,0,.25);
    border-radius:25px;
    padding:40px;
    backdrop-filter:blur(12px);
    box-shadow:
        0 0 30px rgba(255,215,0,.15),
        0 10px 40px rgba(0,0,0,.8);
    display:flex;
    flex-direction:column;
}

.cadastro-container h1{
    text-align:center;
    color:#FFD700;
    margin-bottom:30px;
    letter-spacing:2px;
    text-transform:uppercase;
    font-size:2rem;
}

.cadastro-container label{
    color:#d4af37;
    margin-bottom:8px;
    font-weight:500;
}

.cadastro-container input[type="text"],
.cadastro-container input[type="email"],
.cadastro-container input[type="password"]{
    width:100%;
    padding:14px;
    margin-bottom:20px;
    border-radius:12px;
    border:1px solid #333;
    background:#111;
    color:#fff;
    outline:none;
    transition:.3s;
}

.cadastro-container input[type="text"]:focus,
.cadastro-container input[type="email"]:focus,
.cadastro-container input[type="password"]:focus{
    border-color:#FFD700;
    box-shadow:0 0 15px rgba(255,215,0,.5);
}

.cadastro-container input[type="file"]{
    margin-bottom:25px;
    color:#fff;
    border:1px dashed #FFD700;
    padding:12px;
    border-radius:12px;
    background:#111;
    cursor:pointer;
}

.cadastro-container input[type="file"]::file-selector-button{
    background:linear-gradient(135deg,#FFD700,#D4AF37);
    border:none;
    color:#000;
    padding:10px 15px;
    border-radius:8px;
    font-weight:600;
    cursor:pointer;
    margin-right:10px;
}

.btn{
    width:100%;
    padding:15px;
    border:none;
    border-radius:12px;
    background:linear-gradient(
        135deg,
        #FFD700,
        #F4C430,
        #D4AF37
    );
    color:#000;
    font-size:16px;
    font-weight:700;
    cursor:pointer;
    transition:.4s;
}

.btn:hover{
    transform:translateY(-3px);
    box-shadow:0 0 25px rgba(255,215,0,.6);
}

@media(max-width:500px){
    .cadastro-container{
        width:90%;
        padding:30px;
    }
}
</style>
<form action="../controle/processarCadastrar.php" method="post" enctype="multipart/form-data" class="cadastro-container">

    <h1>Cadastrar</h1>

    <label>Nome</label>
    <input type="text" name="nome" placeholder="Digite seu nome" required>

    <label>Email</label>
    <input type="email" name="email" placeholder="Digite seu email" required>

    <label>Senha</label>
    <input type="password" name="senha" placeholder="********" required>

    <label>Foto de Perfil</label>
    <input type="file" name="imagem" required>

    <input type="submit" name="submit" value="Cadastrar" class="btn">

</form>