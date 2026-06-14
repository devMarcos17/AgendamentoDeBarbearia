<?php
namespace Marcos\Modelo;

class Servico
{
    private ?int $id;
    public function __construct(
        public readonly string $nome,
        private int $preco,
        private int $duracao,
        private string $imagem,
        ?int $id = null,
    
    )
    {
        $this->id = $id;
    }

    public function getPreco(): int
    {
        return $this->preco;
    }
    public function getDuracao(): int
    {
        return $this->duracao;
    }
    public function getId(): int
    {
        return $this->id;
    }
    public function getImagem(): string
    {
        return $this->imagem;
    }
}
?>