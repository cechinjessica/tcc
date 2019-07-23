<?php
session_start();
require 'conexao.php';


if (isset($_POST['usuario']) & isset($_POST['senha'])){
	$usuario = $_POST["usuario"];
	$senha= $_POST["senha"];


	$sql = "SELECT * FROM login WHERE usuario='$usuario'";
	mysqli_query($conexao,$sql);
	echo $sql;
	//$con->query($sql);
	if (mysqli_affected_rows($conexao)!=0) {
		mysqli_close($conexao);
		$_SESSION['msg'] = "<p class='alert alert-danger' role='alert'>Usuário $usuario já existe</p>";
		header('Location:../cadastrese.php');
	}

	else {
		$sql = "INSERT INTO login (usuario, senha) VALUES ('$usuario', '$senha')";
		//echo $sql;
		//echo 'cadastrou';

		mysqli_query($conexao,$sql);
		if (mysqli_affected_rows($conexao)!=0) {
			//echo "Usuario $nome inserido com sucesso!";
			$_SESSION['msg'] = "<p class='alert alert-success' role='alert'>Usuário $usuario cadastrado com sucesso! </p>";
			header('Location:../index.php');
		} else {
			$_SESSION['msg'] ="<p class='alert alert-danger' role='alert'>Erro: " . $sql . "<br/>" . mysqli_error($conexao) . "</p>" . "<br/>";
			header('Location:../cadastrese.php');
		}
		mysqli_close($conexao);
	}
}

?>
