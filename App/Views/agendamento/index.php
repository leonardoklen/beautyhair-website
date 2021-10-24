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

    <form action="http://<?php echo APP_HOST; ?>/agendamento/salvar" method="post">
        <h4 class="text-center mb-4">Agendamento de Serviços</h4>

        <div class="form-group row">
            <div class="col-md-1"></div>
            <div class="form-group col-md-10">
                <input type="text" class="form-control" name="cliente" id="cliente" value="<?php echo $Sessao::retornaNomeUsuario() ?>" readonly="true" required>
                <input type="hidden" name="cpfCliente" id="cpfCliente" value="<?php echo $Sessao::retornaCpfUsuario() ?>">
            </div>
            <div class="col-md-1"></div>
        </div>

        <div class="form-group row">
            <div class="col-md-1"></div>
            <div class="form-group col-md-10">
                <select id="servico" name="servico" class="form-control" required>
                    <option default disabled selected>Selecione um serviço</option>
                    <?php
                    if (count($viewVar['listaServicos'])) {
                        foreach ($viewVar['listaServicos'] as $servico) {
                    ?><option value="<?php echo $servico->getIdServico(); ?>"><?php echo $servico->getNome() ?></option><?php
                                                                                                                    }
                                                                                                                }
                                                                                                                        ?>
                </select>
            </div>
            <div class="col-md-1"></div>

        </div>
        <div class="form-group row">
            <div class="col-md-1"></div>
            <div class="form-group col-md-10">
                <select id="colaborador" name="colaborador" class="form-control" required>
                    <option default disabled selected>Selecione um colaborador</option>
                    <?php
                    if (count($viewVar['listaColaboradores'])) {
                        foreach ($viewVar['listaColaboradores'] as $colaborador) {
                    ?><option value="<?php echo $colaborador->getCpf(); ?>"><?php echo $colaborador->getNome() ?></option><?php
                                                                                                                        }
                                                                                                                    }
                                                                                                                            ?>
                </select>
            </div>
            <div class="col-md-1"></div>
        </div>

        <div class="form-group row">
            <div class="col-md-1"></div>
            <div class="form-group col-md-10">
                <input type="date" class="form-control" name="data" id="data" required>
            </div>
            <div class="col-md-1"></div>
        </div>

        <script>
            $("#data").on("change", function() {
                var dataAgendamento = $("#data").val();
                var colaborador = $("#colaborador").val();

                $.ajax({
                    url: 'http://<?php echo APP_HOST; ?>/agendamento/horariosOcupados',
                    type: 'POST',
                    data: {
                        colaborador: colaborador,
                        dataAgendamento: dataAgendamento
                    },
                    success: function(data) {
                        $("#horario").html(data);

                    },
                    error: function(data) {
                        $("#horario").html("Houve um erro ao carregar");
                    }
                });
            })

            $("#colaborador").on("change", function() {
                var dataAgendamento = $("#data").val();
                var colaborador = $("#colaborador").val();

                $.ajax({
                    url: 'http://<?php echo APP_HOST; ?>/agendamento/horariosOcupados',
                    type: 'POST',
                    data: {
                        colaborador: colaborador,
                        dataAgendamento: dataAgendamento
                    },
                    success: function(data) {
                        $("#horario").html(data);

                    },
                    error: function(data) {
                        $("#horario").html("Houve um erro ao carregar");
                    }
                });
            })
        </script>

        <div class="form-group row">
            <div class="col-md-1"></div>
            <div class="form-group col-md-10">
                <select id="horario" name="horario" class="form-control" required>
                    <option default disabled selected>Selecione um horário disponível</option>
                </select>
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