<?php

use Marcos\Modelo\ExecucaoServico;

require_once __DIR__ . "/../../config/conexao.php";
require_once __DIR__ . "/../../vendor/autoload.php";

session_start();

$id = $_SESSION["usuario"]["id"];

$servicos = new ExecucaoServico($conexao);
$selecionar = $servicos->listarServico();

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serviços</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            padding: 40px;

            background:
                radial-gradient(circle at top left,
                    rgba(255, 215, 0, .15),
                    transparent 30%),

                radial-gradient(circle at bottom right,
                    rgba(255, 215, 0, .10),
                    transparent 30%),

                linear-gradient(135deg,
                    #000000,
                    #111111,
                    #1b1b1b,
                    #000000);
        }

        .titulo {
            text-align: center;
            color: #FFD700;
            margin-bottom: 40px;
            font-size: 3rem;
            text-transform: uppercase;
            letter-spacing: 3px;
        }

        .container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 320px));
            justify-content: center;
            gap: 25px;

            max-width: 1100px;
            margin: 0 auto;
        }

        .card {
            width: 100%;
            max-width: 320px;
            background: rgba(15, 15, 15, .95);

            border: 1px solid rgba(255, 215, 0, .25);
            border-radius: 20px;

            overflow: hidden;

            backdrop-filter: blur(15px);

            box-shadow:
                0 0 20px rgba(255, 215, 0, .08),
                0 10px 30px rgba(0, 0, 0, .8);

            transition: .3s ease;
            margin: auto;
        }

        .card:hover {
            transform: translateY(-10px);

            box-shadow:
                0 0 35px rgba(255, 215, 0, .3),
                0 15px 45px rgba(0, 0, 0, .9);
        }

        .card img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            object-position: center;
            display: block;
            border-bottom: 2px solid #FFD700;
        }

        .conteudo {
            padding: 20px;
            text-align: center;
        }

        .nome-servico {
            color: #FFD700;
            font-size: 1.8rem;
            margin-bottom: 20px;
            text-align: center;
        }

        .info {
            margin-bottom: 12px;
            color: #ddd;
        }

        .info strong {
            color: #d4af37;
        }

        .btn {
            width: 100%;
            margin-top: 20px;

            border: none;
            padding: 15px;

            border-radius: 12px;

            cursor: pointer;

            font-size: 16px;
            font-weight: 700;

            color: #000;

            background:
                linear-gradient(135deg,
                    #FFD700,
                    #F4C430,
                    #D4AF37);

            transition: .4s;
        }

        .btn:hover {
            transform: scale(1.03);

            box-shadow:
                0 0 20px rgba(255, 215, 0, .6);
        }

        @media(max-width:768px) {

            body {
                padding: 20px;
            }

            .titulo {
                font-size: 2rem;
            }
        }
    </style>
</head>

<body>

    <h1 class="titulo">Nossos Serviços</h1>

    <div class="container">

        <?php

        foreach ($selecionar as $s) {

        ?>

            <div class="card">

                <img src="../uploads/<?php echo $s["imagem"]; ?>" alt="Imagem do Serviço">

                <div class="conteudo">

                    <h2 class="nome-servico">
                        <?php echo strtoupper($s["nome"]); ?>
                    </h2>

                    <p class="info">
                        <strong>ID:</strong>
                        <?php echo $s["id"]; ?>
                    </p>

                    <p class="info">
                        <strong>Preço:</strong>
                        R$ <?php echo number_format($s["preco"], 2, ',', '.'); ?>
                    </p>

                    <p class="info">
                        <strong>Duração:</strong>
                        <?php echo $s["duracao"]; ?> minutos
                    </p>

                    <p class="info">
                        <strong>Data:</strong>
                        <?php echo $s["dataHora"]; ?>
                    </p>

                    <form action="../controle/processarAgendamento.php" method="post">

                        <input
                            type="hidden"
                            name="id"
                            value="<?php echo $id; ?>">

                        <input
                            type="hidden"
                            name="idAgendamento"
                            value="<?php echo $s["id_agendamento"]; ?>">

                        <input
                            type="submit"
                            value="Marcar Serviço"
                            class="btn">

                    </form>

                </div>

            </div>

        <?php

        }

        ?>

    </div>

</body>

</html>