<?php
$_POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
$_GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);

function inicio()
{
	return '<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="\\favicon.png" />
  <title>Maximus Prevenção de Incêndios</title>
  <!-- Bootstrap core CSS-->
  <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
    <!-- <link href="assets/datatables/dataTables.bootstrap4.css" rel="stylesheet">-->
  <link href="assets/fullcalendar-3.9.0/fullcalendar.min.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

  <!--<link href = "\\style.css" rel ="stylesheet">-->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  
  <link href = "css/main.css" rel ="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark fundo" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
  <a class="navbar-brand" href="paginainicial.php">Maximus</a>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

      <li class="nav-item" data-toggle="tooltip" data-placement="right" >
        <a class="nav-link" href="clientes.php">
          <i class="fa fa-address-card-o"></i>
          <span>Clientes/Fornecedores</span>
        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" >
        <a class="nav-link " href="estoque.php" >
          <i class="fa fa-archive"></i>
          <span href="estoque.php">Produtos em Estoque</span>
          <!-- </li> -->
        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" >
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#Agenda">
          <i class="fa fa-calendar"></i>
          <span class="nav-link-text">Agenda</span>
        </a>
        <ul class="sidenav-second-level collapse" id="Agenda">
          <li>
            <a href="agenda.php">Agenda</a>
          </li>
          <li>
            <a href="relatorio_visitas_disponivel.php">Relatório de Visitas</a>
          </li>
        </ul>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" >
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
          <i class="fa fa-book"></i>
          <span class="nav-link-text">Cadastro </span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseExamplePages">
          <li>
            <a href="cadastrarproduto.php">Cadastrar Produto</a>
          </li>
          <li>
            <a href="cadastrarnota.php">Cadastrar Nota</a>
          </li><li>
            <a href="cadastrarusuario.php">Cadastrar Usuário</a>
          </li>
          <li>
            <a href="cadastrarcliente.php">Cadastrar Cliente</a>
          </li>
          <li>
            <a href="cadastrarfornecedor.php">Cadastrar Fornecedor</a>
          </li>

        </li>
        <!-- <li class="nav-item" data-toggle="tooltip" data-placement="right" >
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Estoque </span>
          </a> -->
          <!-- <li> -->
            <!-- </li> -->
          </ul>

          <li class="nav-item" data-toggle="tooltip" data-placement="right" >
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#Administrativo" data-parent="#exampleAccordion">
              <i class="fa fa-fw fa-sitemap"></i>
              <span class="nav-link-text">Administrativo</span>
            </a>
            <ul class="sidenav-second-level collapse" id="Administrativo">
              <li>
                <a href="orcamentos.php">Orçamentos</a>
              </li>
              <li>
                <a href="#">Gerar Relatorio Gerencial</a>
              </li>
              <li>
                <a href="visualizarusuario.php">Usuários</a>
              </li>
            </ul>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" data-toggle="modal" data-target="#exampleModal" href="logout.php">
              <i class="fa fa-fw fa-sign-out"></i>Logout</a>
            </li>
          </ul>
        </div>
      </nav>
  <div class="content-wrapper">
    <div class="container-fluid">';
}
function final1()
{
  $calendarCredentials = include_once('config/calendar-credentials.php');
  $calendarCredentials = json_encode($calendarCredentials);

  $calendarClientId = file_get_contents('config/calendar_client_id.json');
  return'<!-- /.content-wrapper-->
         <footer  class="sticky-footer">
          <div class="container">
            <div class="text-center">
              <small>Copyright © Maximus Corp 2018</small>
            </div>
          </div>
        </footer>
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
          <i class="fa fa-angle-up"></i>
        </a>
        <!-- Logout Modal-->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pronto para sair?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">Deseja realmente sair da sua conta?</div>
              <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-primary" href="logout.php">Sair</a>
              </div>
            </div>
          </div>
        </div>
        <script>var calendarCredentials = '.$calendarCredentials.';</script>
        <script>var calendarClientId = '.$calendarClientId.';</script>
        <!--Jquery menu pesquisa-->
        <!--<script type="text/javascript" src="js/jquery-2.1.0.js"></script>-->
        <!-- Bootstrap core JavaScript-->
        <script src="assets/jquery/jquery-3.3.1.min.js"></script>
        <script src="js/jquery.maskedinput.min.js" type ="text/javascript"></script>
        <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="assets/jquery-easing/jquery.easing.min.js"></script>
        <!-- Page level plugin JavaScript-->
        <script src="assets/chart.js/Chart.min.js"></script>
        <script src="assets/datatables/jquery.dataTables.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="assets/datatables/dataTables.bootstrap4.js"></script>
        <script src="assets/fullcalendar-3.9.0/lib/moment.min.js"></script>
        <script src="assets/fullcalendar-3.9.0/fullcalendar.min.js"></script>
        <script src="assets/fullcalendar-3.9.0/gcal.min.js"></script>
        <script src="assets/fullcalendar-3.9.0/locale-all.js"></script>
        <script src="assets/bootbox/bootbox.min.js"></script>
        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin.min.js"></script>
        <!-- Custom scripts for this page-->
        <!-- <script src="js/sb-admin-datatables.min.js"></script>-->
       <!-- <script src="js/sb-admin-charts.min.js"></script>-->
       <!-- <script src="js/add-google-calendar.js"></script>-->
        <script src="js/main.js"></script>
        <script src="js/fullcalendar.js"></script>
      </div>
    </body>

    </html>
';
}

