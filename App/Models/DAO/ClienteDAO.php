<?php

namespace App\Models\DAO;

use App\Models\Entidades\Cliente;

class ClienteDAO extends BaseDAO
{
    public function listar($cpf = null)
    {
        if ($cpf) {
            $resultado = $this->select(
                "SELECT * FROM cliente WHERE cpf = $cpf"
            );

            return $resultado->fetchObject(Cliente::class);
        } else {
            $resultado = $this->select(
                'SELECT * FROM cliente ORDER BY nome ASC'
            );
            return $resultado->fetchAll(\PDO::FETCH_CLASS, Cliente::class);
        }

        return false;
    }

    public function listarLogin($login)
    {
        if ($login) {
            $resultado = $this->select("select * from cliente where login = '{$login}'");

            return $resultado->rowCount();
        }
        return false;
    }

    public function validarLogin(Cliente $cliente)
    {
        $login = $cliente->getLogin();
        $senha = $cliente->getSenha();

        $resultado = $this->select("select cpf, nome from cliente where login = '{$login}' and senha = '{$senha}'");

        if (!empty($resultado)) {
            return $resultado->fetchObject(Cliente::class);
        } else {
            return false;
        }
    }

    public function salvar(Cliente $cliente)
    {
        try {

            $cpf = $cliente->getCpf();
            $nome = $cliente->getNome();
            $email = $cliente->getEmail();
            $telefone = $cliente->getTelefone();
            $login = $cliente->getLogin();
            $senha = $cliente->getSenha();

            return $this->insert(
                'cliente',
                ":cpf, :nome, :email, :telefone, :login, :senha",
                [
                    ':cpf' => $cpf,
                    ':nome' => $nome,
                    ':email' => $email,
                    ':telefone' => $telefone,
                    ':login' => $login,
                    ':senha' => $senha,
                ]
            );
        } catch (\Exception $e) {
            throw new \Exception("Erro na gravação de dados.", 500);
        }
    }
}
