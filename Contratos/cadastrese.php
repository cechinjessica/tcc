<?php
require 'config/conexao.php';


if (isset($_POST['cadastre'])){
	$usuario = $_POST["usuario"];
	$senha= $_POST["senha"];


	$sql = "SELECT * FROM login WHERE usuario='$usuario'";
	mysqli_query($conexao,$sql);
	echo $sql;
	//$con->query($sql);
	if (mysqli_affected_rows($conexao)!=0) {
		mysqli_close($conexao);
		$_SESSION['msg'] = "<h3>Usuario $usuario já existe</h3>";
		header('Location:cadastrese.php');
	}

	else {
		$sql = "INSERT INTO login (usuario, senha) VALUES ('$usuario', '$senha' )";
		echo $sql;
		echo 'cadastrou';

		mysqli_query($conexao,$sql);
		if (mysqli_affected_rows($conexao)!=0) {
			//echo "Usuario $nome inserido com sucesso!";
			$_SESSION['msg'] = "<h1>Usuario $usuario cadastrado com sucesso! </h1>";
			header('Location:index.php');
		} else {
			$_SESSION['msg'] ="<h1>Erro: " . $sql . "<br/>" . mysqli_error($conexao) . "<h1>" . "<br/>";
			header('Location:cadastrese.php');
		}
		mysqli_close($conexao);
	}
}

?>

<!-- -->
<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Contrato - Cadastre-se</title>
	<link rel="shortcut icon" href="imagens/icone.ico" />
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<meta charset="utf-8">
</head>

<body>
	<script type="text/javascript" src="javascript/cadastre.js"></script>
	<form action="#" method="Post">
		<div id="cadastre">
			<h2>Formulário de Contrato</h2>
			<fieldset>
				<fieldset class="grupo" style="background-color:#F7BE81">

					<legend><b>Cadastre-se</b></legend>

					<div class="campo">
						<label>Escolha um usuário com, no máximo, 25 caracteres</label>
						<label for="usuario">Usuário:</label>
						<input type="text" id="usuario" name="usuario" placeholder="Seu usuário">
						<p id="msg_usuario"></p>
					</div>
					<div class="campo">
						<label>Escolha uma senha com, no máximo, 25 caracteres</label>
						<label for="senha">Senha:</label>
						<input type="password" id="senha" name="senha" placeholder="Sua senha">
						<p id="msg_senha"></p>
					</div>
					<p>
						<?php
							if (isset($_SESSION['msg'])) {
								echo  $_SESSION['msg'];
								unset ($_SESSION['msg']);
							}
						?>
					</p>
				</fieldset>
				<input type="submit" id="cadastrese" name="cadastre" value="Cadastre-se" style="float:left;">

				<a href="index.php"><input type="button" id="voltar" name="voltar" value="Voltar"></a>

			</fieldset>
		</div>
	</form>
</body>

</html>
