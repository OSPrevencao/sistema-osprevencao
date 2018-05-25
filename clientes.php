<?php
    include_once('funcoes.php');
    include_once('sessao.php');
    include_once('conexao.php');
    echo inicio();
    $result = select(
        $conn,
        'empresa_dados');

?>
    <div class="card-header">
        <h2>Clientes/Fornecedores</h2>
    </div>

    <div class=" card-header ">
        <form name="frmBusca" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" >
            <div class="form-group">    
                <div class="form-row">
                    <div class="col-sm-6">
                        <input type="text" name="palavra" class="title_case form-control col-sm-10">
                    </div>
                    <div class="col-sm-6">
                        <input type="submit" value="Buscar" class="btn btn-success col-sm-2">
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div>
    <?php
        // Verificamos se a ação é de busca
        if (isset($_POST['palavra'])) {
            // Pegamos a palavra
            $palavra = trim($_POST['palavra']);
            $sql = select(
                $conn,
                'empresa_dados',
                "NomeEmpresa LIKE '%{$palavra}%'",
                "NomeEmpresa, telefone_completo"

            );

            echo listaRegistro($sql, [
                'NomeEmpresa' => 'Nome: ',
                'telefone_completo' => 'Telefone: '
            ]);

        }
    ?>
    </div>


    <fieldset class="row2">
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
                                <a id="vizualizarcadastro" href='visualizarcadastro.php?id=<?php echo $row['id']; ?>' class = "btn btn-primary">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>

                                </a>
                                <br>
                                <a id="alterarcadastro" href='alterarcliente.php?id=<?php echo $row['id']; ?>' class = "btn btn-primary">

                                <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
    </fieldset>

    <?php
    echo final1();
    ?>