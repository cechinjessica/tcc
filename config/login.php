<?php
session_start();
include('conexao.php');


if(!isset($_POST['usuario']) || !isset($_POST['senha'])) {
	header('Location: ../index.php');
	exit();
}

$usuario =  $_POST['usuario'];
$senha =  $_POST['senha'];

$sql = "SELECT IdUsuario, Usuario, Nome, Email FROM login WHERE usuario = '$usuario' AND senha ='$senha'";

$res=mysqli_query($conexao,$sql);
$row=mysqli_fetch_row($res);
$idusuario= $row[0];
$usuario = $row[1];
$nome = $row[2];
$email = $row[3];

if (mysqli_affected_rows($conexao) != '0') {
	$_SESSION['idusuario'] = $idusuario;
	$_SESSION['usuario'] = $usuario;
	$_SESSION['nome'] = $nome;
	$_SESSION['email'] = $email;
	header('Location: ../contrato.php');
	exit();
}else{
	$_SESSION['nao_autenticado'] = "Usuário ou senha inválidos!";
	header('Location: ../index.php');
	exit();
}


?>
