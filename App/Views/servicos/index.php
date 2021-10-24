<header class="background2 py-5 mb-5">
  <div class="container h-100">
    <div class="row h-100 align-items-center">
      <div class="col-lg-12">
        <br>
        <br>
        <h1 class="display-4 text-dark mt-2 mb-2">Serviços</h1>
        <p class="lead mb-4 text-dark">Sempre valorizamos sua beleza!</p>
        <br>
        <br>
        <br>
      </div>
    </div>
  </div>
</header>
<!-- Page Content -->


<div class="container">
<div class="mb-5 text-center">
<a class="btn-info btn" href="http://<?php echo APP_HOST; ?>/agendamento">Clique aqui para agendar um horário</a>
</div>
  <?php
  if (!count($viewVar['listaServicos'])) {
  ?>
    <div class="alert alert-secondary text-center mb-5" role="alert">Nenhum serviço cadastrado.</div>
  <?php
  } else {
  ?>
    <?php
    $contador = 0;
    foreach ($viewVar['listaServicos'] as $servico) {
      if ($contador % 3 == 0) {
    ?><div class="row">
        <?php } ?>

        <div class="col-lg-4 mb-5">
          <div class="mx-auto bg-light rounded-circle" style="width: 20rem;">
            <center><img class="py-4" src="<?= PATH_IMG ?>layouts/iconServicos.png" style="width:7rem;"></center>
            <div class="card-body">
              <h3 class="text-center text-dark"><strong><?php echo $servico->getNome(); ?></strong></h3>
              <?php

              $servicoDAO = $viewVar['servicoDAO'];
              $campanhaDesconto = 0;
              $campanhaDescricao = "";

              foreach ($servicoDAO->findDesconto($servico->getIdServico()) as $campanha) {
                $campanhaDesconto = $campanha[0];
                $campanhaDescricao = $campanha[1];
                $campanhaFormaPagamento = $campanha[2];
              }

              if ($campanhaDesconto > 0) { ?>
                <p class="lead text-center mb-0">Preço: R$ <?php
                                                            echo round($servico->getPreco() - $servico->getPreco() * ($campanhaDesconto / 100));
                                                            ?>,00
                </p>
                <p title="<?php echo $campanhaDescricao . " - " . $campanhaFormaPagamento; ?>" class="lead text-center text-success"><small> <?php echo $campanhaDesconto; ?>% DE DESCONTO</small></p>
              <?php
              } else { ?>
                <p class="lead text-center mb-5">Preço: R$
                  <?php echo round($servico->getPreco()); ?>,00
                </p>

              <?php
              };
              ?>
            </div>
          </div>
        </div>


        <?php if ($contador % 3 == 2) { ?>
        </div>
  <?php
        }
        $contador++;
      }
    }
  ?>
  
  
</div>


</div>

<!-- /.container -->