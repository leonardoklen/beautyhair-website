<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\ClienteDAO;
use App\Models\Entidades\Cliente;
use App\Models\Validacao\ClienteValidador;

class ClienteController extends Controller
{
    public function login()
    {
        $this->render('cliente/login');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function cadastro()
    {
        $this->render('cliente/cadastro');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function salvar()
    {
        $cliente = new Cliente();
        $cliente->setCpf($this->limpaCaracteres($_POST['cpf']));
        $cliente->setNome($_POST['nome']);
        $cliente->setEmail($_POST['email']);
        $cliente->setTelefone($this->limpaCaracteres($_POST['telefone']));
        $cliente->setLogin($_POST['login']);
        $cliente->setSenha($_POST['senha']);

        Sessao::gravaFormulario($_POST);

        $clienteValidador = new ClienteValidador();
        $resultadoValidacao = $clienteValidador->validar($cliente);

        if ($resultadoValidacao->getErros()) {
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/cliente/cadastro');
        }

        $resultadoValidacao = $clienteValidador->validarCpf($cliente);

        if ($resultadoValidacao->getErros()) {
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/cliente/cadastro');
        }

        $clienteDAO = new ClienteDAO();

        $clienteDAO->salvar($cliente);

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        Sessao::gravaMensagem("Cliente cadastrado com sucesso!");

        $this->redirect('/cliente/login');
    }
}
