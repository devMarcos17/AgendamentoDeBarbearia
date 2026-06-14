<?php
namespace Marcos\Modelo;

use DateTimeImmutable;

class Agendamento
{
    private ?int $id;
    public function __construct(
       private DateTimeImmutable $data, 
       private Servico $servico,
       
       private bool $disponibilidade = true,
       private ?Usuario $usuario = null,
       ?int $id = null,
       
    )
    {
        $this->id = $id;
    }

    public function getData(): DateTimeImmutable
    {
        return $this->data;
    }
    public function getServico(): Servico
    {
        return $this->servico;
    }
    public function getUsuario(): ?Usuario
    {
        return $this->usuario;  
    }
    public function getDisponilidade(): bool
    {
        return $this->disponibilidade;
    }
    public function getId(): ?int
    {
        return $this->id;
    }
}
?>