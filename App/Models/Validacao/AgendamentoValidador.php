<?php

namespace App\Models\Validacao;

use \App\Models\Validacao\ResultadoValidacao;
use \App\Models\Entidades\Agendamento;

class AgendamentoValidador
{

    public function validar(Agendamento $agendamento)
    {
        $resultadoValidacao = new ResultadoValidacao();

        if (empty($agendamento->getData())) {
            $resultadoValidacao->addErro('data', "Data: este campo não pode ser vazio");
        }

        if (empty($agendamento->getHora())) {
            $resultadoValidacao->addErro('hora', "Hora: este campo não pode ser vazio");
        }

        if (empty($agendamento->getCliente_cpf())) {
            $resultadoValidacao->addErro('cliente', "Cliente: este campo não pode ser vazio");
        }

        if (empty($agendamento->getColaborador_cpf())) {
            $resultadoValidacao->addErro('colaborador', "Colaborador: este campo não pode ser vazio");
        }

        if (empty($agendamento->getServico_idServico())) {
            $resultadoValidacao->addErro('servico', "Serviço: este campo não pode ser vazio");
        }

        date_default_timezone_set('America/Sao_Paulo');

        if ($agendamento->getData() < date('Y-m-d')) {
            $resultadoValidacao->addErro('data', "Data: selecione uma data futura");
        }

        if ($agendamento->getData() == date('Y-m-d')) {
            if ($agendamento->getHora() < date('H')+1) {
                $resultadoValidacao->addErro('horario', "Horário: selecione um horário futuro");
            }
        }

        return $resultadoValidacao;
    }
}
