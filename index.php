<?php 
session_start();
include_once"controller/controller.php";

if (isset($_GET['task'])) {
	$task = $_GET['task'];
	$c = new controller();
	$c->$task();
}else{
	$c = new controller();
	$c->home();
}



 ?>