<style>
  body{
    min-height:100vh;
    padding:40px;

    background:
        linear-gradient(
            135deg,
            #0a0a0a,
            #1a1a1a,
            #2a2a2a,
            #111111
        );

    font-family:'Poppins',sans-serif;
}

.titulo{
    color:#fff;
    margin-bottom:30px;
    font-size:2.5rem;
}

.container{
    display:flex;
    flex-wrap:wrap;
    gap:20px;
    justify-content:flex-start;
}

.card{
    width:340px;

    background:#ffffff;

    border-radius:18px;

    padding:25px;

    box-shadow:
        0 10px 25px rgba(0,0,0,.4);

    transition:.3s;
}

.card:hover{
    transform:translateY(-5px);

    box-shadow:
        0 15px 35px rgba(0,0,0,.6);
}

.nome-servico{
    color:#111;
    font-size:1.5rem;
    margin-bottom:20px;

    border-bottom:2px solid #e5e5e5;
    padding-bottom:10px;
}

.info{
    color:#222;
    font-size:15px;
    margin-bottom:15px;
}

.info strong{
    color:#000;
    font-weight:700;
}

.btn-desmarcar{
    width:100%;

    border:none;

    padding:14px;

    border-radius:10px;

    cursor:pointer;

    font-weight:700;
    font-size:15px;

    color:white;

    background:
        linear-gradient(
            135deg,
            #c62828,
            #f44336
        );

    transition:.3s;
}

.btn-desmarcar:hover{
    transform:scale(1.02);
}
</style>
<?php

use Marcos\Modelo\ExecucaoAgendamento;

require_once __DIR__ . "/../../config/conexao.php";
require_once __DIR__  . "/../../vendor/autoload.php";

session_start();

$id = $_SESSION["usuario"]["id"];
$execucaoAgendamento = new ExecucaoAgendamento($conexao);

$agendamentos = $execucaoAgendamento->selecionarAgendamento($id);

?>

<div class="container">

<?php foreach($agendamentos as $ag){ ?>

    <div class="card">

        <div class="conteudo">

            <h2 class="nome-servico">Agendamento</h2>

            <div class="info">
                <strong>Data:</strong>
                <?php echo $ag["dataHora"]; ?>
            </div>

            <div class="info">
                <strong>Disponibilidade:</strong>
                <?php 
                if($ag["disponibilidade"] === 1)
                    {
                        echo "Disponivel" . "<br>";
                    }
                    else{
                        echo "Não possui vaga!" . "<br>";
                    }
                      echo $ag["disponibilidade"]; ?>
            </div>

            <form action="../controle/procesarDesmarcar.php" method="post">

                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="hidden" name="idAgendamento" value="<?php echo $ag['id']; ?>">

                <button class="btn-desmarcar" onclick="return confirm('Tem certeza que deseja desmarcar?')">
                    Desmarcar
                </button>

            </form>

        </div>

    </div>

<?php } ?>

</div>