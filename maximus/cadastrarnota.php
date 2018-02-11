<?php
include_once('funcoes.php');
include_once('sessao.php');
echo inicio();
?>
<!-- conteudo da pagina -->
<div class="card-header">Cadastro de Nota</div>
<div class="card-body">
  <form method="POST" action="cadastronota.php">
    <div class="form-group">
      <div class="form-row">
        <div class="col-md-6">
          <label for="exampleInputName">Numero do Produto</label>
          <input class="form-control" id="exampleInputName" type="text" name= "lblnumero"  placeholder="Digite o numero do produto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="btn btn-info btn-lg">Produtos</i>
            </a>
            <div class="dropdown-menu" aria-labelledby="alertsDropdown">
              <h6 class="dropdown-header">Produtos:</h6>
              <div class="dropdown-divider"></div>

              <?php
              include_once('conexao.php');
              if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              } 

              $sql = "SELECT `id`, `descricao` FROM `produto` WHERE 1";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                          // output data of each row
                while($row = $result->fetch_assoc()) {
                  echo " id : " . $row["id"]. " - Name: " . $row["descricao"]."<br>";
                }
              } else {
                echo "0 results";
              }
              ?>
            </div>
          </li>
        </div>

        <div class="col-md-6">
          <label for="exampleInputLastName">Codigo do Registro</label>
          <input class="form-control" id="exampleInputLastName" type="text" name="lblcodigo" placeholder="Digite o codigo do registro">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="btn btn-info btn-lg">Registros</i>
            </a>
            <div class="dropdown-menu" aria-labelledby="alertsDropdown">
              <h6 class="dropdown-header">Registros:</h6>
              <div class="dropdown-divider"></div>

              <?php

              $sql ="SELECT `tiporegistro`, `id` FROM `tiporegistro`";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                          // output data of each row
                while($row = $result->fetch_assoc()) {
                  echo " id : " . $row["id"]. " - Name: " . $row["tiporegistro"]."<br>";
                }
              } else {
                echo "0 results";
              }
              $conn->close();
              ?>
            </div>
          </li>




        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Quantidade de Produto</label>
      <input class="form-control" id="exampleInputEmail1" type="text" name="lblquantidade"  placeholder="Digite a quantidade de produto">
    </div>
    <input class="btn btn-primary btn-block" type="submit" name="btn" value="Registrar" >
  </form>
</div>

<?php
include_once('funcoes.php');
echo final1();
?>
