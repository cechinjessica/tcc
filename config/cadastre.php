<?php
session_start();
require 'conexao.php';


if (isset($_POST['usuario']) & isset($_POST['senha'])){
	$usuario = $_POST["usuario"];
	$senha= $_POST["senha"];
	$nome= $_POST["nome"];
	$email= $_POST["email"];


	$sql = "SELECT * FROM login WHERE usuario='$usuario'";
	mysqli_query($conexao,$sql);
	echo $sql;
	//$con->query($sql);
	if (mysqli_affected_rows($conexao)!=0) {
		mysqli_close($conexao);
		$_SESSION['msg'] = "Usuário $usuario já existe";
		header('Location:../cadastrese.php');
	}

	else {
		$sql = "INSERT INTO login (usuario, senha, nome, email) VALUES ('$usuario', '$senha', '$nome', '$email')";

		mysqli_query($conexao,$sql);
		if (mysqli_affected_rows($conexao)!=0) {
			$_SESSION['msg'] = " <p class='text-success lead'>Usuário $usuario cadastrado com sucesso!</p>";
			header('Location:../index.php');
		} else {
			$_SESSION['msg'] ="Erro: " . $sql . "<br/>" . mysqli_error($conexao) . "</p>" . " no banco de dados<br/>";
			header('Location:../cadastrese.php');
		}
		mysqli_close($conexao);
	}
}

?>
