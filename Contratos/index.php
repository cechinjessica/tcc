<!--  //////////////////////////////-->
<?php
session_start();

?>
<!DOCTYPE html>
<html lang="pt">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<title>Contrato - Login</title>
	<link rel="shortcut icon" href="imagens/icone.png" />
	<!--<link rel="stylesheet" type="text/css" href="css/style.css">-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<meta charset="utf-8">
	<style>
		:root {
			--input-padding-x: 1.5rem;
			--input-padding-y: .75rem;
		}

		body {
			background: #007bff;
			background: linear-gradient(to right, #0062E6, #476b6b);
		}

		.card-signin {
			border: 0;
			border-radius: 1rem;
			box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
		}

		.card-signin .card-title {
			margin-bottom: 2rem;
			font-weight: 300;
			font-size: 1.5rem;
		}

		.card-signin .card-body {
			padding: 2rem;
		}

		.form-signin {
			width: 100%;
		}

		.form-signin .btn {
			font-size: 80%;
			border-radius: 5rem;
			letter-spacing: .1rem;
			font-weight: bold;
			padding: 1rem;
			transition: all 0.2s;
		}

		.form-group {
			position: relative;
			margin-bottom: 1rem;
		}

		.form-group input {
			height: auto;
			border-radius: 2rem;
		}

		.form-group>input,
		.form-group>label {
			padding: var(--input-padding-y) var(--input-padding-x);
		}

		.certo {
			border: 1px solid green;
		}

		.erro {
			border: 1px solid red;
		}

	</style>
</head>

<body>
	<script type="text/javascript" src="javascript/login.js"></script>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-9 col-md-7 col-lg-4 mx-auto">
				<div class="card card-signin my-5">
					<div class="card-body">
						<h5 class="card-title text-center">Login</h5>
						<form action="config/login.php" method="post" class="form-signin">
							<div class="form-group">
								<!--<label for="usuario">Usuário</label>-->
								<input type="text" id="usuario" class="form-control" placeholder="Seu usuário" name="usuario" autofocus>
								<p id="msg_usuario" class="form-control-feedback "></p>
							</div>
							<div class="form-group">
								<!--<label for="senha">Senha</label>-->
								<input type="password" name="senha" id="senha" class="form-control" placeholder="Sua senha">
								<p id="msg_senha" class="form-control-feedback "></p>
							</div>
							<?php
								if(isset($_SESSION['nao_autenticado'])):
								?>

							<p class="alert alert-danger" role="alert">Usuário ou senha inválidos.</p>

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
							<button class="btn btn-md btn-primary btn-block text-uppercase" type="submit" id="logar">Login</button>
							<a href="cadastrese.php"><button id="cadastrese1" class="btn btn-outline-info text-uppercase btn-block">Cadastre-se</button></a>
							<a href="redefinirsenha.php"><button id="redefinir1" class="btn btn-outline-info text-uppercase btn-block">Redefinir senha</button></a>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>



	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>

</html>