function inicioAutenticacao()
{
  return '<!DOCTYPE html>
    <html lang="pt-br">

    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>SB Admin - Start Bootstrap Template</title>
      <!-- Bootstrap core CSS-->
      <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom fonts for this template-->
      <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
      <!-- Custom styles for this template-->
      <link href="css/sb-admin.css" rel="stylesheet">
      <link href="css/main.css" rel="stylesheet">
    </head>

    <body class="bg-dark autenticacao">';
}

function finalAutenticacao()
{
  return '<!-- Bootstrap core JavaScript-->
      <script src="assets/jquery/jquery-3.3.1.min.js"></script>
      <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- Core plugin JavaScript-->
      <script src="assets/jquery-easing/jquery.easing.min.js"></script>
    </body>

    </html>
    ';
}

function insert(mysqli $conn, string $tabela, array $fields)
{
  //itera sobre os campos informados
  //separando os nomes dos campos dos valores
  $fieldNames = [];
  $fieldsValues = [];
  foreach ($fields as $fieldName => $fieldValue) {
    $fieldNames[] = $fieldName;
    
    //se o valor para o campo conter um parentese 
    //considera como função do mysql
    $fieldsValues[] = (FALSE === stripos($fieldValue, '(')) 
        ? "'{$fieldValue}'"
        : $fieldValue;

  }

  $fieldNames = implode(", ", $fieldNames);
  $fieldsValues = implode(", ", $fieldsValues);

  //prepara a instrução do insert
  $insert = "INSERT INTO {$tabela} ({$fieldNames}) VALUES ({$fieldsValues});";
  // echo "<pre>";
  // var_dump($fields);
  // echo "</pre>";
  // echo $insert;
  //se a atualização falhar retorna falso
  if (!mysqli_query($conn, $insert)) {
    return FALSE;
  }

  //se a atualização foi feita retorna o ultimo id inserido
  return mysqli_insert_id($conn);

}

/**
 * Faz um select utilizando mysqli e retona um array com todas as linhas da busca
 * @example  select($con) [<description>]
 *
 * 
 * @param  mysqli variavel de conexão
 * @param  string nome da tabela
 * @param  string condicional de busca a ser utilizado, opcional
 * @param  string campos a serem retornados, opcional
 * @return array lista contendo todas as linhas pertinentes ao select feito 
 */
function select(
    mysqli $conn,
    string $tabela,
    string $where = "",
    string $fieldsToSelect = "*"
): array {
  //verifica se existe a utilização de um where
  $where = (!empty($where)) ? "WHERE {$where}" : "";
  
  //prepara a sql  a ser utilizado
  $sql = sprintf(
      "SELECT %s FROM %s %s;", $fieldsToSelect, $tabela, $where
  );

  //realiza abusca no banco
  $selectResult = mysqli_query($conn, $sql);

  if (empty($selectResult)) {
    throw new Exception(mysqli_error($conn), mysqli_errno($conn));
  }
  
  //recupera a busca como array e devolve para uso posterior
  $result = mysqli_fetch_all($selectResult, MYSQLI_ASSOC);
  return $result;
}

function verif_login(){}

function isSelected($value, $valueCheck)
{
  if ($value == $valueCheck) {
    return 'selected';
  }
  return '';

}

function update(
    mysqli $conn,
    string $tabela,
    array $inFields,
    string $where = ""
): bool {
  //verifica se existe a utilização de um where
  $where = (!empty($where)) ? "WHERE {$where}" : "";
  
  //prepara campos
  $fieldsStr = [];
  foreach ($inFields as $fieldName => $fieldValue) {
    $fieldsStr[] = "{$fieldName} = '{$fieldValue}'";
  }

  //prepara a sql  a ser utilizado
  $sql = sprintf(
      "UPDATE %s SET %s %s;", $tabela, implode(', ', $fieldsStr), $where
  );
  // echo $sql;

  //realiza abusca no banco
  $selectResult = mysqli_query($conn, $sql);

  if (empty($selectResult)) {
    throw new Exception(mysqli_error($conn), mysqli_errno($conn));
  }

  return true;     
}

function listaRegistro(
  array $info,
  array $structure,
  string $notFoundMsg = "Registro não encontrado! :("
) :string {
  if (empty($info)) {
    return $notFoundMsg;
  }

  $html = "";
  foreach ($info as $row) {
    $html .= "<p>";
    foreach ($row as $fieldName => $field) {
      $html .= "<strong>".$structure[$fieldName].": </strong>".$field."&nbsp;&nbsp;";
    }
    $html .= "</p>";
  }

  return $html;
}