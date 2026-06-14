<?php
namespace Marcos\Modelo;

use PDO;

class ExecucaoServico
{
    private PDO $conexao;
    public function __construct(PDO $conexao)
    {
        $this->conexao = $conexao;
    }

    public function criarServico(Servico $servico): bool
    {
        $nome = $servico->nome;
        $preco = $servico->getPreco();
        $duracao = $servico->getDuracao();
        $imagem = $servico->getImagem();

        $query = "INSERT INTO servicos (nome, preco, duracao, imagem) VALUES (?, ?, ?, ?)";
        $stmt = $this->conexao->prepare($query);

        $stmt->bindParam(1, $nome);
        $stmt->bindParam(2, $preco);
        $stmt->bindParam(3, $duracao);
        $stmt->bindParam(4, $imagem);

        $sucesso = $stmt->execute();

        if($sucesso){
            return true;
        }
        return false;
    }
    public function atualizarServico(Servico $servico): bool
    {
        $id = $servico->getId();
        $nome = $servico->nome;
        $preco = $servico->getPreco();
        $duracao = $servico->getDuracao();
        $imagem = $servico->getImagem();
        
        $query  = "UPDATE servicos SET nome = ?, preco = ?, duracao = ? imagem = ? WHERE id = ?";
        
        $stmt = $this->conexao->prepare($query);

        $stmt->bindParam(1, $nome);
        $stmt->bindParam(2, $preco);
        $stmt->bindParam(3, $duracao);
        $stmt->bindParam(4, $imagem);
        $stmt->bindParam(5, $id);

        $stmt->execute();

        if($stmt->rowCount() === 0){
            return false;
        }
        return true;
    }
    public function deletarServico(int $id): bool
    {
        
        $query = "DELETE FROM servicos WHERE id = ?";

        $stmt = $this->conexao->prepare($query);

        $stmt->bindParam(1, $id);

        $sucesso = $stmt->execute();

        if($sucesso){
            return true;
        }
        return false;

        
    }

    public function listarServico(): array
    {
       $query = "SELECT 
                s.id,
                s.nome,
                s.preco,
                s.duracao,
                s.imagem,
                a.id AS id_agendamento,
                a.dataHora,
                a.disponibilidade
          FROM servicos s
          INNER JOIN agendamentos a 
              ON s.id = a.id_servico";
        $stmt = $this->conexao->prepare($query);
        
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>