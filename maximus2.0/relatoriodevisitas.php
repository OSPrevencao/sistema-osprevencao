<?php
include_once('funcoes.php');
include_once('sessao.php');
echo inicio();
?>

      <!-- conteudo da pagina -->

      <div class="card-header">Gerar de Orçamento</div>
      <div class="card-body">
        <form method="POST"  name="gerarorcamento" id="gerarorcamento" action="#">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">Nome da Empresa</label>
                <input class="form-control" id="lblnome" type="text" name= "lblnomeempresa"  placeholder="Digite o nome da empresa">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">CNPJ da Empresa</label>
                <input class="form-control" id="lblcnpj" type="text" name="lblcnpj" placeholder="Digite o CNPJ da empresa" maxlength="14">
              </div>
               <div class="col-md-6">
                <label for="exampleInputLastName">Serviço</label>
                <input class="form-control" id="lblservico" type="text"  name="lblservico" placeholder="Digite o seriço a ser prestado.">
              </div>
               <div class="col-md-6">
                <label for="exampleInputLastName">Valor</label>
                <input class="form-control" id="lblvalor" type="text" name="lblvalor" placeholder="Digite o valor cobrado." maxlength="10">
              </div> 
              <label class="col-md-6" for="exampleInputLastName">Usar Materiais</label>
              <div class="col-md-12">
              	<button type="button" class="btn-toggle col-md-12" data-element="#minhaDiv">Usar materiais </button></div>
               <div class="col-md-12" id="minhaDiv" ng-init="minhaDiv = false" ng-show="minhaDiv" style="display: none">
               	<form method="POST"  name="gerarorcamento" id="gerarorcamento" action="#">
          	<div class="form-group">
            <div class="form-row">
              <div class="col-md-6" id="resultado_busca">
              	<form action="" method="post" enctype="multipart/form-data" id="form_busca">
      <label>
        <span>Buscar Produto</span>
        <input type="text" name="buscar" id="busca" />
      </label>
    </form>

    <div id="resultado_busca">
      
    </div>

    <form action="" method="post" enctype="multipart/form-data">
      <table border="0" cellpadding="0" cellspacing="0" width="80%">
        <thead>
          <tr>
            <td>Produto</td>
            <td>Valor</td>
            <td>Qtd</td>
            <td>Subtotal</td>
          </tr>
        </thead>

        <tbody id="content_retorno">
          <?php
          $total = 0;
          if(count($_SESSION['carrinho']) > 0):
          foreach($_SESSION['carrinho'] as $idProd => $qtd){
            $pegaProduto = $pdo->prepare("SELECT * FROM `produtos` WHERE `id` = ?");
            $pegaProduto->execute(array($idProd));
            $dadosProduto = $pegaProduto->fetchObject();
            $subTotal = ($dadosProduto->valor*$qtd);
            $total += $subTotal;
            
            echo '<tr><td>'.utf8_encode($dadosProduto->titulo).'</td><td>Valor</td><td><input type="text" id="qtd" value="'.$qtd.'" size="3" /></td>';
            echo '<td>R$ '.number_format($subTotal, 2, ',', '.').'</td></tr>';
            
          }
          echo '<tr><td colspan="3">Total</td><td id="total">R$ '.number_format($total, 2, ',','.').'</td></tr>';
          endif;
          ?>
        </tbody>
      </table>
      <input type="submit" value="Concluir compra" class="botao" />
    </form> 
            	 </div>
          		</div>
      			</div>
  				</form>

               	
              </div> 
            </div>
          </div>
           <input class="btn btn-primary btn-block" type="submit" name="button" value="Registrar">
            </form>
        </div>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script >
    $(function(){
        $(".btn-toggle").click(function(e){
            e.preventDefault();
            el = $(this).data('element');
            $(el).toggle();
        });
    });
  </script>
  <?php
echo final1();
?>

    
   