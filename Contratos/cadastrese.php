<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<title>Contrato - Cadastre-se</title>
	<link rel="shortcut icon" href="imagens/icone.png" />
	<!--<link rel="stylesheet" type="text/css" href="css/style.css">-->

	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
	<style>
		:root {
			--input-padding-x: 1.5rem;
			--input-padding-y: .75rem;
		}

		body {
			background: #007bff;
			background: linear-gradient(to left, #1E458D, #D4B11C);
		}

		.card-signup {
			border: 0;
			border-radius: 1rem;
			box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
		}

		.card-signup .card-title {
			margin-bottom: 2rem;
			font-weight: 300;
			font-size: 1.5rem;
		}

		.card-signup .card-body {
			padding: 2rem;
		}

		.form-signup {
			width: 100%;
		}

		.form-signup .btn {
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
	<script type="text/javascript" src="javascript/cadastre.js"></script>
	<div class="container-fluid">
		<div class="col-sm-9 col-md-8 col-lg-6 mx-auto">
			<div class="card card-signup my-5">
				<div class="card-body">
					<h5 class="card-title text-center">Cadastre-se</h5>
					<form action="config/cadastre.php" method="post" class="form-signup">
						<div class="form-group">
							<!--<label for="usuario">Usuário:</label>-->

							<input type="text" id="usuario" class="form-control" name="usuario" placeholder="Seu usuário">
							<label class="form-text text-muted">Escolha um usuário com, no máximo, 25 caracteres</label>
							<p id="msg_usuario" class="form-control-feedback"></p>
						</div>
						<div class="form-group">
							<!--<label for="senha">Senha:</label>-->

							<input type="password" id="senha" class="form-control" name="senha" placeholder="Sua senha">
							<label class="form-text text-muted">Escolha uma senha com, no máximo, 25 caracteres</label>
							<p id="msg_senha" class="form-control-feedback"></p>
						</div>
						<p>
							<?php
							if (isset($_SESSION['msg'])) {
								echo  $_SESSION['msg'];
								unset ($_SESSION['msg']);
							}
						?>
						</p>

						<button class="btn btn-md btn-primary btn-block text-uppercase" type="submit" id="cadastrese">Cadastre-se</button>
					</form>
					<div class="form-signup">
						<a href="index.php"><button id="voltar" class="btn btn-outline-info text-uppercase btn-inline">Voltar</button></a>
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
