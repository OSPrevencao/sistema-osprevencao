

<!-- <button id="gerarpdf" class="btn btn-primary"></button> -->

<?php
include_once('funcoes.php');
include_once('sessao.php');
include_once('conexao.php');
echo inicio();

?>
<h2>Orçamentos de Clientes</h2>
<fieldset class="row2">
    <legend style="colosr:white;"></legend>
    <p>
        <?php
        
        $result = select(
            $conn,
            'empresa_dados');
            ?>
            <div class="table-responsive">
            <table class='table table-inverse table-responsive'>
                <thead>
                    <tr>
                        <th>cnpj</th>
                        <th>Empresa</th>
                        <th>telefone</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result as $row) { ?>
                    <tr>
                        <td><?php echo $row['cnpj']; ?></td>
                        <td><?php echo $row['NomeEmpresa']; ?></td>
                        <td><?php echo $row['telefone_completo']; ?></td>
                        
                        <td>
                            
                            <a href="gerador_pdf.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Gerar PDF</a>
                            <a href="exemplo.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Vizualizar Relatório de visitas</a>

                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            </div>
        </p>
    </fieldset>

    <?php
    echo final1();
    ?>


 <?php 
echo final1();
  ?>