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
<br>
<div style="text-align: center;">
<form name="frmBusca" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" >
        <div class="form-group">    
            <div class="form-row">
                <div class="col-md-6">
                    <input type="number" name="palavra" class="title_case form-control col-md-10" placeholder="Digite o Ano">
                </div>
                    <input type="submit" value="Buscar" class="btn btn-success col-md-2">
            </div>
        </div>
    </form>

    <?php
        $ano = date('o');
// Verificamos se a ação é de busca
    if (isset($_POST['palavra'])) {
        // Pegamos a palavra
        $ano= trim($_POST['palavra']);
      
    }
    echo $ano;
    ?>

</div>

<?php
//mes 1
$result3 = select($conn,'despesas',"datadespesa BETWEEN '{$ano}-01-01' AND '{$ano}-01-31'");
$mes1valordespesa = 0;
    foreach ($result3 as $row) {        
        $mes1valordespesa+=$row['valordespesa'];
    }

    //mes 2
$result3 = select($conn,'despesas',"datadespesa BETWEEN '{$ano}-02-01' AND '{$ano}-02-31'");
$mes2valordespesa = 0;
    foreach ($result3 as $row) {        
        $mes2valordespesa+=$row['valordespesa'];
    }

    //mes 3
$result3 = select($conn,'despesas',"datadespesa BETWEEN '{$ano}-03-01' AND '{$ano}-03-31'");
$mes3valordespesa = 0;
    foreach ($result3 as $row) {        
        $mes3valordespesa+=$row['valordespesa'];
    }

    //mes 4
$result3 = select($conn,'despesas',"datadespesa BETWEEN '{$ano}-04-01' AND '{$ano}-04-31'");
$mes4valordespesa = 0;
    foreach ($result3 as $row) {        
        $mes4valordespesa+=$row['valordespesa'];
    }

    //mes 5
$result3 = select($conn,'despesas',"datadespesa BETWEEN '{$ano}-05-01' AND '{$ano}-05-31'");
$mes5valordespesa = 0;
    foreach ($result3 as $row) {        
        $mes5valordespesa+=$row['valordespesa'];
    }

    //mes 6
$result3 = select($conn,'despesas',"datadespesa BETWEEN '{$ano}-06-01' AND '{$ano}-06-31'");
$mes6valordespesa = 0;
    foreach ($result3 as $row) {        
        $mes6valordespesa+=$row['valordespesa'];
    }

    //mes 7
$result3 = select($conn,'despesas',"datadespesa BETWEEN '{$ano}-07-01' AND '{$ano}-07-31'");
$mes7valordespesa = 0;
    foreach ($result3 as $row) {        
        $mes7valordespesa+=$row['valordespesa'];
    }

    //mes 8
$result3 = select($conn,'despesas',"datadespesa BETWEEN '{$ano}-08-01' AND '{$ano}-08-31'");
$mes8valordespesa = 0;
    foreach ($result3 as $row) {        
        $mes8valordespesa+=$row['valordespesa'];
    }

    //mes 9
$result3 = select($conn,'despesas',"datadespesa BETWEEN '{$ano}-09-01' AND '{$ano}-09-31'");
$mes9valordespesa = 0;
    foreach ($result3 as $row) {        
        $mes9valordespesa+=$row['valordespesa'];
    }

    //mes 10
$result3 = select($conn,'despesas',"datadespesa BETWEEN '{$ano}-10-01' AND '{$ano}-10-31'");
$mes10valordespesa = 0;
    foreach ($result3 as $row) {        
        $mes10valordespesa+=$row['valordespesa'];
    }

    //mes 11
$result3 = select($conn,'despesas',"datadespesa BETWEEN '{$ano}-11-01' AND '{$ano}-11-31'");
$mes11valordespesa = 0;
    foreach ($result3 as $row) {        
        $mes11valordespesa+=$row['valordespesa'];
    }

    //mes 12
$result3 = select($conn,'despesas',"datadespesa BETWEEN '{$ano}-12-01' AND '{$ano}-12-31'");
$mes12valordespesa = 0;
    foreach ($result3 as $row) {        
        $mes12valordespesa+=$row['valordespesa'];
    }
?>
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
                    data : [20000,22000,19000,16000,20000,0,0,0,0,0,0,0],
                    borderWidth : 6,
                    borderColor: 'rgba(77,166,253,0.85)',
                    backgroundColor: 'transparent',
                },
                {
                    label : "valor investido",
                    data : [<?php echo $mes1valordespesa ?>,<?php echo $mes2valordespesa ?>,<?php echo $mes3valordespesa ?>,<?php echo $mes4valordespesa ?>,<?php echo $mes5valordespesa ?>,<?php echo $mes6valordespesa ?>,<?php echo $mes7valordespesa ?>,<?php echo $mes8valordespesa ?>,<?php echo $mes9valordespesa ?>,<?php echo $mes10valordespesa ?>,<?php echo $mes11valordespesa ?>,<?php echo $mes12valordespesa ?>],
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