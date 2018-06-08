<<<<<<< HEAD
<?php 
    include_once('funcoes.php');
    include_once('sessao.php');
    include_once('conexao.php');
    echo inicio();
    $mes=date("m");
    $ano = date('o');

    
   
    $result = select($conn,'orcamento',"id_status_fk = 1 and dataOrcamento BETWEEN '{$ano}-{$mes}-01' AND '{$ano}-{$mes}-31'");
    $result1 = select($conn,'nota',"data_compra between '{$ano}-{$mes}-01' AND '{$ano}-{$mes}-31'");
    $result2 = select($conn,'despesas',"datadespesa between '{$ano}-{$mes}-01' AND '{$ano}-{$mes}-31'");
?>
<div class="container-fluid" style="text-align: center;">
    <h1>Adiministrativo</h1>
<fieldset class="row3">
    <legend><font color="white">-</font></legend>
    <p>
        <table class="table table-inverse table-responsive">
            <thead>
                <tr>
                    <th>Valor Arecadado </th>
                    <th>Valor investido no Estoque</th>
                    <th>Despesas com a Empresa</th>
                    <th>Lucro</th>
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
<div style="text-align: center;">Relatorio de fluxo de caixa Mensal(Historico)</div>
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
       
// Verificamos se a ação é de busca
    if (isset($_POST['palavra'])) {
        // Pegamos a palavra
        $ano= trim($_POST['palavra']);
      
    }
  
    ?>
<label>Ano de <?php echo $ano; ?></label>
</div>

<?php
//-------------------------------------------------------- despesas 
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
    //-------------------------arrecadações 
    //mes 1
$result4 = select($conn,'orcamento',"id_status_fk = 1 and dataOrcamento BETWEEN '{$ano}-01-01' AND '{$ano}-01-31'");
$mes1arrecadações = 0;
    foreach ($result4 as $row) {        
        $mes1arrecadações+=$row['ValorMaoObra'];
    }

    //mes 2
    $result4 = select($conn,'orcamento',"id_status_fk = 1 and dataOrcamento BETWEEN '{$ano}-02-01' AND '{$ano}-02-31'");
$mes2arrecadações = 0;
    foreach ($result4 as $row) {        
        $mes2arrecadações+=$row['ValorMaoObra'];
    }

    //mes 3
    $result4 = select($conn,'orcamento',"id_status_fk = 1 and dataOrcamento BETWEEN '{$ano}-03-01' AND '{$ano}-03-31'");
$mes3arrecadações = 0;
    foreach ($result4 as $row) {        
        $mes3arrecadações+=$row['ValorMaoObra'];
    }

    //mes 4
    
    $result4 = select($conn,'orcamento',"id_status_fk = 1 and dataOrcamento BETWEEN '{$ano}-04-01' AND '{$ano}-04-31'");
$mes4arrecadações = 0;
    foreach ($result4 as $row) {        
        $mes4arrecadações+=$row['ValorMaoObra'];
    }


    //mes 5
$result4 = select($conn,'orcamento',"id_status_fk = 1 and dataOrcamento BETWEEN '{$ano}-05-01' AND '{$ano}-05-31'");
$mes5arrecadações = 0;
    foreach ($result4 as $row) {        
        $mes5arrecadações+=$row['ValorMaoObra'];
    }

    //mes 6
$result4 = select($conn,'orcamento',"id_status_fk = 1 and dataOrcamento BETWEEN '{$ano}-06-01' AND '{$ano}-06-31'");
$mes6arrecadações = 0;
    foreach ($result4 as $row) {        
        $mes6arrecadações+=$row['ValorMaoObra'];
    }

    //mes 7
$result4 = select($conn,'orcamento',"id_status_fk = 1 and dataOrcamento BETWEEN '{$ano}-07-01' AND '{$ano}-07-31'");
$mes7arrecadações = 0;
    foreach ($result4 as $row) {        
        $mes7arrecadações+=$row['ValorMaoObra'];
    }

    //mes 8
$result4 = select($conn,'orcamento',"id_status_fk = 1 and dataOrcamento BETWEEN '{$ano}-08-01' AND '{$ano}-08-31'");
$mes8arrecadações = 0;
    foreach ($result4 as $row) {        
        $mes8arrecadações+=$row['ValorMaoObra'];
    }

    //mes 9
