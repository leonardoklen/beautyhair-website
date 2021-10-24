<?  //BARRA DE NAVEGAÇÃO ?>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
  <div class="container">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav">

        <?php
        if ($Sessao::retornaUsuario() != false) {
        ?>

          <li class="nav-item">
            <a class="nav-link text-white"> Oi, <b class="text-warning"><?php echo $Sessao::retornaNomeUsuario() ?>!</b> Seja bem-vindo(a).</a>
          </li>

        <?php
        } else {
        ?>

          <li class="nav-item <?php if ($viewVar['nameController'] == "ClienteController" && $viewVar['nameAction'] == "login") { ?>active <?php } ?>">
            <a class="nav-link" href="http://<?php echo APP_HOST; ?>/cliente/login">Entrar</a>
          </li>
          <li class="nav-item text-left <?php if ($viewVar['nameController'] == "ClienteController" && $viewVar['nameAction'] == "cadastro") { ?>active <?php } ?>">
            <a class="nav-link" href="http://<?php echo APP_HOST; ?>/cliente/cadastro">Cadastrar-se</a>
          </li>

        <?php } ?>
      </ul>

      <ul class="navbar-nav ml-auto mr-4">
        <li class="nav-item <?php if ($viewVar['nameController'] == "HomeController" && $viewVar['nameAction'] == "") { ?>active <?php } ?>">
          <a class="nav-link" href="http://<?php echo APP_HOST; ?>/home">Home
          </a>
        </li>
        <li class="nav-item <?php if ($viewVar['nameController'] == "ServicoController" && $viewVar['nameAction'] == "") { ?>active <?php } ?>">
          <a class="nav-link" href="http://<?php echo APP_HOST; ?>/servico">Serviços</a>
        </li>
        <li class="nav-item <?php if ($viewVar['nameController'] == "AgendamentoController" && $viewVar['nameAction'] == "") { ?>active <?php } ?>">
          <a class="nav-link" href="http://<?php echo APP_HOST; ?>/agendamento">Agendamento</a>
        </li>
        <li class="nav-item <?php if ($viewVar['nameController'] == "TrabalheConoscoController" && $viewVar['nameAction'] == "") { ?>active <?php } ?>">
          <a class="nav-link" href="http://<?php echo APP_HOST; ?>/trabalheConosco">Trabalhe Conosco</a>
        </li>

      </ul>
      <?php
      if ($Sessao::retornaUsuario() != false) {
      ?>
        <ul class="nav ml-5" style="margin-right: -10%;">
          <li class="nav-item">
            <a class="btn btn-block btn-login btn-danger" href="http://<?php echo APP_HOST; ?>/login/logout" >Sair</a>
          </li>
        </ul>
      <?php } ?>


    </div>
  </div>
</nav>
<?  // FIM BARRA DE NAVEGAÇÃO  
?>