<?php
include_once('funcoes.php');
include_once('sessao.php');
include_once('conexao.php');
echo inicio();
?>
<div class="card-header">
<h2>Usuários</h2>
</div>
<fieldset class="row2">
    <legend style="colosr:white;"></legend>
    <p>
        <?php
        $result = select(
            $conn,
            'empresa_dados');
            ?>
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>

                    <!-- alterar as variáveis no js -->
                    <tr role = "row">
                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Empresa</th>
                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">telefone</th>
                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Tipo de Cadastro</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result as $row) { ?>
                    <tr>
                        <td><?php echo $row['NomeEmpresa']; ?></td>
                        <td><?php echo $row['telefone_completo']; ?></td>
                        <td><?php echo $row['tipoCadastro']; ?></td>
                        <td>
                            <a id="vizualizarcadastro" href='vizualizarcadastro.php?id=<?php echo $row['id']; ?>' class = "btn btn-primary">
                                Vizualizar cadastro
                            </a>
                            <a id="alterarcadastro" href='alterarcliente.php?id=<?php echo $row['id']; ?>' class = "btn btn-primary">
                                Alterar cadastro
                            </a>
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