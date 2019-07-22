<!--  //////////////////////////////-->
<?php
session_start();

?>
<!DOCTYPE html>
<html>

<head>
	<title>Contrato - Login</title>
	<link rel="shortcut icon" href="imagens/icone.png" />
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<meta charset="utf-8">
</head>

<body>

	<script type="text/javascript" src="javascript/login.js"></script>
	<form action="config/login.php" method="Post">
		<div id="Login">
			<h2>Formulário de Contrato</h2>
			<fieldset>
				<fieldset class="grupo" style="background-color:#F7BE81">

					<legend><b>Login</b></legend>
					<div class="campo">
						<label for="usuario">Usuário:</label>
						<input type="text" id="usuario" name="usuario" placeholder="Seu usuário">
						<p id="msg_usuario"></p>
					</div>
					<div class="campo">
						<label for="senha">Senha:</label>
						<input type="password" id="senha" name="senha" placeholder="Sua senha">
						<p id="msg_senha"></p>
					</div>
					<?php
						if(isset($_SESSION['nao_autenticado'])):
						?>
					<p>Usuário ou senha inválidos.</p>
					<?php
						endif;
						unset($_SESSION['nao_autenticado']);
						?>
					<?php
						if (isset($_SESSION['msg'])) {
							echo  $_SESSION['msg'];
							unset ($_SESSION['msg']);
						}
						?>
				</fieldset>
				<input type="submit" id="logar" name="logar" value="Logar">

				<a href="cadastrese.php"><input type="button" id="cadastre1" name="cadastre1" value="Cadastre-se" style="float:right;"></a>

				<a href="redefinirsenha.php"><input type="button" id="redefinir1" name="redefinir1" value="Redefinir a Senha" style="float:right;"></a>


			</fieldset>
		</div>
	</form>
</body>

</html>
