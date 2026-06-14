<?php

?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body{
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: linear-gradient(
        135deg,
        #000000,
        #111111,
        #1a1a1a,
        #000000
    );
    overflow: hidden;
}

/* Efeito de brilho no fundo */
body::before{
    content: "";
    position: absolute;
    width: 400px;
    height: 400px;
    background: radial-gradient(circle, rgba(255,215,0,0.25), transparent 70%);
    top: -100px;
    left: -100px;
}

body::after{
    content: "";
    position: absolute;
    width: 350px;
    height: 350px;
    background: radial-gradient(circle, rgba(255,215,0,0.15), transparent 70%);
    bottom: -100px;
    right: -100px;
}

.login-container{
    position: relative;
    z-index: 1;
    width: 420px;
    padding: 40px;
    background: rgba(20,20,20,0.95);
    border: 1px solid rgba(255,215,0,0.25);
    border-radius: 25px;
    backdrop-filter: blur(15px);
    box-shadow:
        0 0 20px rgba(255,215,0,0.15),
        0 0 50px rgba(0,0,0,0.8);
    display: flex;
    flex-direction: column;
}

.login-container h1{
    text-align: center;
    color: #FFD700;
    margin-bottom: 30px;
    font-size: 2rem;
    letter-spacing: 2px;
    text-transform: uppercase;
}

.login-container label{
    color: #d4af37;
    margin-bottom: 8px;
    font-weight: 500;
}

.login-container input[type="email"],
.login-container input[type="password"]{
    width: 100%;
    padding: 14px;
    margin-bottom: 20px;
    border: 1px solid #333;
    border-radius: 12px;
    background: #111;
    color: white;
    outline: none;
    transition: 0.3s;
}

.login-container input[type="email"]:focus,
.login-container input[type="password"]:focus{
    border-color: #FFD700;
    box-shadow: 0 0 15px rgba(255,215,0,0.5);
}

.btn{
    width: 100%;
    padding: 14px;
    border: none;
    border-radius: 12px;
    cursor: pointer;
    font-size: 16px;
    font-weight: 700;
    color: #000;
    background: linear-gradient(
        135deg,
        #FFD700,
        #F4C430,
        #D4AF37
    );
    transition: 0.4s;
    margin-top: 10px;
}

.btn:hover{
    transform: translateY(-3px);
    box-shadow: 0 0 25px rgba(255,215,0,0.6);
}

.login-container a{
    text-align: center;
    margin-top: 20px;
    text-decoration: none;
    color: #FFD700;
    transition: 0.3s;
}

.login-container a:hover{
    color: #fff;
    text-shadow: 0 0 10px #FFD700;
}

@media(max-width: 500px){
    .login-container{
        width: 90%;
        padding: 30px;
    }
}
</style>
<form action="../controle/processarEntrar.php" method="post" class="login-container">

    <h1>Login</h1>

    <label>Email</label>
    <input type="email" name="email" placeholder="Digite seu email" required>

    <label>Senha</label>
    <input type="password" name="senha" placeholder="********" required>

    <input type="submit" value="Entrar" name="submit" class="btn">

    <a href="paginaCadastrar.php">Não possui uma conta?</a>

</form>