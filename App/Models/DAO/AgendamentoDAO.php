<?php

namespace App\Models\DAO;

use App\Models\Entidades\Agendamento;

class AgendamentoDAO extends BaseDAO
{
    public function horarios($cpfColaborador, $data)
    {

        $resultado = $this->select(
            "select hora from agendamento where Colaborador_cpf = '{$cpfColaborador}' and data = '{$data}'"
        );

        return $resultado;
    }

    public function salvar(Agendamento $agendamento)
    {
        try {

            $data = $agendamento->getData();
            $hora = $agendamento->getHora();
            $Cliente_cpf = $agendamento->getCliente_cpf();
            $Colaborador_cpf = $agendamento->getColaborador_cpf();
            $Servico_idServico = $agendamento->getServico_idServico();

            return $this->insert(
                'agendamento',
                ":data, :hora, :Cliente_cpf, :Colaborador_cpf, :Servico_idServico",
                [
                    ':data' => $data,
                    ':hora' => $hora,
                    ':Cliente_cpf' => $Cliente_cpf,
                    ':Colaborador_cpf' => $Colaborador_cpf,
                    ':Servico_idServico' => $Servico_idServico,
                ]
            );
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }
}
