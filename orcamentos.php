<?php
include_once('funcoes.php');
include_once('sessao.php');
include_once('conexao.php');
echo inicio();


?>
<h2>Orçamentos de Clientes</h2>
<?php


echo "<pre>";
var_dump($_SERVER);
echo "</pre>";
?>
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Aguardando Aprovação</a>
</li>
<li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="fa fa-check" aria-hidden ="true" style="font-size:20px"></i>   Aprovados</a>
</li>
<li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"><i class="fa fa-times" aria-hidden ="true" style="font-size:20px"></i>   Recusados</a>
</li>
<li class="nav-item">
    <a class="nav-link" id="last-tab" data-toggle="tab" href="#last" role="tab" aria-controls="last" aria-selected="false"><i class="fa fa-archive" aria-hidden ="true" style="font-size:20px"></i>   Arquivados</a>
</li>
</ul>
<div class="tab-content" id="myTabContent">
   <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

        <fieldset class="row2">
            <legend style="colosr:white;"></legend>
            <p>
                <?php

                $result = select(
                    $conn,
                    "orcamento", "id_status_fk = 3");
                ?>
                <div class="table-responsive">
                    <table class='table table-inverse table-responsive'>
                        <thead>
                            <tr>
                                <th></th>
                                <th>Cliente</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($result as $row) { 
                                $nome_empresa = select(
                                    $conn,
                                    "empresa", "id = {$row['empresa_fk']}", "NomeEmpresa");
                            ?>
                            <tr>
                                <td><?php print_r($row['id']) ?></td>
                                <td><?php print_r($nome_empresa[0]['NomeEmpresa']) ?></td>
                                <td>

                                    <a href="orcamentoAprovadoStatus.php?id=<?php echo $row['id']; ?>" class="btn btn-success">
                                        <i class="fa fa-check" aria-hidden ="true" style="font-size:20px"></i>
                                    </a>
                                    <a href="orcamentoRecusadoStatus.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">
                                        <i class="fa fa-times" aria-hidden ="true" style="font-size:20px"></i>
                                    </a>
                                    <a href="gerador_pdf.php?id=<?php echo $row['id']; ?>" class="btn btn-dark">
                                        <i class="fa fa-file-pdf-o" aria-hidden ="true" style="font-size:20px"></i>
                                    </a>
                                    <a href="exemplo.php?id=<?php echo $row['id']; ?>" class="btn btn-dark">
                                        <i class="fa fa-eye" aria-hidden ="true" style="font-size:20px"></i>
                                    </a>
                                    <a href="orcamentoArquivadoStatus.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">
                                        <i class="fa fa-archive" aria-hidden ="true" style="font-size:20px"></i>
                                    </a>

                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </p>
        </fieldset>
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <fieldset class="row2">
            <legend style="colosr:white;"></legend>
            <p>
                <?php

                $result = select(
                    $conn,
                    "orcamento", "id_status_fk = 1");
                ?>
                <div class="table-responsive">
                    <table class='table table-inverse table-responsive'>
                        <thead>
                            <tr>
                                <th>Numero do Orçamento</th>
                                <th>Cliente</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($result as $row) { 
                                $nome_empresa = select(
                                    $conn,
                                    "empresa", "id = {$row['empresa_fk']}", "NomeEmpresa");
                                    ?>
                            <tr>
                                <td><?php print_r($row['id']) ?></td>
                                <td><?php print_r($nome_empresa[0]['NomeEmpresa']) ?></td>

                                <td>
                                    <a href="gerador_pdf.php?id=<?php echo $row['id']; ?>" class="btn btn-dark">
                                        <i class="fa fa-file-pdf-o" aria-hidden ="true" style="font-size:20px"></i>
                                    </a>
                                    <a href="exemplo.php?id=<?php echo $row['id']; ?>" class="btn btn-dark">
                                        <i class="fa fa-eye" aria-hidden ="true" style="font-size:20px"></i>
                                    </a>
                                    <a href="orcamentoArquivadoStatus.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">
                                        <i class="fa fa-archive" aria-hidden ="true" style="font-size:20px"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </p>
        </fieldset>
    </div>
    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
        <fieldset class="row2">
            <legend style="colosr:white;"></legend>
                <p>
                    <?php
                    $result = select(
                        $conn,
                        "orcamento", "id_status_fk = 2");
                    ?>
                    <div class="table-responsive">
                        <table class='table table-inverse table-responsive'>
                            <thead>
                                <tr>
                                    <th>Numero do Orçamento</th>
                                    <th>Cliente</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($result as $row) { 
                                    $nome_empresa = select(
                                        $conn,
                                        "empresa", "id = {$row['empresa_fk']}", "NomeEmpresa");
                                ?>
                                <tr>
                                    <td><?php print_r($row['id']) ?></td>
                                    <td><?php print_r($nome_empresa[0]['NomeEmpresa']) ?></td>

                                    <td>
                                        <a href="gerador_pdf.php?id=<?php echo $row['id']; ?>" class="btn btn-dark">
                                            <i class="fa fa-file-pdf-o" aria-hidden ="true" style="font-size:20px"></i>
                                        </a>
                                        <a href="exemplo.php?id=<?php echo $row['id']; ?>" class="btn btn-dark">
                                            <i class="fa fa-eye" aria-hidden ="true" style="font-size:20px"></i>
                                        </a>
                                        <a href="orcamentoArquivadoStatus.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">
                                            <i class="fa fa-archive" aria-hidden ="true" style="font-size:20px"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </tbody>
                    </table>
                </div>
            </p>
        </fieldset>
    </div>
    <div class="tab-pane fade" id="last" role="tabpanel" aria-labelledby="last-tab">
        <fieldset class="row2">
            <legend style="colosr:white;"></legend>
            <p>
            <?php
            $result = select(
                $conn,
                "orcamento", "id_status_fk = 4");

            ?>

                <div class="table-responsive">
                    <table class='table table-inverse table-responsive'>
                        <thead>
                            <tr>
                                <th>Numero do Orçamento</th>
                                <th>Cliente</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($result as $row) { 
                                $nome_empresa = select(
                                    $conn,
                                    "empresa", "id = {$row['empresa_fk']}", "NomeEmpresa");
                            ?>
                            <tr>
                                <td><?php print_r($row['id']) ?></td>
                                <td><?php print_r($nome_empresa[0]['NomeEmpresa']) ?></td>

                                <td>
                                    <a href="gerador_pdf.php?id=<?php echo $row['id']; ?>" class="btn btn-dark">
                                        <i class="fa fa-file-pdf-o" aria-hidden ="true" style="font-size:20px"></i>
                                    </a>
                                    <a href="exemplo.php?id=<?php echo $row['id']; ?>" class="btn btn-dark">
                                        <i class="fa fa-eye" aria-hidden ="true" style="font-size:20px"></i>
                                    </a>
                                    <a href="orcamentoArquivadoStatus.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">
                                        <i class="fa fa-archive" aria-hidden ="true" style="font-size:20px"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </p>
        </fieldset>
    </div>
</div>

<?php
    echo final1();
?>