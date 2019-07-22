<?php
session_start();
include('conexao.php');


if(!isset($_POST['usuario']) || !isset($_POST['senha'])) {
	header('Location: ../index.php');
	exit();
}


$usuario =  $_POST['usuario'];
$senha =  $_POST['senha'];

$query = "select usuariooid, usuario from login where usuario = '$usuario' and senha ='$senha'";
echo $query;

$result = mysqli_query($conexao, $query);
//var_dump($result);

$row = mysqli_num_rows($result);

if($row == 1) {
	$_SESSION['usuario'] = $usuario;
	header('Location: ../Vendedor.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: ../index.php');
	exit();
}

?>
