<div class="container py-5">

<?php 
    if ($Sessao::retornaMensagem()) { ?>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="alert alert-success col-md-10" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php echo $Sessao::retornaMensagem(); ?> <br>
            </div>
            <div class="col-md-1"></div>
        </div>
    <?php } ?>

    <form action="http://<?php echo APP_HOST; ?>/login/logar" method="post">

    <div class="simple-login-container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 text-center mb-4">
                <img src="<?= PATH_IMG ?>layouts/login.png" width=50% alt="">
            </div>
            <div class="col-md-4"></div>
        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 form-group">
                <input type="text" class="form-control" name="login" placeholder="Login">
            </div>
            <div class="col-md-4"></div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 form-group">
                <input type="password" placeholder="Senha" name="senha" class="form-control">
            </div>
            <div class="col-md-4"></div>
        </div>

        <?php
            session_start();
            if (isset($_SESSION['nao_autenticadoSite'])) {
            ?>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <p class="text-danger">ERRO: Campo usuário ou senha inválido</p>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            <?php
            }
            unset($_SESSION['nao_autenticadoSite']); ?>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 form-group">
                <input type="submit" class="btn btn-block btn-login btn-info" value="Entrar">
            </div>
            <div class="col-md-4"></div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <p>Não tem uma conta? <a <?php if ($viewVar['nameController'] == "ClienteController" && $viewVar['nameAction'] == "cadastro") { ?> class="active" <?php } ?>href="http://<?php echo APP_HOST; ?>/cliente/cadastro">Crie uma!</a></p>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

    </form>
</div>