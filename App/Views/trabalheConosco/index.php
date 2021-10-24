<div class="container py-5">

    <?php 
    if ($Sessao::retornaMensagem() == "Formulário de recrutamento enviado com sucesso!") { ?>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="alert alert-success col-md-10" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php echo $Sessao::retornaMensagem(); ?> <br>
            </div>
            <div class="col-md-1"></div>
        </div>
    <?php }else if($Sessao::retornaMensagem() == "Houve algum erro. Seu formulário de recrutamento não foi enviado."){ ?>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="alert alert-alert col-md-10" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php echo $Sessao::retornaMensagem(); ?> <br>
            </div>
            <div class="col-md-1"></div>
        </div>
    <?php } ?>

    <form action="http://<?php echo APP_HOST; ?>/trabalheConosco/enviar" method="post">
        <h4 class="text-center mb-4">Formulário de Recrutamento</h4>

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
            <div class="col-md-1 col-form-label"><label for="email">E-mail:</label></div>
            <div class="form-group col-md-9">
                <input type="email" class="form-control" id="email" name="email" maxlength=100 placeholder="Ex: zeandrade@gmail.com.br" required>
            </div>
            <div class="col-md-1"></div>
        </div>

        <div class="form-group row">
            <div class="col-md-1"></div>
            <div class="col-md-1 col-form-label"><label for="pretensao">Pretensão:</label></div>
            <div class="form-group col-md-9">
                <input type="text" class="form-control" id="pretensao" name="pretensao" maxlength=50 placeholder="Ex: Cabeleireiro" required>
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