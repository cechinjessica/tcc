<!DOCTYPE html>
<?php session_start();
include('../config/verifica_login.php');?>

<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="../imagens/icone.png" />
  <title>Contrato - Veículos</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <?php include('../config/verifica_login.php');
    ?>
  <script>
    function showvei(nm) {
      str = nm;
      //COM JQUERY
      //POST
      /*$.post("busca_cli.php", {
        	q: str;
        	//op: 'teste'
        }, function(data, status) {
        	if (status == 'success') {
        		$('#txtcli').html(data);
        	} else {
        		$('#txtcli').html("Erro na consulta de dados");
        	}
        });*/

      ///GET
      $.get("../config/busca_veiculo.php?q=" + str, function(data, status) {
        if (status == 'success') {
          $('#txtvei').html(data);
        } else {
          $('#txtvei').html("Erro na consulta de dados");
        }
      });

    }

    $(document).ready(function() {
      $('#nome').keyup(function() {
        showvei($('#nome').val());
      })
      showvei('');
    });

  </script>
</head>

<body style="background: #007bff;
               background: linear-gradient(to left, #5A8BB7, #2D9AAD);">
  <!--NAVBAR-->
  <nav class="navbar navbar-expand-md bg-info navbar-light sticky-top">
    <a class="navbar-brand" href="#"><img src="../imagens/icone.png" width="30px">Contrato</a>
    <a class="nav-text d-none  d-lg-inline"><b> <?php echo $_SESSION['nome']; ?></b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav ml-5">
        <li class="nav-item ">
          <a class="nav-link" href="../contrato.php">Gerar contrato</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
            Cadastrar
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="../cadastros/vendedor.php">Pessoa</a>
            <a class="dropdown-item" href="../cadastros/veiculo.php">Veículo</a>

          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
            Cadastros
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="../cadastros/cadastro_pessoa.php">Pessoa</a>
            <a class="dropdown-item" href="../cadastros/cadastro_veiculo.php">Veículo</a>
            <a class="dropdown-item" href="../cadastros/cadastro_contrato.php">Contrato</a>
          </div>
        </li>
      </ul>
      <ul class="navbar-nav flex-row ml-md-auto d-md-flex">
        <li class="nav-item">
          <a class="nav-link" href="../config/logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <!--</NAVBAR-->
  <?php
    if (isset($_SESSION['msg'])) {
      echo "  <div class='toast'>
    <div class='toast-header'>
      Notificação
    </div>
    <div class='toast-body'>";
      echo  $_SESSION['msg'];
      unset ($_SESSION['msg']);
      echo " </div>
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
    <div class="col-sm-12 col-md-12 col-lg-11 mx-auto">
      <div class="card card-padrao my-5">
        <div class="card-body">
          <h5 class="card-title text-center">Veículos Cadastrados</h5>
          <?php
            if (isset($_SESSION['msg'])) {
              echo  $_SESSION['msg'];
              unset ($_SESSION['msg']);
            }
            ?>

          <form>
            <div class="row">
              <div class="form-group col-lg-3 col-md-5">
                <input type='text' name='nome' id='nome' class="form-control" placeholder="Pesquisar uma placa" style="display:inline;" autofocus>
              </div>
            </div>
          </form>

          <div id="txtvei">
            Dados dos usuario....
          </div>
          <div class="form-padrao">
            <center><a href="veiculo.php"><button class="btn btn-outline-info text-uppercase btn-inline col-sm-9 col-md-5 col-lg-5">Cadastrar um Veiculo</button></a>
            </center>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
