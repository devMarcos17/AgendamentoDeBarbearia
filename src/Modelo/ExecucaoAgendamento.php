<?php
namespace Marcos\Modelo;

use DateTimeImmutable;
use PDO;

class ExecucaoAgendamento
{
private PDO $conexao;
public function __construct(PDO $conexao)
{
    $this->conexao = $conexao;
}

public function criarAgendamento(Agendamento $agendamento, int $idServico): bool
{
    $data = $agendamento->getData();
    $formatada = $data->format("Y-m-d H:i:s");
    $disponivel = $agendamento->getDisponilidade();

    $query = "INSERT INTO agendamentos (dataHora, disponibilidade, id_servico) VALUES (?, ?, ?)";
    
    $stmt = $this->conexao->prepare($query);

    $stmt->bindParam(1, $formatada);
    $stmt->bindParam(2, $disponivel);
    $stmt->bindParam(3, $idServico);

    $sucesso = $stmt->execute();

    if($sucesso){
        return true;
    }
    return false;
}
public function marcarAgendamento(int $idUsuario, int $idAgendamento): bool
{

    $query = "UPDATE agendamentos  SET id_usuario = ? WHERE id = ? AND disponibilidade = 1";
    $stmt = $this->conexao->prepare($query);
    
    $stmt->bindParam(1, $idUsuario, PDO::PARAM_INT);
    $stmt->bindParam(2, $idAgendamento, PDO::PARAM_INT);

    $sucesso = $stmt->execute();

    if($sucesso){
        return true;
    }
    return false;
    
}
public function desmarcarAgendamento(int $idUsuario, int $idAgendamento): bool
{
    $idUsuario = null;
    $query = "UPDATE agendamentos SET id_usuario = ? WHERE id = ? AND disponibilidade = 1";
    
    $stmt = $this->conexao->prepare($query);
    $stmt->bindParam(1, $idUsuario, PDO::PARAM_NULL);
    $stmt->bindParam(2, $idAgendamento, PDO::PARAM_INT);

    $sucesso = $stmt->execute();

    if($sucesso){
        return true;
    }
    return false;
}

public function selecionarAgendamento(int $idUsuario): array
{
    $query = "SELECT id, dataHora, disponibilidade FROM agendamentos WHERE id_usuario = ?";

    $stmt = $this->conexao->prepare($query);
    $stmt->bindParam(1, $idUsuario);

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);

}
    
}
?>