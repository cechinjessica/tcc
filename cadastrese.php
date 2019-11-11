<!--Dica: Adicionar mais campos para saber mais sobre o usuario que faz os contratos e não só sobre a pessoa do contrato-->
<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="imagens/icone.png" />
	<title>Contrato - Cadastre-se</title>
	<script src="javascript/jquery-3.4.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="javascript/popper.min.js"></script>

	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body style="background: #007bff;
               background: linear-gradient(to left, #5A8BB7, #2D9AAD);">
	<script type="text/javascript" src="javascript/cadastre.js"></script>

	<?php
    if (isset($_SESSION['msg'])) {
      echo  $_SESSION['msg'];
      unset ($_SESSION['msg']);
      echo "<div class='toast'>
    <div class='toast-header'>
      Notificação
    </div>
    <div class='toast-body'>
     </div>
  </div>";
      echo "<script>
                $(document).ready(function() {
                $('.toast').toast({
                  delay: 10000
                });
                $('.toast').toast({
                  animation: true
                });
                $('.toast').toast('show');
              });

              </script>";
    }
    ?>
	<div class="container-fluid fundo-card">
		<div class="col-sm-11 col-md-10 col-lg-8 mx-auto">
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
							<!--<label for="nome">Nome:</label>-->
							<input type="text" id="nome" class="form-control" name="nome" placeholder="Nome">
							<label class="form-text text-muted">Seu nome completo</label>
							<p id="msg_nome" class="form-control-feedback"></p>
						</div>
						<div class="form-group">
							<!--<label for="email">Email:</label>-->
							<input type="text" id="email" class="form-control" name="email" placeholder="Email">
							<label class="form-text text-muted">Seu email para contato</label>
							<p id="msg_email" class="form-control-feedback"></p>
						</div>
						<div class="form-group">
							<!--<label for="senha">Senha:</label>-->
							<input type="password" id="senha" class="form-control" name="senha" placeholder="Sua senha">
							<label class="form-text text-muted">Escolha uma senha com, no mínimo, 6 caracteres</label>
							<p id="msg_senha" class="form-control-feedback"></p>
						</div>
						<center>
							<button class="btn btn-md btn-primary btn-block text-uppercase col-sm-11 col-md-9 col-lg-9" type="submit" id="cadastre">Cadastre-se</button>
						</center>
					</form>
					<div class="form-padrao">
						<center>
							<a href="index.php"><button id="voltar" class="btn btn-outline-info text-uppercase btn-inline col-sm-11 col-md-9 col-lg-9">Voltar</button></a>
						</center>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
