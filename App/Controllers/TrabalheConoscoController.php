<?php

namespace App\Controllers;

require_once PATH . '/App/PhpMailer/src/PHPMailer.php';
require_once PATH . '/App/PhpMailer/src/SMTP.php';
require_once PATH . '/App/PhpMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Lib\Sessao;

class TrabalheConoscoController extends Controller
{
    public function index()
    {
        $this->render('trabalheConosco/index');
    }

    public function enviar()
    {


        $mail = new PHPMailer(true);

        try {

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'emailstccleonardoklen@gmail.com';
            $mail->Password = 'tccads2020';
            $mail->Port = 587;

            $mail->setFrom('leoklen203@gmail.com');
            $mail->addAddress('leoklen203@gmail.com');

            $mail->isHTML(true);

            $cpf = $_POST['cpf'];
            $nome = $_POST['nome'];
            $telefone = $_POST['telefone'];
            $email = $_POST['email'];
            $pretensao = $_POST['pretensao'];

            $mail->Subject = 'Candidato Beauty Hair - ' . $nome;
            $mail->Body = '<strong>Dados do Candidato</strong>
            <p>CPF: ' . $cpf . '</p>
            <p>Nome: ' . $nome . '</p>
            <p>Telefone: ' . $telefone . '</p>
            <p>E-mail: ' . $email . '</p>
            <p>Pretensão: ' . $pretensao . '</p>';
            $mail->AltBody = 'E-mail de recrutamento do Beauty Hair - Salão de Beleza';

            if ($mail->send()) {
                Sessao::limpaFormulario();
                Sessao::limpaMensagem();
                Sessao::limpaErro();

                Sessao::gravaMensagem("Formulário de recrutamento enviado com sucesso!");
            } else {
                Sessao::limpaFormulario();
                Sessao::limpaMensagem();
                Sessao::limpaErro();

                Sessao::gravaMensagem("Houve algum erro. Seu formulário de recrutamento não foi enviado.");
            }

            $this->redirect('/trabalheConosco');
        } catch (Exception $e) {
            echo "Erro: " . $e;
        }
    }
}
