<?php 
//realizar a filtragem por numero nota
//colocar numero da nota e data da compra
//colocar botão vizualizar nota
include_once('funcoes.php');
include_once('sessao.php');
include_once('conexao.php');
echo inicio();
?>
<div class="card-header">
    <h2>Notas</h2>
</div>
<fieldset class="row2">
    <legend style="colosr:white;"></legend>
    <p>
        <?php
        $result = select(
            $conn,
            'nota');
            ?>
            <div class="card-group">
            <?php 
            $contt = 0;
            foreach ($result as $row) {
                if ($contt == 0) {

                 ?>
                 <div class="card flex_wrap_container">
                 <a href="visualizarNota.php?numero_nota=<?php echo $row['numero_nota']; ?>">
                    <div class="card text-white bg-dark col-mb-3" style="max-width: 18rem;">
                      <div class="card-header"><b>Numero da nota:</b> <?php echo $row['numero_nota']; ?></div>
                      <div class="card-body">
                        <?php $data = select($conn, "nota", "numero_nota = ".$row['numero_nota']."","data_compra"); ?>
                        <h6 class="card-title">Data da Compra <?php print_r($data[0]['data_compra']); ?></h6>
                        <p class="card-text"></p>
                    </div>
                </div>
              </a>
            </div>
        </div>
            <?php 
            $var_num_nota = $row['numero_nota'];
            $contt ++;
        }elseif ($contt != 0 && $var_num_nota != $row['numero_nota']) {?>
            <div class="card">
                 <a href="visualizarNota.php?numero_nota=<?php echo $row['numero_nota']; ?>">
                    <div class="card text-white bg-dark col-mb-3" style="max-width: 18rem;">
                      <div class="card-header"><b>Numero da nota:</b> <?php echo $row['numero_nota']; ?></div>
                      <div class="card-body">
                        <?php $data = select($conn, "nota", "numero_nota = ".$row['numero_nota']."","data_compra"); ?>
                        <h6 class="card-title">Data da Compra <?php print_r($data[0]['data_compra']); ?></h6>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>


        <?php                  
        $var_num_nota = $row['numero_nota'];

    }
} ?>
<div class="card">
<a href="cadastrarnota.php">
    <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
      <div class="card-header">Adicionar Nota</div>
      <div class="card-body">
        <p class="card-text"><i class="fa fa-plus " aria-hidden="true"></i></p>
    </div>
</div>
</a>

</div>
<?php
echo final1();
?>
