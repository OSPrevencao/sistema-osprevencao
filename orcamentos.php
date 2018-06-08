<<<<<<< HEAD
<?php
include_once('funcoes.php');
include_once('sessao.php');
include_once('conexao.php');
echo inicio();

?>
<h2>Orçamentos de Clientes</h2>
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Aguardando Aprovação</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Aprovados</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Recusados</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Arquivados</a>
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

</div>
<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

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

</div>
</div>

<?php
echo final1();
?>
=======
<?php
include_once('funcoes.php');
include_once('sessao.php');
include_once('conexao.php');
echo inicio();

?>
<h2>Orçamentos de Clientes</h2>
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Aguardando Aprovação</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Aprovados</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Recusados</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Arquivados</a>
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


  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

  ...

</div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

  ...

</div>
<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

  ...

</div>
</div>

<?php
echo final1();
?>
>>>>>>> 397f6173383e684d0e98dbd07cfd5dd123197800
