<?php
session_start();
require '../config/conexao.php';
include('../config/verifica_login.php');

$script = "<script>
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

//PARA COLOCAR AS INFORMAÇÕES DO BD NOS CAMPOS
if (isset($_GET['id'])){
  $id=$_GET['id'];
  $op=$_GET['op'];
  $sql = "SELECT idveiculo, nome, marca, modelo, ano, chassi, cor, placa, renavam, emnomede, valor, estado, combustivel FROM veiculo WHERE idveiculo='$id'";
  $res=mysqli_query($conexao,$sql);
  $row=mysqli_fetch_row($res);
  $id= $row[0];
  $nomevei = $row[1];
  $marca = $row[2];
  $modelo = $row[3];
  $ano = $row[4];
  $chassi = $row[5];
  $cor = $row[6];
  $placa = $row[7];
  $renavam = $row[8];
  $proprietario = $row[9];
  $valorvei = $row[10];
  $estado = $row[11];
  $combustivel = $row[12];

  if($estado == "novo"){
    $novo = "checked";
    $usado = "";
  }else{
    $novo = "";
    $usado = "checked";
  }

  if($combustivel == "gasolina"){
    $gasolina = "checked";
    $etanol = "";
    $diesel = "";
    $gasnatural = "";
    $eletrico = "";
    $flex = "";
  }else if($combustivel == "etanol"){
    $gasolina = "";
    $etanol = "checked";
    $diesel = "";
    $gasnatural = "";
    $eletrico = "";
    $flex = "";
  }else if($combustivel == "diesel"){
    $gasolina = "";
    $etanol = "";
    $diesel = "checked";
    $gasnatural = "";
    $eletrico = "";
    $flex = "";
  }else if($combustivel == "gasnatural"){
    $gasolina = "";
    $etanol = "";
    $diesel = "";
    $gasnatural = "checked";
    $eletrico = "";
    $flex = "";
  }else if($combustivel == "eletrico"){
    $gasolina = "";
    $etanol = "";
    $diesel = "";
    $gasnatural = "";
    $eletrico = "checked";
    $flex = "";
  }else if($combustivel == "flex"){
    $gasolina = "";
    $etanol = "";
    $diesel = "";
    $gasnatural = "";
    $eletrico = "";
    $flex = "checked";
  }

} else{
  $id=0;
}


//PARA PEGAR OS DADOS DOS CAMPOS
if (isset($_POST['enviarveiculo'])){
  $nomevei = $_POST['nomevei'];
  $marca = $_POST['marca'];
  $modelo = $_POST['modelo'];
  $ano = $_POST['ano'];
  $chassi = $_POST['chassi'];
  $cor = $_POST['cor'];
  $placa = $_POST['placa'];
  $renavam = $_POST['renavam'];
  $proprietario = $_POST['proprietario'];
  $valorvei2 = $_POST['valorvei'];
  $estado = $_POST['estado'];
  $combustivel = $_POST['combustivel'];
  $op=$_POST['op'];

  $valorvei1 = str_replace ( "." ,"", $valorvei2);
  $valorvei = str_replace ( "," ,".", $valorvei1);


  //PARA ATUALIZAR, HAVERÁ ID POIS HÁ UM VEICULO
  if ($id != 0) {
    if ($op == 'A') {

      $sql="UPDATE veiculo SET Nome ='$nomevei', Marca ='$marca', Modelo ='$modelo', Ano ='$ano', Chassi='$chassi', Cor='$cor', Placa =UCASE('$placa'), Renavam='$renavam', EmNomeDe ='$proprietario', Valor ='$valorvei', Estado='$estado', Combustivel ='$combustivel' where IdVeiculo ='$id'";

      $res = mysqli_query($conexao,$sql);
      if (mysqli_error($conexao)) {
        $_SESSION['msg_erro'] = "Erro na atualização de $nomevei";
        echo $script;
      } else {
        $_SESSION['msg'] = "$nomevei atualizado com sucesso!";
        header('Location:cadastro_veiculo.php');
      }
      mysqli_close($conexao);

    } else if($op == "D") { //PARA EXCLUIR
      $sql="DELETE FROM veiculo WHERE idveiculo='$id'";
      echo $sql;
      $res = mysqli_query($conexao,$sql);
      if (mysqli_affected_rows($conexao)=='1') {
        $_SESSION['msg'] = "$nomevei excluído com sucesso!";
        header('Location:cadastro_veiculo.php');
      } else {
        $_SESSION['msg_erro'] = "Erro na exclusão de $nomevei";
        echo $script;
      }
      mysqli_close($conexao);
    }

  }else{//SE FOR == 0 ENTÃO O VEICULO AINDA NÃO ESTÁ CADASTRADO
    //INCLUSÃO
    $sql = "SELECT * FROM veiculo WHERE placa='$placa'";
    mysqli_query($conexao,$sql);

    if (mysqli_affected_rows($conexao)!=0) {
      mysqli_close($conexao);
      $_SESSION['msg'] = "$placa já foi cadastrada";
    }else {
      $sql = "INSERT INTO veiculo (nome, marca, modelo, ano, chassi, cor, placa, renavam, emnomede, valor, estado, combustivel) VALUES ('$nomevei', '$marca', '$modelo', '$ano', '$chassi', '$cor', UCASE('$placa'), '$renavam', '$proprietario', '$valorvei', '$estado', '$combustivel')";
      mysqli_query($conexao,$sql);

      if (mysqli_affected_rows($conexao) =='1') {
        $_SESSION['msg'] = "$nomevei inserido com sucesso!";
        header('Location:cadastro_veiculo.php');
      } else {
        $_SESSION['msg_erro'] ="Erro: ".mysqli_error($conexao)." no banco de dados";
        echo $script;            }
      mysqli_close($conexao);
    }
  }
  $id=0;
}

