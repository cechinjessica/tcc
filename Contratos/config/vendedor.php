<?php
session_start();
require 'conexao.php';

if (isset($_GET['id'])){
	$id=$_GET['id'];
	$op=$_GET['op'];
	$sql = "SELECT idpessoa, pessoa, nome, nacionalidade, profissao, sexo, cpf, endereco, cnpj FROM pessoa WHERE idpessoa='$id'";
	$res=mysqli_query($conexao,$sql);
	$row=mysqli_fetch_row($res);
	$id= $row[0];
	$pessoa= $row[1];
	$nome= $row[2];
	$nacionalidade= $row[3];
	$profissao= $row[4];
	$sexo= $row[5];
	$cpf= $row[6];
	$endereco= $row[7];
	$cnpj= $row[8];

	if($pessoa == 'f'){
		$pessoaf='checked';
		$pessoaj='';
	}else if($pessoa =='j'){
		$pessoaj='checked';
		$pessoaf='';
	}
	if ($sexo =='m') {
		$sexom='checked';
		$sexof='';
	} else if ($sexo == 'f') {
		$sexof='checked';
		$sexom='';
	}
} else{
	$id=0;
}

if (isset($_POST['Enviar'])){
	$pessoa = $_POST["pessoa"];
	$nome= $_POST["nome"];
	$nacionalidade=$_POST["nacionalidade"];
	$profissao=$_POST["profissao"];
	$sexo=$_POST["sexo"];
	$cpf=$_POST["cpf"];
	$endereco=$_POST["endereco"];
	$cnpj=$_POST["cnpj"];
	$op=$_POST["op"];

	if ($id!=0) {
		//atualização
		if ($op=='A') {
			$sql="UPDATE pessoa SET NOME='$nome', CPF='$cpf', pessoa='$pessoa', nacionalidade='$nacionalidade', profissao='$profissao', sexo='$sexo', endereco ='$endereco', cnpj ='$cnpj' WHERE idpessoa='$id'";

			$res = mysqli_query($conexao,$sql);
			if (mysqli_error($conexao)) {
				$_SESSION['msg'] = "<h3>Erro na atualização do cliente $nome </h3>";
				header('Location:cadastro_tela.php');
			} else {

				$_SESSION['msg'] = "<h3>Usuario $nome atualizado com exito!</h3>";
				header('Location:cadastro_tela.php');
			}
			mysqli_close($conexao);
		} else {
			//exclusão de clientes
			$sql="DELETE FROM pessoa WHERE idpessoa='$id' ";
			$res = mysqli_query($conexao,$sql);
			if (mysqli_affected_rows($conexao)=='1') {
				$_SESSION['msg'] = "<h3>Usuario $nome excluído com exito!</h3>";
				header('Location:cadastro_tela.php');
			} else {
				$_SESSION['msg'] = "<h2>Erro na exclusão do usuario $nome</h2>";
			}
			mysqli_close($conexao);
		}

	}

	//inclusão de clientes novos
	if ($id==0) {
		$sql = "SELECT * FROM pessoa WHERE cpf='$cpf'";
		mysqli_query($conexao,$sql);
		//$con->query($sql);
		if (mysqli_affected_rows($conexao)!=0) {
			mysqli_close($conexao);
			$_SESSION['msg'] = "<h3>Usuario $nome já existe</h3>";
			header('Location:cadastro_tela.php');
		}else {
			$sql = "INSERT INTO pessoa (nome, cpf, pessoa, nacionalidade, profissao, sexo, endereco, cnpj) VALUES ('$nome' ,'$cpf','$pessoa','$nacionalidade','$profissao','$sexo', '$endereco','$cnpj' )";

			mysqli_query($conexao,$sql);
			if (mysqli_affected_rows($conexao)!=0) {
				//echo "Usuario $nome inserido com sucesso!";
				$_SESSION['msg'] = "<h1>Usuario $nome inserido com sucesso! </h1>";
				header('Location:cadastro_tela.php');
			} else {
				$_SESSION['msg'] ="<h1>Erro: " . $sql . "<br/>" . mysqli_error($conexao) . "<h1>" . "<br/>";
				header('Location:cadastro_tela.php');
			}
			mysqli_close($conexao);
		}
	}
	$id=0;
}
?>
