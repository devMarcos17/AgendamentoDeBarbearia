<?php
namespace Marcos\Modelo;

class Usuario
{
    private ?int $id;
    public function __construct(
        public readonly string $nome,
        private string $email,
        private string $senha,
        private string $imagem,
        private string $role = "user",
        ?int $id = null

        )
    {
        $this->id = $id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
    public function getSenha(): string
    {
        return $this->senha;
    }
    public function getImagem(): string
    {
        return $this->imagem;
    }
    public function getRole(): string
    {
        return $this->role;
    }
    public function getId(): ?int
    {
        return $this->id;
    }
    }
?>