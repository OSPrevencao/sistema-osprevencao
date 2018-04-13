<?php 

session_start();

//só é necessario destruir a sessão se houve login de algum usuario
if (isset($_SESSION["user_id"])) {
	$_SESSION = [];
	session_destroy();

}

header("Location: index.php");
exit();
