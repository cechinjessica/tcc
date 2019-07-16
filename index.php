<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="description" content="Página login">
	<meta name="author" content="Jéssica Cechin">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Login - Contratos</title>
	<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.css">
	<style>
		html,
		body {
			height: 100%;
		}

		body {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-align: center;
			align-items: center;
			padding-top: 40px;
			padding-bottom: 40px;
			background-color: #f5f5f5;
		}

		.form-signin {
			width: 100%;
			max-width: 330px;
			padding: 15px;
			margin: auto;
		}

		.form-signin .checkbox {
			font-weight: 400;
		}

		.form-signin .form-control {
			position: relative;
			box-sizing: border-box;
			height: auto;
			padding: 10px;
			font-size: 16px;
		}

		.form-signin .form-control:focus {
			z-index: 2;
		}

		.form-signin input[type="email"] {
			margin-bottom: -1px;
			border-bottom-right-radius: 0;
			border-bottom-left-radius: 0;
		}

		.form-signin input[type="password"] {
			margin-bottom: 10px;
			border-top-left-radius: 0;
			border-top-right-radius: 0;
		}

	</style>
</head>

<body class="text-center">
	<form class="form-signin">
		<h1 class="h3 mb-3 font-weight-normal">Faça login</h1>
		<label for="usuario" class="sr-only">Endereço de email</label>
		<input type="email" id="usuario" class="form-control" placeholder="Seu email" required autofocus>
		<label for="inputPassword" class="sr-only">Senha</label>
		<input type="password" id="inputPassword" class="form-control" placeholder="Senha" required>
		<div class="checkbox mb-3">
			<label>
				<input type="checkbox" value="remember-me"> Lembrar de mim
			</label>
		</div>
		<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
		<p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
	</form>
	<script src="./node_modules/jquery/dist/jquery.slim.min.js"></script>
	<script src="./node_modules/popper.js/dist/popper.min.js"></script>
	<script src="./node_modules/bootstrap/dist/js/bootstrap.js"></script>
</body>

</html>
