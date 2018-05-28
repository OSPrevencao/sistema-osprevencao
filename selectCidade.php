 <?php 
 include_once('funcoes.php');
 include_once('conexao.php');

//AQUI
$estado = $_GET['estado']; //<<<-----kkkkkkkkkkkkkkkkk
//LEIA
$cidades= select($conn, "cidade", "id_estado_fk = {$estado}");

exit( json_encode( $cidades ) );
