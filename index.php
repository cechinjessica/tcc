<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="description" content="Página login">
	<meta name="author" content="Jéssica M. Cechin">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Login - Contratos</title>
	<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.css">
	<link rel="stylesheet" href="css/csslogin.css">
	<link rel="icon" href="image/iconcotract.png">
</head>

<body class="text-center">
	<div class="bloco sombra">
		<form class="form-signin">
			<img src="image/imagecontract.png" class="img-fluid" style="width:20%; height:10%;">
			<h1 class="h3 mb-3 font-weight-normal">Faça login</h1>
			<label for="usuario" class="sr-only">Endereço de email</label>
			<input type="email" id="usuario" class="form-control" placeholder="Seu email" required autofocus>
			<label for="inputPassword" class="sr-only">Senha</label>
			<input type="password" id="inputPassword" class="form-control" placeholder="Senha" required>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
			<button class="btn btn-lg btn-secundary btn-block" type="button">Cadastre-se</button>
		</form>

	</div>

	<script src="./node_modules/jquery/dist/jquery.slim.min.js"></script>
	<script src="./node_modules/popper.js/dist/popper.min.js"></script>
	<script src="./node_modules/bootstrap/dist/js/bootstrap.js"></script>
</body>

</html>
