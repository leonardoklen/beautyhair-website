<div class="container py-5">

    <?php if ($Sessao::retornaErro()) { ?>
        <div class="row">
        <div class="col-md-1"></div>
        <div class="alert alert-warning col-md-10" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <?php foreach ($Sessao::retornaErro() as $key => $mensagem) { ?>
                <?php echo $mensagem; ?> <br>
            <?php } ?>
        </div>
        <div class="col-md-1"></div>
        </div>
    <?php } ?>

    <form action="http://<?php echo APP_HOST; ?>/cliente/salvar" method="post">
        <h4 class="text-center mb-4">Formulário de Cadastro</h4>

        <div class="form-group row">
            <div class="col-md-1"></div>
            <div class="col-md-1 col-form-label"><label for="cpf">CPF:</label></div>
            <div class="form-group col-md-9">
                <input type="text" class="form-control" id="cpf" name="cpf" maxlength=11 placeholder="Ex: 11188899900" onblur="(validaCpf(this.value));" required>
            </div>
            <div class="col-md-1"></div>
        </div>

        <div class="form-group row">
            <div class="col-md-1"></div>
            <div class="col-md-1 col-form-label"><label for="email">E-mail:</label></div>
            <div class="form-group col-md-9">
                <input type="email" class="form-control" id="email" name="email" maxlength=100 placeholder="Ex: jose@gmail.com" required>
            </div>
            <div class="col-md-1"></div>
        </div>

        <div class="form-group row">
            <div class="col-md-1"></div>
            <div class="col-md-1 col-form-label"><label for="nome">Nome:</label></div>
            <div class="form-group col-md-9">
                <input type="text" class="form-control" id="nome" name="nome" maxlength=100 placeholder="Ex: José Valdenor Andrade" required>
            </div>
            <div class="col-md-1"></div>
        </div>

        <div class="form-group row">
            <div class="col-md-1"></div>
            <div class="col-md-1 col-form-label"><label for="telefone">Telefone:</label></div>
            <div class="form-group col-md-9">
                <input type="text" class="form-control" id="telefone" name="telefone" maxlength=11 placeholder="Ex: 5599998888" required>
            </div>
            <div class="col-md-1"></div>
        </div>

        <div class="form-group row">
            <div class="col-md-1"></div>
            <div class="col-md-1 col-form-label"><label for="login">Login:</label></div>
            <div class="form-group col-md-9">
                <input type="text" class="form-control" id="login" name="login" maxlength=20 placeholder="Ex: zeandrade" required>
            </div>
            <div class="col-md-1"></div>
        </div>

        <div class="form-group row">
            <div class="col-md-1"></div>
            <div class="col-md-1 col-form-label"><label for="senha">Senha:</label></div>
            <div class="form-group col-md-9">
                <input type="password" class="form-control" id="senha" name="senha" maxlength=30 placeholder="Ex: 123123" required>
            </div>
            <div class="col-md-1"></div>
        </div>

        <br>

        <div class="row">
            <div class="col-md-2"></div>
            <div class="text-right col-md-9">
                <button class="btn-info btn form-group" type="submit">Enviar</button>
                <button class="btn-danger btn form-group" type="reset">Limpar</button>
            </div>
            <div class="col-md-1"></div>
        </div>


    </form>

</div>


<!-- /.container -->