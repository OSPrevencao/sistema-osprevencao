<?php 
//
session_start();
if (empty($_SESSION["user_id"]) && empty($_SERVER['HTTP_PDF'])) {
	header("Location: index.php");
	exit();
}
