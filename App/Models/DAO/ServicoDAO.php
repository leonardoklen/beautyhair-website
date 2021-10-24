<?php

namespace App\Models\DAO;

use App\Models\Entidades\Servico;

class ServicoDAO extends BaseDAO
{
    public function listar($idServico = null)
    {
        if ($idServico) {
            $resultado = $this->select(
                "SELECT * FROM servico WHERE idServico = $idServico"
            );

            return $resultado->fetchObject(Servico::class);
        } else {
            $resultado = $this->select(
                'SELECT * FROM servico WHERE idServico != 9999 ORDER BY nome ASC'
            );
            return $resultado->fetchAll(\PDO::FETCH_CLASS, Servico::class);
        }

        return false;
    }

    public function findDesconto($idServico)
    {
        $resultado = $this->select(
            "SELECT 
            campanha.desconto, campanha.descricao, campanha.formaPagamento 
            FROM 
            campanha, 
            servico_has_campanha
            WHERE 
            servico_has_campanha.Servico_idServico = $idServico 
            AND 
            servico_has_campanha.Campanha_IdCampanha = campanha.idCampanha 
            AND
            campanha.situacao = 1
            AND
            campanha.de <= CURDATE()
            AND
            campanha.ate >= CURDATE()
            ORDER BY campanha.desconto DESC 
            LIMIT 1"
        );

        if (!empty($resultado)) {
            return $resultado;
        } else {
            return false;
        }
    }
}
