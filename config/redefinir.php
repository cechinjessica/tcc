<?php
session_start();
require 'conexao.php';


if (isset($_POST['usuario']) & isset($_POST['senha']) & isset($_POST['nsenha'])){
	$usuario = $_POST["usuario"];
	$senha= $_POST["senha"];
	$nsenha= $_POST["nsenha"];


	$sql = "SELECT * FROM login WHERE usuario='$usuario' and senha ='$senha'";
	mysqli_query($conexao,$sql);
	//$con->query($sql);
	if (mysqli_affected_rows($conexao)!=0) {
		$sql= "UPDATE login SET senha='$nsenha' WHERE usuario='$usuario' and senha='$senha'";

		mysqli_query($conexao,$sql);
		if (mysqli_affected_rows($conexao)!=0) {
			//echo "Usuario $nome inserido com sucesso!";
			$_SESSION['msg'] = "<p class='text-success lead'>Usuário $usuario teve a senha redefinida com sucesso!</p>";
			header('Location:../index.php');
		} else {
			$_SESSION['msg'] ="<p class='text-danger lead'>Erro: " . $sql . "<br/>" . mysqli_error($conexao) . " no banco de dados</p>";
			header('Location:../redefinirsenha.php');
		}
		mysqli_close($conexao);

	}else{
		mysqli_close($conexao);
		$_SESSION['msg'] = "<p class='text-danger lead'>Usuário $usuario não existe</p>";
		header('Location:../redefinirsenha.php');

	}

}
?>
