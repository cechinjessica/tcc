<!--Dica: Aqui só é possível mudar a senha se souber a senha antiga. Achar um jeito de alterar a senha sem saber a antiga-->
<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Contrato - Redefinir senha</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body style="background: #007bff;
               background: linear-gradient(to left, #5A8BB7, #2D9AAD);">
  <script type="text/javascript" src="javascript/redefinir.js"></script>
  <?php
    if (isset($_SESSION['msg'])) {
      echo "<div class='toast'>
    <div class='toast-header'>
      Notificação
    </div>
    <div class='toast-body'>";
      echo  $_SESSION['msg'];
      unset ($_SESSION['msg']);
      echo "</div>
  </div>";
      echo "<script>
                $(document).ready(function() {
                $('.toast').toast({
                  delay: 2000
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
            </div>
            <p id="msg_nsenha" class="form-control-feedback"></p>

            <?php
              if (isset($_SESSION['msg'])) {
                echo  $_SESSION['msg'];
                unset ($_SESSION['msg']);
              }
              ?>
            <center>
              <button type="submit" id="redefinir" class="btn btn-md btn-primary btn-block text-uppercase col-sm-11 col-md-9 col-lg-9">Redefinir</button>
            </center>
          </form>
          <center>
            <div class="form-padrao"><a href="index.php"><button id="voltar" class="btn btn-outline-info text-uppercase btn-inline col-sm-11 col-md-9 col-lg-9">Voltar</button></a>
            </div>
          </center>

        </div>
      </div>
    </div>
  </div>




  <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
