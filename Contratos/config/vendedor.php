<?php
session_start();
require 'conexao.php';

//PARA COLOCAR AS INFORMAÇÕES DO BD NOS CAMPOS
if (isset($_GET['id'])){
	$id=$_GET['id'];
	$op=$_GET['op'];
	$sql = "SELECT idpessoa, tipopessoa, nome, nacionalidade, profissao, estadocivil, rg, cpf, endereco, sexo, numero, cidade, cep, cnpj, enderecoempresa, cargoempresa, tipoempresa, cidadeempresa, numeroempresa, nomeempresa FROM pessoa WHERE idpessoa='$id'";
	$res=mysqli_query($conexao,$sql);
	$row=mysqli_fetch_row($res);
	$id= $row[0];
	$tipopessoa = $row[1];
	$nome = $row[2];
	$nacionalidade = $row[3];
	$profissao = $row[4];
	$ecivil = $row[5];
	$rg = $row[6];
	$cpf = $row[7];
	$endereco = $row[8];
	$sexo = $row[9];
	$numero = $row[10];
	$cidade = $row[11];
	$cep = $row[12];
	$cnpjempresa = $row[13];
	$enderecoempresa = $row[14];
	$cargoempresa = $row[15];
	$tipoempresa = $row[16];
	$cidadeempresa = $row[17];
	$numeroempresa = $row[18];
	$nomeempresa = $row[19];

	if($tipopessoa == "f"){
		$pessoaf = "checked";
		$pessoaj = "";
	}else if($tipopessoa == "j"){
		$pessoaf = "";
		$pessoaj = "checked";
	}

	if($ecivil == "solteiro"){
		$solteiro = "checked";
		$casado = "";
		$divorciado = "";
		$viuvo = "";
		$separado = "";
	}else if ($ecivil == "casado"){
		$solteiro = "";
		$casado = "checked";
		$divorciado = "";
		$viuvo = "";
		$separado = "";
	}else if($ecivil == "divorciado"){
		$solteiro = "";
		$casado = "";
		$divorciado = "checked";
		$viuvo = "";
		$separado = "";
	}else if($ecivil == "viuvo"){
		$solteiro = "";
		$casado = "";
		$divorciado = "";
		$viuvo = "checked";
		$separado = "";
	}else if($ecivil == "separado"){
		$solteiro = "";
		$casado = "";
		$divorciado = "";
		$viuvo = "";
		$separado = "checked";
	}

	if($sexo == "m"){
		$sexom = "checked";
		$sexof = "";
	}else if ($sexo == "f"){
		$sexom = "";
		$sexof = "checked";
	}

	if ($tipoempresa == "pu"){
		$tipoempresapu = "checked";
		$tipoempresapr = "";
	}else if ($tipoempresa == "pr"){
		$tipoempresapu = "";
		$tipoempresapr = "checked";
	}

} else{
	$id=0;
}


//PARA PEGAR OS DADOS DOS CAMPOS
if (isset($_POST['enviar'])){
	$id= $_POST['pessoa'];
	$tipopessoa = $_POST['pessoa'];
	$nome = $_POST['nome'];
	$nacionalidade = $_POST['nacionalidade'];
	$profissao = $_POST['profissao'];
	$ecivil = $_POST['ecivil'];
	$rg = $_POST['rg'];
	$cpf = $_POST['cpf'];
	$endereco = $_POST['endereco'];
	$sexo = $_POST['sexo'];
	$numero = $_POST['numero'];
	$cidade = $_POST['cidade'];
	$cep = $_POST['cep'];
	$cnpjempresa = $_POST['cnpjempresa'];
	$enderecoempresa = $_POST['enderecoempresa'];
	$cargoempresa = $_POST['cargoempresa'];
	$tipoempresa = $_POST['tipoempresa'];
	$cidadeempresa = $_POST['cidadeempresa'];
	$numeroempresa = $_POST['numeroempresa'];
	$nomeempresa = $_POST['nomeempresa'];
	$op=$_POST['op'];

	//PARA ATUALIZAR, HAVERÁ ID POIS HÁ UMA PESSOA
	if ($id != 0) {
		if ($op == 'A') {
			$sql="UPDATE pessoa SET tipopessoa='$tipopessoa', nome ='$nome', nacionalidade ='$nacionalidade', profissao ='$profissao', estadocivil ='$ecivil', rg='$rg', cpf='$cpf', endereco ='$endereco', sexo='$sexo', numero ='$numero', cidade ='$cidade', cep ='$cep', cnpj ='$cnpjempresa', enderecoempresa ='$enderecoempresa', cargoempresa ='$cargoempresa', tipoempresa ='$tipoempresa', cidadeempresa ='$cidadeempresa', numeroempresa ='$numeroempresa', nomeempresa ='$nomeempresa' where idpessoa ='$id'";
			echo $sql;

			$res = mysqli_query($conexao,$sql);
			if (mysqli_error($conexao)) {
				$_SESSION['msg'] = "<p class='alert alert-danger' role='alert'>Erro na atualização de $nome</p>";
				header('Location:..\vendedor.php');
			} else {
				$_SESSION['msg'] = "<p class='alert alert-success' role='alert'>$nome atualizado com sucesso!</p>";
				header('Location:..\vendedor.php');
			}
			mysqli_close($conexao);

		} else if($op == "D") { //PARA EXCLUIR
			$sql="DELETE FROM pessoa WHERE idpessoa='$id'";
			echo $sql;
			$res = mysqli_query($conexao,$sql);
			if (mysqli_affected_rows($conexao)=='1') {
				$_SESSION['msg'] = "<p class='alert alert-success' role='alert'>$nome excluído com sucesso!</p>";
				header('Location:..\cadastro_pessoa.php');
			} else {
				$_SESSION['msg'] = "p class='alert alert-danger' role='alert'>Erro na exclusão de $nome</p>";
			}
			mysqli_close($conexao);
		}

	}else{//SE FOR == 0 ENTÃO A PESSOA AINDA NÃO ESTÁ CADASTRADA
		//INCLUSÃO
		$sql = "SELECT * FROM pessoa WHERE cpf='$cpf'";
		mysqli_query($conexao,$sql);

		if (mysqli_affected_rows($conexao)!=0) {
			mysqli_close($conexao);
			$_SESSION['msg'] = "p class='alert alert-danger' role='alert'>$cpf já foi cadastrado</p>";
			header('Location:..\vendedor.php');

		}else {
			$sql = "INSERT INTO pessoa (tipopessoa, nome, nacionalidade, profissao, estadocivil, rg, cpf, endereco, sexo, numero, cidade, cep, cnpj, enderecoempresa, cargoempresa, tipoempresa, cidadeempresa, numeroempresa, nomeempresa) VALUES ('$tipopessoa', '$nome', '$nacionalidade', '$profissao', '$ecivil', '$rg', '$cpf', '$endereco', '$sexo', '$numero', '$cidade', '$cep', '$cnpjempresa', '$enderecoempresa', '$cargoempresa', '$tipoempresa', '$cidadeempresa', '$numeroempresa', '$nomeempresa')";
			mysqli_query($conexao,$sql);

			if (mysqli_affected_rows($conexao) =='1') {
				$_SESSION['msg'] = "<p class='alert alert-success' role='alert'>$nome inserido com sucesso!</p>";
				header('Location:..\vendedor.php');
			} else {
				$_SESSION['msg'] ="<p class='alert alert-danger' role='alert'>Erro: ".mysqli_error($conexao)."<p>";
				header('Location:..\vendedor.php');
			}
			mysqli_close($conexao);
		}
	}
	$id=0;
}
?>
