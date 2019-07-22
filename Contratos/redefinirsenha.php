<?php
require 'config/conexao.php';


if (isset($_POST['redefinir'])){
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
			$_SESSION['msg'] = "<h1>Usuario $usuario teve a senha redefinida com sucesso! </h1>";
			header('Location:index.php');
		} else {
			$_SESSION['msg'] ="<h1>Erro: " . $sql . "<br/>" . mysqli_error($conexao) . "<h1>" . "<br/>";
		}
		mysqli_close($conexao);

	}else{
		mysqli_close($conexao);
		$_SESSION['msg'] = "<h3>Usuario $usuario não existe</h3>";

	}

}
?>
<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Contrato - Redefinir Senha</title>
	<link rel="shortcut icon" href="imagens/icone.ico" />
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<meta charset="utf-8">
</head>

<body>
	<script type="text/javascript" src="javascript/redefinir.js"></script>
	<form action="#" method="Post">
		<div id="cadastre">
			<h2>Formulário de Contrato</h2>
			<fieldset>
				<fieldset class="grupo" style="background-color:#F7BE81">

					<legend><b>Redefinir Senha</b></legend>

					<div class="campo">
						<label for="usuario">Usuário:</label>
						<input type="text" id="usuario" name="usuario" placeholder="Seu usuário">
						<p id="msg_usuario"></p>
					</div>
					<div class="campo">
						<label for="senha">Senha Atual:</label>
						<input type="password" id="senha" name="senha" placeholder="Sua senha">
						<p id="msg_senha"></p>
					</div>
					<div class="campo">
						<label for="senha">Nova Senha:</label>
						<input type="password" id="nsenha" name="nsenha" placeholder="Sua nova senha">
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
				<input type="submit" id="redefinir" name="redefinir" value="Redefinir" style="float:left;">

				<a href="index.php"><input type="button" id="voltar" name="voltar" value="Voltar"></a>

			</fieldset>
		</div>
	</form>
</body>

</html>
