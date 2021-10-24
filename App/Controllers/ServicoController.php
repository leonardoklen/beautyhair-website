<?php

namespace App\Controllers;

use App\Models\DAO\ServicoDAO;
use App\Lib\Sessao;

class ServicoController extends Controller
{
    public function index()
    {
        $servicoDAO = new ServicoDAO();

        self::setViewParam('listaServicos', $servicoDAO->listar());

        self::setViewParam('servicoDAO', $servicoDAO);

        $this->render('servicos/index');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }
}
