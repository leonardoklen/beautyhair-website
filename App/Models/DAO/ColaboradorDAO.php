<?php

namespace App\Models\DAO;

use App\Models\Entidades\Colaborador;

class ColaboradorDAO extends BaseDAO
{
    public function listar($cpf = null)
    {
        if ($cpf) {
            $resultado = $this->select(
                "SELECT * FROM colaborador WHERE cpf = $cpf"
            );

            return $resultado->fetchObject(Colaborador::class);
        } else {
            $resultado = $this->select(
                'SELECT * FROM colaborador ORDER BY nome ASC'
            );
            return $resultado->fetchAll(\PDO::FETCH_CLASS, Colaborador::class);
        }

        return false;
    }

}

