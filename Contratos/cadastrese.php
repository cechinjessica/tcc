<!--Dica: Adicionar mais campos para saber mais sobre o usuario que faz os contratos e não só sobre a pessoa do contrato-->
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
	<script type="text/javascript" src="javascript/cadastre.js"></script>
	<div class="container-fluid">
		<div class="col-sm-9 col-md-8 col-lg-6 mx-auto">
			<div class="card card-padrao my-5">
				<div class="card-body">
					<h5 class="card-title text-center">Cadastre-se</h5>
					<form action="config/cadastre.php" method="post" class="form-padrao">
						<div class="form-group">
							<!--<label for="usuario">Usuário:</label>-->

							<input type="text" id="usuario" class="form-control" name="usuario" placeholder="Seu usuário">
							<label class="form-text text-muted">Escolha um usuário com, no máximo, 25 caracteres</label>
							<p id="msg_usuario" class="form-control-feedback"></p>
						</div>
						<div class="form-group">
							<!--<label for="senha">Senha:</label>-->

							<input type="password" id="senha" class="form-control" name="senha" placeholder="Sua senha">
							<label class="form-text text-muted">Escolha uma senha com, no mínimo, 6 caracteres</label>
							<p id="msg_senha" class="form-control-feedback"></p>
						</div>
						<?php
							if (isset($_SESSION['msg'])) {
								echo  $_SESSION['msg'];
								unset ($_SESSION['msg']);
							}
						?>

						<button class="btn btn-md btn-primary btn-block text-uppercase" type="submit" id="cadastre">Cadastre-se</button>
					</form>
					<div class="form-padrao">
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