?>

<!--////////////////////////////////////////////////////////////////////////////-->
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="../imagens/icone.png" />
  <title>Contrato - Veículo</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.min.js"></script>

  <style>
    .form-group input {
      border-radius: 2rem;
      display: inline-block;
      width: auto;
    }

    .form-check-input {
      margin: 1px;
    }

  </style>

</head>

<body style="background: #007bff;
               background: linear-gradient(to left, #5A8BB7, #2D9AAD);">
  <script type="text/javascript" src="../javascript/veiculo.js"></script>
  <!--NAVBAR-->
  <nav class="navbar navbar-expand-md bg-info navbar-light sticky-top">
    <a class="navbar-brand" href="#"><img src="../imagens/icone.png" width="30px">Contrato</a>
    <a class="nav-text d-none  d-lg-inline">Bem vindo(a) <?php echo $_SESSION['nome']; ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
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
            <a class="dropdown-item" href="../cadastro_contrato.php">Contrato</a>
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
  <div class="container-fluid fundo-card">
    <div class="col-sm-12 col-md-11 col-lg-11 mx-auto">
      <div class="card card-padrao my-5 justify-content-center">
        <div class="card-body">
          <h5 class="card-title text-center">Sobre a veículo:</h5>
          <form action="#" method="post" class="form-padrao">
            <div class="toast">
              <div class="toast-header">
                Notificação
              </div>
              <div class="toast-body">
                <?php
                if (isset($_SESSION['msg_erro'])) {
                  echo  $_SESSION['msg_erro'];
                  unset ($_SESSION['msg_erro']);
                }
                ?>
              </div>
            </div>

            <div class="row">
              <div class="form-group col-xl">
                <label for="nomevei">Modelo(Nome)</label>
                <input type="text" id="nomevei" class="form-control" name="nomevei" title="Ex.: Celta, Prisma, Corsa" value="<?php echo ($id!=0)?"$nomevei":'';?>">
                <p id="msg_nomevei" class="form-control-feedback"></p>
              </div>

              <div class="form-group col-xl">
                <label for="marca">Marca</label>
                <input type="text" id="marca" class="form-control" name="marca" title="Ex.: Chevrolet, Volkswagen, Ford " value="<?php echo ($id!=0)?"$marca":'';?>">
                <p id="msg_marca" class="form-control-feedback"></p>
              </div>
            </div>

            <div class="row">
              <div class="form-group col-xl">
                <label for="ano">Ano</label>
                <input type="text" id="ano" class="form-control" name="ano" title="Ex.: 2010, 2000, 2019" value="<?php echo ($id!=0)?"$ano":'';?>">
                <p id="msg_ano" class="form-control-feedback"></p>
              </div>

              <div class="form-group col-xl">
                <label for="modelo">Modelo(Ano)</label>
                <input type="text" id="modelo" class="form-control" name="modelo" value="<?php echo ($id!=0)?"$modelo":'';?>">
                <p id="msg_modelo" class="form-control-feedback "></p>
              </div>
            </div>

            <div class="row">
              <div class="form-group col-xl">
                <label for="chassi">Chassi</label>
                <input type="text" id="chassi" class="form-control" maxlength="17" name="chassi" value="<?php echo ($id!=0)?"$chassi":'';?>">
                <p id="msg_chassi" class="form-control-feedback "></p>
              </div>

              <div class="form-group col-xl">
                <label for="cor">Cor</label>
                <input type="text" id="cor" class="form-control" name="cor" title="Ex.: Vermelho, Rosa, Prata" value="<?php echo ($id!=0)?"$cor":'';?>">
                <p id="msg_cor" class="form-control-feedback "></p>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-xl">
                <label for="placa">Placa</label>
                <input type="text" id="placa" class="form-control" maxlength="8" name="placa" title="XXX-0000" value="<?php echo ($id!=0)?"$placa":'';?>">
                <p id="msg_placa" class="form-control-feedback "></p>
              </div>

              <div class="form-group col-xl">
                <label for="renavam">Renavam</label>
                <input type="text" id="renavam" class="form-control" maxlength="11" name="renavam" value="<?php echo ($id!=0)?"$renavam":'';?>">
                <p id="msg_renavam" class="form-control-feedback "></p>
              </div>
            </div>

            <div class="row">
              <div class="form-group col-xl">
                <label for="proprietario">Proprietario</label>
                <input type="text" id="proprietario" class="form-control" name="proprietario" title="O veículo esta em nome de ..." value="<?php echo ($id!=0)?"$proprietario":'';?>">
                <p id="msg_proprietario" class="form-control-feedback "></p>
              </div>

              <div class="form-group col-xl">
                <label for="valorvei">Valor</label>
                <input type="text" id="valorvei" class="form-control" name="valorvei" title="Ex.: 10000,00" value="<?php echo ($id!=0)?"$valorvei":'';?>">
                <p id="msg_valorvei" class="form-control-feedback "></p>
              </div>
            </div>

            <div class="row">
              <div class="form-group col-xl">
                <label for="estado">Estado</label>
                <div class="form-check-inline">
                  <input type="radio" class="form-check-input" name="estado" value="novo" id="novo" <?php echo ($id!=0)?"$novo":'';?>>Novo
                </div>
                <div class="form-check-inline">
                  <input type="radio" class="form-check-input" name="estado" value="usado" id="usado" <?php echo ($id!=0)?"$usado":'';?>>Usado
                </div>
                <p id="msg_estado" class="form-control feedback"></p>
              </div>

              <div class="form-group col-xl">
                <label for="combustivel">Combustível</label>
                <div class="form-check-inline">
                  <input type="radio" class="form-check-input" name="combustivel" value="gasolina" id="gasolina" <?php echo ($id!=0)?"$gasolina":'';?>>Gasolina
                </div>
                <div class="form-check-inline">
                  <input type="radio" class="form-check-input" name="combustivel" value="etanol" id="etanol" <?php echo ($id!=0)?"$etanol":'';?>>Etanol
                </div>
                <div class="form-check-inline">
                  <input type="radio" class="form-check-input" name="combustivel" value="diesel" id="diesel" <?php echo ($id!=0)?"$diesel":'';?>>Diesel
                </div>
                <div class="form-check-inline">
                  <input type="radio" class="form-check-input" name="combustivel" value="gasnatural" id="gasnatural" <?php echo ($id!=0)?"$gasnatural":'';?>>Gás Natural
                </div>
                <div class="form-check-inline">
                  <input type="radio" class="form-check-input" name="combustivel" value="eletrico" id="eletrico" <?php echo ($id!=0)?"$eletrico":'';?>>Elétrico
                </div>
                <div class="form-check-inline">
                  <input type="radio" class="form-check-input" name="combustivel" value="flex" id="flex" <?php echo ($id!=0)?"$flex":'';?>>Flex
                </div>
                <p id="msg_combustivel" class="form-control feedback"></p>
              </div>
            </div>


            <input type='hidden' name='id' id='codigo' value="<?php echo ($id!=0)?"$id":'0';?>">
            <input type='hidden' name='op' value="<?php echo ($id!=0)?"$op":'';?>">

            <?php
              $txtbtn="Incluir";
              if (isset($op)){
                $txtbtn=($op=='A')?'Atualizar':'Excluir';
              }
              ?>
            <input class="btn btn-md btn-primary btn-block text-uppercase" type="submit" name="enviarveiculo" value="<?php echo $txtbtn?>" id="salvarveiculovei">
          </form>
        </div>
      </div>
    </div>
  </div>





  <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
