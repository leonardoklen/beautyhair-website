<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\ClienteDAO;
use App\Models\Entidades\Cliente;
use App\Models\Validacao\ClienteValidador;


class LoginController extends Controller
{
    //Dentro de um Controller, cada método público é em geral uma ação
    public function index()
    {

        if ($_SESSION['usuarioSite']) {
            header('Location: http://' . APP_HOST . '/agendamento/index');
            exit;
        } else {
            $this->render('cliente/login');
        }

        Sessao::limpaMensagem();
    }

    public function logar()
    {

        $cliente = new Cliente();
        $cliente->setLogin($_POST['login']);
        $cliente->setSenha($_POST['senha']);

        Sessao::gravaFormulario($_POST);

        $clienteValidador = new ClienteValidador();
        $resultadoValidacao = $clienteValidador->validarLogin($cliente);

        if ($resultadoValidacao->getErros()) {
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/cliente/login');
        }

        $clienteDAO = new ClienteDAO();

        $newCliente = $clienteDAO->validarLogin($cliente);

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        if ($newCliente!=false) {
            Sessao::criarSessao('usuarioSite', $newCliente->getNome());
            Sessao::criarSessao('cpfUsuario', $newCliente->getCpf());
            $this->render('/home/index');
        } else {
            Sessao::criarSessao('nao_autenticadoSite', true);
            $this->redirect('/cliente/login');
        }
    }

    public function logout()
    {
        session_start();
        unset($_SESSION['usuarioSite']);
        unset($_SESSION['cpfUsuario']);
        $this->redirect('/cliente/login');
    }
}