$result4 = select($conn,'orcamento',"id_status_fk = 1 and dataOrcamento BETWEEN '{$ano}-09-01' AND '{$ano}-09-31'");
$mes9arrecadações = 0;
    foreach ($result4 as $row) {        
        $mes9arrecadações+=$row['ValorMaoObra'];
    }

    //mes 10
 $result4 = select($conn,'orcamento',"id_status_fk = 1 and dataOrcamento BETWEEN '{$ano}-10-01' AND '{$ano}-10-31'");
$mes10arrecadações = 0;
    foreach ($result4 as $row) {        
        $mes10arrecadações+=$row['ValorMaoObra'];
    }

    //mes 11
 $result4 = select($conn,'orcamento',"id_status_fk = 1 and dataOrcamento BETWEEN '{$ano}-11-01' AND '{$ano}-11-31'");
$mes11arrecadações = 0;
    foreach ($result4 as $row) {        
        $mes11arrecadações+=$row['ValorMaoObra'];
    }

    //mes 12
 $result4 = select($conn,'orcamento',"id_status_fk = 1 and dataOrcamento BETWEEN '{$ano}-12-01' AND '{$ano}-12-31'");
$mes12arrecadações = 0;
    foreach ($result4 as $row) {        
        $mes12arrecadações+=$row['ValorMaoObra'];
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
                    data : [<?php echo $mes1arrecadações ?>,<?php echo $mes2arrecadações ?>,<?php echo $mes3arrecadações ?>,<?php echo $mes4arrecadações ?>,<?php echo $mes5arrecadações ?>,<?php echo $mes6arrecadações ?>,<?php echo $mes7arrecadações ?>,<?php echo $mes8arrecadações ?>,<?php echo $mes9arrecadações ?>,<?php echo $mes10arrecadações ?>,<?php echo $mes11arrecadações ?>,<?php echo $mes12arrecadações ?>],
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
=======
<?php 
    include_once('funcoes.php');
    include_once('sessao.php');
    include_once('conexao.php');
    echo inicio();
    $mes=date("m");
    $ano = date('o');

    
   
    $result = select($conn,'orcamento',"id_status_fk = 1 and dataOrcamento BETWEEN '{$ano}-{$mes}-01' AND '{$ano}-{$mes}-31'");
    $result1 = select($conn,'nota',"data_compra between '{$ano}-{$mes}-01' AND '{$ano}-{$mes}-31'");
    $result2 = select($conn,'despesas',"datadespesa between '{$ano}-{$mes}-01' AND '{$ano}-{$mes}-31'");
?>
<div class="container-fluid" style="text-align: center;">
    <h1>Adiministrativo</h1>
<fieldset class="row3">
    <legend><font color="white">-</font></legend>
    <p>
        <table class="table table-inverse table-responsive">
            <thead>
                <tr>
                    <th>Valor Arecadado </th>
                    <th>Valor investido no Estoque</th>
                    <th>Despesas com a Empresa</th>
                    <th>Lucro</th>
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
<div style="text-align: center;">Relatorio de fluxo de caixa Mensal(Historico)</div>
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
       
// Verificamos se a ação é de busca
    if (isset($_POST['palavra'])) {
        // Pegamos a palavra
        $ano= trim($_POST['palavra']);
      
    }
  
    ?>
<label>Ano de <?php echo $ano; ?></label>
</div>

<?php
//-------------------------------------------------------- despesas 
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
    //-------------------------arrecadações 
    //mes 1
$result4 = select($conn,'orcamento',"id_status_fk = 1 and dataOrcamento BETWEEN '{$ano}-01-01' AND '{$ano}-01-31'");
$mes1arrecadações = 0;
    foreach ($result4 as $row) {        
        $mes1arrecadações+=$row['ValorMaoObra'];
    }

    //mes 2
    $result4 = select($conn,'orcamento',"id_status_fk = 1 and dataOrcamento BETWEEN '{$ano}-02-01' AND '{$ano}-02-31'");
$mes2arrecadações = 0;
    foreach ($result4 as $row) {        
        $mes2arrecadações+=$row['ValorMaoObra'];
    }

    //mes 3
    $result4 = select($conn,'orcamento',"id_status_fk = 1 and dataOrcamento BETWEEN '{$ano}-03-01' AND '{$ano}-03-31'");
$mes3arrecadações = 0;
    foreach ($result4 as $row) {        
        $mes3arrecadações+=$row['ValorMaoObra'];
    }

    //mes 4
    
    $result4 = select($conn,'orcamento',"id_status_fk = 1 and dataOrcamento BETWEEN '{$ano}-04-01' AND '{$ano}-04-31'");
$mes4arrecadações = 0;
    foreach ($result4 as $row) {        
        $mes4arrecadações+=$row['ValorMaoObra'];
    }


    //mes 5
$result4 = select($conn,'orcamento',"id_status_fk = 1 and dataOrcamento BETWEEN '{$ano}-05-01' AND '{$ano}-05-31'");
$mes5arrecadações = 0;
    foreach ($result4 as $row) {        
        $mes5arrecadações+=$row['ValorMaoObra'];
    }

    //mes 6
$result4 = select($conn,'orcamento',"id_status_fk = 1 and dataOrcamento BETWEEN '{$ano}-06-01' AND '{$ano}-06-31'");
$mes6arrecadações = 0;
    foreach ($result4 as $row) {        
        $mes6arrecadações+=$row['ValorMaoObra'];
    }

    //mes 7
$result4 = select($conn,'orcamento',"id_status_fk = 1 and dataOrcamento BETWEEN '{$ano}-07-01' AND '{$ano}-07-31'");
$mes7arrecadações = 0;
    foreach ($result4 as $row) {        
        $mes7arrecadações+=$row['ValorMaoObra'];
    }

    //mes 8
$result4 = select($conn,'orcamento',"id_status_fk = 1 and dataOrcamento BETWEEN '{$ano}-08-01' AND '{$ano}-08-31'");
$mes8arrecadações = 0;
    foreach ($result4 as $row) {        
        $mes8arrecadações+=$row['ValorMaoObra'];
    }

    //mes 9
$result4 = select($conn,'orcamento',"id_status_fk = 1 and dataOrcamento BETWEEN '{$ano}-09-01' AND '{$ano}-09-31'");
$mes9arrecadações = 0;
    foreach ($result4 as $row) {        
        $mes9arrecadações+=$row['ValorMaoObra'];
    }

    //mes 10
 $result4 = select($conn,'orcamento',"id_status_fk = 1 and dataOrcamento BETWEEN '{$ano}-10-01' AND '{$ano}-10-31'");
$mes10arrecadações = 0;
    foreach ($result4 as $row) {        
        $mes10arrecadações+=$row['ValorMaoObra'];
    }

    //mes 11
 $result4 = select($conn,'orcamento',"id_status_fk = 1 and dataOrcamento BETWEEN '{$ano}-11-01' AND '{$ano}-11-31'");
$mes11arrecadações = 0;
    foreach ($result4 as $row) {        
        $mes11arrecadações+=$row['ValorMaoObra'];
    }

    //mes 12
 $result4 = select($conn,'orcamento',"id_status_fk = 1 and dataOrcamento BETWEEN '{$ano}-12-01' AND '{$ano}-12-31'");
$mes12arrecadações = 0;
    foreach ($result4 as $row) {        
        $mes12arrecadações+=$row['ValorMaoObra'];
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
                    data : [<?php echo $mes1arrecadações ?>,<?php echo $mes2arrecadações ?>,<?php echo $mes3arrecadações ?>,<?php echo $mes4arrecadações ?>,<?php echo $mes5arrecadações ?>,<?php echo $mes6arrecadações ?>,<?php echo $mes7arrecadações ?>,<?php echo $mes8arrecadações ?>,<?php echo $mes9arrecadações ?>,<?php echo $mes10arrecadações ?>,<?php echo $mes11arrecadações ?>,<?php echo $mes12arrecadações ?>],
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
>>>>>>> 397f6173383e684d0e98dbd07cfd5dd123197800
