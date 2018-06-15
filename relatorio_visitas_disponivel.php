<?php
include_once('funcoes.php');
include_once('sessao.php');
include_once('conexao.php');
echo inicio();

?>
<div class="card-header">
<h2 style="text-align: center">Relatório de Visitas</h2>
</div>
<fieldset class="row2">
    <legend style="colosr:white;"></legend>
    <p>
        <?php
     

        $result = select(
            $conn,
            'empresa_dados','tipoCadastro = "Cliente"');
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
                    <?php 
                    $contt =0;
                    foreach ($result as $row) {   
                    if ($empresa[0]['id'] != $row['id']) {                   
                       ?>
                    <tr>
                        <td><?php echo $row['cnpj']; ?></td>
                        <td><?php echo $row['NomeEmpresa']; ?></td>
                        <td><?php echo $row['telefone_completo']; ?></td>
                        
                        <td>
                            <a href='relatoriovisita.php?id=<?php echo $row['id']; ?>' class = "btn btn-primary">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                    <?php 
                    $contt ++;
                }} ?>
                </tbody>
            </table>
            </div>
        </p>
    </fieldset>

    <?php
    echo final1();
    ?>
