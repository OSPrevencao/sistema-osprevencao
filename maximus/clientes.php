<?php
include_once('funcoes.php');
include_once('sessao.php');
include_once('conexao.php');
echo inicio();

?>
<h1>Clientes/Fornecedores Cadastrados</h1>
<fieldset class="row2">
    <legend style="colosr:white;"></legend>
    <p>
        <?php
        

        $result = select(
            $conn,
            'empresa_dados');
            ?>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <!-- class='table table-inverse table-responsive'  -->
                <thead>
                    <tr>
                        <th>cnpj</th>
                        <th>Empresa</th>
                        <th>telefone</th>
                        <th>CEP</th>
                        <th>Endereco</th>
                        <th>cidade</th>
                        <th>estado</th>
                        <th>Tipo de Cadastro</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result as $row) { ?>
                    <tr>
                        <td><?php echo $row['cnpj']; ?></td>
                        <td><?php echo $row['NomeEmpresa']; ?></td>
                        <td><?php echo $row['telefone_completo']; ?></td>
                        <td><?php echo $row['CEP']; ?></td>
                        <td><?php echo $row['endereco_completo']; ?></td>
                        <td><?php echo $row['cidade']; ?></td>
                        <td><?php echo $row['estado']; ?></td>
                        <td><?php echo $row['tipoCadastro']; ?></td>
                        <td>
                            <a href='alterarcliente.php?id=<?php echo $row['id']; ?>' class = "btn btn-primary">
                                Alterar cadastro
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </p>
    </fieldset>

    <?php
    echo final1();
    ?>