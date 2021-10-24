<?php

namespace App\Controllers;

use App\Models\DAO\ServicoDAO;
use App\Models\DAO\ColaboradorDAO;
use App\Models\DAO\AgendamentoDAO;
use App\Models\Entidades\Agendamento;
use App\Models\Validacao\AgendamentoValidador;
use App\Lib\Sessao;

class AgendamentoController extends Controller
{
    public function index()
    {
        if (Sessao::validaSessao() == true) {

            $servicoDAO = new ServicoDAO();

            self::setViewParam('listaServicos', $servicoDAO->listar());

            $colaboradorDAO = new ColaboradorDAO();

            self::setViewParam('listaColaboradores', $colaboradorDAO->listar());

            $this->render('agendamento/index');

            Sessao::limpaFormulario();
            Sessao::limpaMensagem();
            Sessao::limpaErro();
        } else {
            $this->redirect('/cliente/login');

            Sessao::limpaFormulario();
            Sessao::limpaMensagem();
            Sessao::limpaErro();
        }
    }

    public function salvar()
    {
        $agendamento = new Agendamento();
        $agendamento->setData($_POST['data']);
        $agendamento->setHora($_POST['horario']);
        $agendamento->setCliente_cpf($_POST['cpfCliente']);
        $agendamento->setColaborador_cpf($_POST['colaborador']);
        $agendamento->setServico_idServico($_POST['servico']);

        Sessao::gravaFormulario($_POST);

        $agendamentoValidador = new AgendamentoValidador();
        $resultadoValidacao = $agendamentoValidador->validar($agendamento);

        if ($resultadoValidacao->getErros()) {
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/agendamento');
        }

        $agendamentoDAO = new AgendamentoDAO();

        $agendamentoDAO->salvar($agendamento);

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        Sessao::gravaMensagem("Agendamento cadastrado com sucesso!");

        $this->redirect('/agendamento');
    }

    public function horariosOcupados()
    {
        $cpfColaborador = $_POST['colaborador'];
        $data = $_POST['dataAgendamento'];

        $agendamentoDAO = new AgendamentoDAO();

        $horariosOcupados = $agendamentoDAO->horarios($cpfColaborador, $data);

        $oitoHoras = false;
        $noveHoras = false;
        $dezHoras = false;
        $onzeHoras = false;
        $quatorzeHoras = false;
        $quinzeHoras = false;
        $dezesseisHoras = false;
        $dezesseteHoras = false;

        date_default_timezone_set('America/Sao_Paulo');

        foreach ($horariosOcupados as $horarios) {
            switch ($horarios['hora']) {
                case 8:
                        $oitoHoras = true;
                    break;
                case 9:
                        $noveHoras = true;
                    break;
                case 10:
                        $dezHoras = true;
                    break;
                case 11:
                        $onzeHoras = true;
                    break;
                case 14:
                        $quatorzeHoras = true;
                    break;
                case 15:
                        $quinzeHoras = true;
                    break;
                case 16:
                        $dezesseisHoras = true;
                    break;
                case 17:
                        $dezesseteHoras = true;
                    break;
            }
        }

        if (date('Y-m-d', strtotime($data)) >= date('Y-m-d')){
        echo '<option default disabled selected>Selecione um horário disponível</option>';

        if (!empty($cpfColaborador) && !empty($data)) {
            if ($oitoHoras) {
                echo '<option disabled value="8">08:00h - Reservado</option>';
            } else {
                echo '<option class="font-weight-bold" value="8">08:00h</option>';
            }
            if ($noveHoras) {
                echo '<option disabled value="9">09:00h - Reservado</option>';
            } else {
                echo '<option class="font-weight-bold" value="9">09:00h</option>';
            }
            if ($dezHoras) {
                echo '<option disabled value="10">10:00h - Reservado</option>';
            } else {
                echo '<option class="font-weight-bold" value="10">10:00h</option>';
            }
            if ($onzeHoras) {
                echo '<option disabled value="11">11:00h - Reservado</option>';
            } else {
                echo '<option class="font-weight-bold" value="11">11:00h</option>';
            }
            if ($quatorzeHoras) {
                echo '<option disabled value="14">14:00h - Reservado</option>';
            } else {
                echo '<option class="font-weight-bold" value="14">14:00h</option>';
            }
            if ($quinzeHoras) {
                echo '<option disabled value="15">15:00h - Reservado</option>';
            } else {
                echo '<option class="font-weight-bold" value="15">15:00h</option>';
            }
            if ($dezesseisHoras) {
                echo '<option disabled value="16">16:00h - Reservado</option>';
            } else {
                echo '<option class="font-weight-bold" value="16">16:00h</option>';
            }
            if ($dezesseteHoras) {
                echo '<option disabled value="17">17:00h - Reservado</option>';
            } else {
                echo '<option class="font-weight-bold" value="17">17:00h</option>';
            }
        }
    }else if(empty($data)){
        echo '<option default disabled selected>Selecione um horário disponível</option>';

    }else{
        echo '<option default disabled selected>Selecione uma data presente ou futura</option>';
    }
    }
}
