<?php 
    include_once('funcoes.php');
    include_once('sessao.php');
    include_once('conexao.php');
    echo inicio();

    $result = select($conn,'orcamento');
    $result1 = select($conn,'nota');
    $result2 = select($conn,'despesas');
?>
<div class="container-fluid" style="text-align: center;">
    <h1>Adiministrativo</h1>
<fieldset class="row3">
    <legend><font color="white">-</font></legend>
    <p>
        <table class="table table-inverse table-responsive">
            <thead>
                <tr>
                    <th>Valor Arecadado</th>
                    <th>Valor investido no Estoque</th>
                    <th>Despesas com a Empresa</th>
                    <th>Lucro Atual</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $ValorMaoObra = 0;
                foreach ($result as $row) {
                    
                     $ValorMaoObra +=$row['ValorMaoObra'];

                      }
                ?>
                <tr>
                    <td><?php echo $ValorMaoObra ; ?></td>
                
                <?php 
                $ValorUnitario = 0;
                foreach ($result1 as $row) {
                    
                     $ValorUnitario +=$row['ValorUnitario'] * $row['quantidade_produtos'];

                      }
                ?>
                    <td><?php echo $ValorUnitario ; ?></td>

                <?php 
                $valordespesa = 0;
                foreach ($result2 as $row) {
                    
                     $valordespesa+=$row['valordespesa'];

                      }
                ?>
                    <td><?php echo  $valordespesa  ; ?></td>
                    <td><?php echo  $ValorMaoObra - $valordespesa  ; ?></td>
                </tr>
            </tbody>
        </table>
    </p>
</fieldset>
</div>
<div>
<div style="text-align: center;">Relatorio de fluxo de caixa Mensal</div>
<canvas class="line-chart"></canvas>

<script src="https://cdnjs.cloudFlare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script>
    var ctx= document.getElementsByClassName("line-chart");
     var chartGraph = new Chart(ctx,{
        type: 'line',
        data: {
            labels: ["Jan","Fev","Mar","Abr","Mai","Jun","Jul","Ago","Set","Out","Nov","Dez"],
            datasets: [
                {
                    label : "valor Arecadado",
                    data : [20000,22000,19000,16000,20000,18000,19500,23658,23258,18956,22556,23666],
                    borderWidth : 6,
                    borderColor: 'rgba(77,166,253,0.85)',
                    backgroundColor: 'transparent',
                },
                {
                    label : "valor investido",
                    data : [10000,11000,8000,7500,10000,9000,9500,15106,11503,9123,12200,11560],
                    borderWidth : 6,
                    borderColor: 'rgba(55,88,23,0.85)',
                    backgroundColor: 'transparent',
                },
            ]
        },
        option:{
            title:{
                display : true,
                fontSize: 20,
                text:"Relatorio de fluxo de caixa Mensal",
            },
            labels: {
                fontStyle: "bold",
            }
        }
     } );
</script>
</div>
<br><br>
<?php
    echo final1();
?>