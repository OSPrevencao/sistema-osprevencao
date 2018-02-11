<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="\\favicon.png" />
  <title>Maximus Prevenção de Incêndios</title>
  <!-- Bootstrap core CSS-->
  <link href="{{ asset("vendor/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="{{ asset("vendor/font-awesome/css/font-awesome.min.css") }}" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="{{ asset("vendor/datatables/dataTables.bootstrap4.css") }}" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="{{ asset("css/sb-admin.css") }}" rel="stylesheet">
  <link href = "\\style.css" rel ="stylesheet">
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

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Agenda">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#Agenda">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Agenda</span>
          </a>
          <ul class="sidenav-second-level collapse" id="Agenda">
            <li>
              <a href="agenda.php">Agendar Visita</a>
            </li>
            <li>
              <a href="agenda.php">Agendar Obra</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Estoque">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Estoque </span>
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
            <li>
              <a href="estoque.php">Produtos em Estoque</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Administrativo">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#Administrativo" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text">Administrativo</span>
          </a>
          <ul class="sidenav-second-level collapse" id="Administrativo">
            <li>
              <a href="#">Gerar Orçamento</a>
            </li>
            <li>
              <a href="#">Gerar Relatorio Gerencial</a>
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
      <div class="container-fluid">
@yield('content')

        <!-- /.content-wrapper-->
        <footer class="sticky-footer">
          <div class="container">
            <div class="text-center">
              <small>Copyright © Maximus Corp 2017</small>
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
        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset("vendor/jquery/jquery.min.js") }}"></script>
        <script src="{{ asset("vendor/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
        <!-- Core plugin JavaScript-->
        <script src="{{ asset("vendor/jquery-easing/jquery.easing.min.js") }}"></script>
        <!-- Page level plugin JavaScript-->
        <script src="{{ asset("vendor/chart.js/Chart.min.js") }}"></script>
        <script src="{{ asset("vendor/datatables/jquery.dataTables.js") }}"></script>
        <script src="{{ asset("vendor/datatables/dataTables.bootstrap4.js") }}"></script>
        <!-- Custom scripts for all pages-->
        <script src="{{ asset("js/sb-admin.min.js") }}"></script>
        <!-- Custom scripts for this page-->
        <script src="{{ asset("js/sb-admin-datatables.min.js") }}"></script>
        <script src="{{ asset("js/sb-admin-charts.min.js") }}"></script>
      </div>
    </body>

    </html>
