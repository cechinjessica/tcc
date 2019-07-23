<!--Dica: Aqui só é possível mudar a senha se souber a senha antiga. Achar um jeito de alterar a senha sem saber a antiga-->
<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<title>Contrato - Redefinir senha</title>
	<link rel="shortcut icon" href="imagens/icone.png" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
	<script type="text/javascript" src="javascript/redefinir.js"></script>
	<div class="container-fluid">
		<div class="col-sm-9 col-md-8 col-lg-6 mx-auto">
			<div class="card card-padrao my-5">
				<div class="card-body">
					<h5 class="card-title text-center">Redefinir a Senha</h5>
					<form action="config/redefinir.php" method="post" class="form-padrao">
						<div class="form-group">
							<!--<label for="usuario">Usuário:</label>-->
							<input type="text" id="usuario" name="usuario" class="form-control" placeholder="Seu usuário" autofocus>
							<p id="msg_usuario" class="form-control-feedback"></p>
						</div>
						<div class="form-group">
							<!--<label for="senha">Senha Atual:</label>-->
							<input type="password" id="senha" name="senha" class="form-control" placeholder="Sua senha antiga">
							<p id="msg_senha" class="form-control-feedback"></p>
						</div>
						<div class="form-group">
							<!--<label for="senha">Nova Senha:</label>-->
							<input type="password" id="nsenha" name="nsenha" class="form-control" placeholder="Sua senha nova">
							<p id="msg_nsenha" class="form-control-feedback"></p>
						</div>
						<?php
							if (isset($_SESSION['msg'])) {
								echo  $_SESSION['msg'];
								unset ($_SESSION['msg']);
							}
						?>

						<button type="submit" id="redefinir" class="btn btn-md btn-primary btn-block text-uppercase">Redefinir</button>
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
