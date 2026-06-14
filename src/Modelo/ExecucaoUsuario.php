<?php
namespace Marcos\Modelo;

use PDO;

class ExecucaoUsuario
{
    private PDO $conexao;
    public function __construct(PDO $conexao)
    {
        $this->conexao = $conexao;
    }
    public function cadastrarUsuario(Usuario $usuario): bool
    {
        $nome = $usuario->nome;
        $email = $usuario->getEmail();
        $senha = password_hash($usuario->getSenha(), PASSWORD_DEFAULT);
        $imagem = $usuario->getImagem();
        $role = $usuario->getRole();

        $query = "INSERT INTO usuarios (nome, email, senha, imagem, role) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conexao->prepare($query);

        $stmt->bindParam(1, $nome, PDO::PARAM_STR);
        $stmt->bindParam(2, $email, PDO::PARAM_STR);
        $stmt->bindParam(3, $senha, PDO::PARAM_STR);
        $stmt->bindParam(4, $imagem);
        $stmt->bindParam(5, $role, PDO::PARAM_STR);

        $sucesso = $stmt->execute();

        if($sucesso){
            return true;
        }
        return false;

    }

    public function autenticarUsuario(Usuario $usuario)
    {
        $email = $usuario->getEmail();
        $senha = $usuario->getSenha();

        $query = "SELECT id, nome, email, senha, imagem, role FROM usuarios WHERE email = ?";
        $stmt = $this->conexao->prepare($query);

        $stmt->bindParam(1, $email);;
        $stmt->execute();

        $bancoUsuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if($bancoUsuario && password_verify($senha, $bancoUsuario["senha"])){
            return $bancoUsuario;
        }

    }
}
?>