<?php
session_start();
require 'config/conexao.php';
require 'verifica_login.php';

//PARA COLOCAR AS INFORMAÇÕES DO BD NOS CAMPOS CONTRATO
////////////////////////////Contrato
if (isset($_GET['id'])){
	$id=$_GET['id'];
	$op=$_GET['op'];
	$sql = "SELECT c.*, p.nome, p.cpf, pp.nome, pp.cpf, v.nome, v.placa FROM contrato c
    inner join pessoa p on p.idpessoa = c.pessoa_idvendedor
    inner join pessoa pp on pp.idpessoa = c.pessoa_idcomprador
    inner join veiculo v on v.idveiculo = c.veiculo_idveiculo
    WHERE IdContrato='$id'";
	$res=mysqli_query($conexao,$sql);
	$row=mysqli_fetch_row($res);
	$id= $row[0];
	$valortotal = $row[1];
	$numeroparcelas  = $row[2];
	$valorparcela = $row[3];
	$dpagamento = $row[4];
	$juro = $row[5];
	$foro = $row[6];
	$lassinatura = $row[7];
	$dassinatura =$row[8];
	$datacriacao =$row[9];
	$ntestemunha1 = $row[10];
	$rgtestemunha1 = $row[11];
	$ntestemunha2 = $row[12];
	$rgtestemunha2 = $row[13];
	$idvend = $row[14];
	$idcomp = $row[15];
	$idvei = $row[16];
	$idlogin = $row[17];
	$entrada = $row[18];
	$nomevend = $row[19];
	$cpfvend = $row[20];
	$nomecomp = $row[21];
	$cpfcomp = $row[22];
	$nomevei = $row[23];
	$placavei = $row[24];

	if ($juro == "0.5% ao mês"){
		$juro05="checked";
		$juro1="";
		$juro15="";
		$juro2="";
	}else if($juro == "1% ao mês"){
		$juro05="";
		$juro1="checked";
		$juro15="";
		$juro2="";
	}else if($juro == "1.5% ao mês"){
		$juro05="";
		$juro1="";
		$juro15="checked";
		$juro2="";
	}else if($juro == "2% ao mês"){
		$juro05="";
		$juro1="";
		$juro15="";
		$juro2="checked";

	}
} else{
	$id=0;
}

//PARA PEGAR OS DADOS DOS CAMPOS
if (isset($_POST['enviarcontrato'])){
	$valortotal2 = $_POST['valortotal'];
	$numeroparcelas  = $_POST['numeroparcelas'];
	$valorparcela2 = $_POST['valorparcela'];
	$dpagamento = $_POST['dpagamento'];
	$juro = $_POST['juro'];
	$foro = $_POST['foro'];
	$lassinatura = $_POST['lassinatura'];
	$dassinatura = $_POST['dassinatura'];
	$datacriacao = $_POST['datacriacao'];
	$ntestemunha1 = $_POST['ntestemunha1'];
	$rgtestemunha1 = $_POST['rgtestemunha1'];
	$ntestemunha2 = $_POST['ntestemunha2'];
	$rgtestemunha2 = $_POST['rgtestemunha2'];
	$idvend = $_POST['idvend'];
	$idcomp = $_POST['idcomp'];
	$idvei = $_POST['idvei'];
	$idlogin = $_POST['idlogin'];
	$entrada2 = $_POST['entrada'];
	$op=$_POST['op'];

  $valortotal1 = str_replace ( "." ,"", $valortotal2);
  $valortotal = str_replace ( "," ,".", $valortotal1);

  $valorparcela1 = str_replace ( "." ,"", $valorparcela2);
  $valorparcela = str_replace ( "," ,".", $valorparcela1);

  $entrada1 = str_replace ( "." ,"", $entrada2);
  $entrada = str_replace ( "," ,".", $entrada1);

	//PARA ATUALIZAR, HAVERÁ ID POIS HÁ UM CONTRATO
	if ($id != 0) {
		if ($op == 'A') {
			$sql="UPDATE contrato SET ValorTotal ='$valortotal', NumeroParcelas ='$numeroparcelas', ValorParcela ='$valorparcela', DataPagamento='$dpagamento', Juros='$juro', Foro ='$foro', LocalAss=' $lassinatura', DataAss ='$dassinatura', DataCriacao =STR_TO_DATE( '$datacriacao', '%d/%m/%Y %H:%i:%s'), NomeTestemunha1='$ntestemunha1', RGTestemunha1='$rgtestemunha1', NomeTestemunha2='$ntestemunha2', RGTestemunha2='$rgtestemunha2', Pessoa_IdVendedor='$idvend', Pessoa_IdComprador=' $idcomp',Veiculo_IdVeiculo='$idvei', Login_IdUsuario='$idlogin', Entrada='$entrada' WHERE IdContrato ='$id'";

			$res = mysqli_query($conexao,$sql);
			if (mysqli_error($conexao)) {
				$_SESSION['msg'] = "<p class='alert alert-danger' role='alert'>Erro na atualização do contrato</p>";
				header('Location:contrato.php');
			} else {
				$_SESSION['msg'] = "<p class='alert alert-success' role='alert'>contrato atualizado com sucesso!</p>";
				header('Location:cadastros/cadastro_contrato.php');
			}
			mysqli_close($conexao);

		} else if($op == "D") { //PARA EXCLUIR
			$sql="DELETE FROM contrato WHERE IdContrato='$id'";
			echo $sql;
			$res = mysqli_query($conexao,$sql);
			if (mysqli_affected_rows($conexao)=='1') {
				$_SESSION['msg'] = "<p class='alert alert-success' role='alert'>Contrato excluído com sucesso!</p>";
				header('Location:cadastros/cadastro_contrato.php');
			} else {
				$_SESSION['msg'] = "p class='alert alert-danger' role='alert'>Erro na exclusão do contrato</p>";
				header('Location:contrato.php');
			}
			mysqli_close($conexao);
		}

	}else{
		//SE FOR == 0 ENTÃO O CONTRATO AINDA NÃO ESTÁ CADASTRADO
		//INCLUSÃO
		$sql = "INSERT INTO contrato (ValorTotal, NumeroParcelas, ValorParcela, DataPagamento, Juros, Foro, LocalAss, DataAss, DataCriacao, NomeTestemunha1, RGTestemunha1, NomeTestemunha2, RGTestemunha2, Pessoa_IdVendedor,Pessoa_IdComprador, Veiculo_IdVeiculo, Login_IdUsuario, Entrada) VALUES ('$valortotal' ,'$numeroparcelas' ,'$valorparcela', '$dpagamento', '$juro' ,'$foro' ,'$lassinatura' ,'$dassinatura',(now()), '$ntestemunha1' ,'$rgtestemunha1' ,'$ntestemunha2' ,'$rgtestemunha2' ,'$idvend', '$idcomp' ,'$idvei','$idlogin','$entrada')";

		mysqli_query($conexao,$sql);

		if (mysqli_affected_rows($conexao) =='1') {
			$_SESSION['msg'] = "<p class='alert alert-success' role='alert'>Contrato inserido com sucesso!</p>";
			header('Location:cadastros/cadastro_contrato.php');
		} else {
			$_SESSION['msg'] ="<p class='alert alert-danger' role='alert'>Erro: ".mysqli_error($conexao)."<p>";
			header('Location:contrato.php');
		}
		mysqli_close($conexao);

	}
	$id=0;
}

//Pessoa
//PARA PEGAR OS DADOS DOS CAMPOS DO VENDEDOR/COMPRADOR
if (isset($_POST['enviarpessoa'])){
	$tipopessoa = $_POST['pessoa'];
	$nome = $_POST['nome'];
	$nacionalidade = $_POST['nacionalidade'];
	$profissao = $_POST['profissao'];
	$ecivil = $_POST['ecivil'];
	$rg = $_POST['rg'];
	$cpf = $_POST['cpf'];
	$endereco = $_POST['endereco'];
	$sexo = $_POST['sexo'];
	$numero = $_POST['numero'];
	$cidade = $_POST['cidade'];
	$cep = $_POST['cep'];
	$cnpjempresa = $_POST['cnpjempresa'];
	$enderecoempresa = $_POST['enderecoempresa'];
	$cargoempresa = $_POST['cargoempresa'];
	$tipoempresa = $_POST['tipoempresa'];
	$cidadeempresa = $_POST['cidadeempresa'];
	$numeroempresa = $_POST['numeroempresa'];
	$nomeempresa = $_POST['nomeempresa'];
	$uf = $_POST['uf'];
	$ufempresa = $_POST['ufempresa'];

	//PARA INCLUIR
	$sql = "SELECT * FROM pessoa WHERE cpf='$cpf'";
	mysqli_query($conexao,$sql);

	if (mysqli_affected_rows($conexao)!=0) {
		mysqli_close($conexao);
		$_SESSION['msgvendedor'] = "p class='alert alert-danger' role='alert'>$cpf já foi cadastrado</p>";
		header("Location:contrato.php");

	}else {
		if($tipopessoa == "j"){
			$sql = "INSERT INTO pessoa (tipopessoa, nome, nacionalidade, profissao, estadocivil, rg, cpf, endereco, sexo, numero, cidade, cep, cnpj, enderecoempresa, cargoempresa, tipoempresa, cidadeempresa, numeroempresa, nomeempresa, uf, ufempresa) VALUES ('$tipopessoa', '$nome', LCASE('$nacionalidade'), '$profissao', '$ecivil', '$rg', '$cpf', '$endereco', '$sexo', '$numero', '$cidade', '$cep', '$cnpjempresa', '$enderecoempresa', '$cargoempresa', '$tipoempresa', '$cidadeempresa', '$numeroempresa', '$nomeempresa',UCASE('$uf'),UCASE('$ufempresa')";

		} else if($tipopessoa == "f"){
			$sql = "INSERT INTO pessoa (tipopessoa, nome, nacionalidade, profissao, estadocivil, rg, cpf, endereco, sexo, numero, cidade, cep, uf) VALUES ('$tipopessoa', '$nome', LCASE('$nacionalidade'), '$profissao', '$ecivil', '$rg', '$cpf', '$endereco', '$sexo', '$numero', '$cidade', '$cep', UCASE('$uf'))";
		}
		mysqli_query($conexao,$sql);

		if (mysqli_affected_rows($conexao) =='1') {
			$_SESSION['msgvendedor'] = "<p class='alert alert-success' role='alert'>$nome inserido com sucesso!</p>";
			header("Location:contrato.php");
		} else {
			$_SESSION['msgvendedor'] ="<p class='alert alert-danger' role='alert'>Erro: ".mysqli_error($conexao)."<p>";
			header("Location:contrato.php");
		}
		mysqli_close($conexao);
	}

}

//Veiculo
//PARA PEGAR OS DADOS DOS CAMPOS
if (isset($_POST['enviarveiculo'])){
	$nomevei = $_POST['nomevei'];
	$marca  = $_POST['marca'];
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
	$sql = "SELECT * FROM veiculo WHERE placa='$placa'";
	mysqli_query($conexao,$sql);

	if (mysqli_affected_rows($conexao)!=0) {
		mysqli_close($conexao);
		$_SESSION['msg'] = "p class='alert alert-danger' role='alert'>$placa já foi cadastrada</p>";
		header('Location:contrato.php');

	}else {
		$sql = "INSERT INTO veiculo (nome, marca, modelo, ano, chassi, cor, placa, renavam, emnomede, valor, estado, combustivel) VALUES ('$nomevei', '$marca', '$modelo', '$ano', '$chassi', '$cor', UCASE('$placa'), '$renavam', '$proprietario', '$valorvei', '$estado', '$combustivel')";
		mysqli_query($conexao,$sql);

		if (mysqli_affected_rows($conexao) =='1') {
			$_SESSION['msg'] = "<p class='alert alert-success' role='alert'>$nomevei inserido com sucesso!</p>";
			header('Location:contrato.php');
		} else {
			$_SESSION['msg'] ="<p class='alert alert-danger' role='alert'>Erro: ".mysqli_error($conexao)."<p>";
			header('Location:contrato.php');
		}
		mysqli_close($conexao);
	}
}

?>



<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="imagens/icone.png" />
  <title>Contrato</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.min.js"></script>
  <style>
    .form-group input {
      border-radius: 2rem;
      display: inline-block;
      width: auto;
    }

  </style>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script>
    function showvend(nm) {
      str = nm;
      ///GET
      $.get("config/busca_cli_contrato.php?q=" + str, function(data, status) {
        if (status == 'success') {
          $('#txtcli').html(data);
        } else {
          $('#txtcli').html("Erro na consulta de dados");
        }
      });

    }

    function showcomp(nm) {
      str = nm;
      ///GET
      $.get("config/busca_cli_contrato_comp.php?q=" + str, function(data, status) {
        if (status == 'success') {
          $('#txtclicomp').html(data);
        } else {
          $('#txtclicomp').html("Erro na consulta de dados");
        }
      });

    }

    function showvei(nm) {
      str = nm;
      ///GET
      $.get("config/busca_vei_contrato.php?q=" + str, function(data, status) {
        if (status == 'success') {
          $('#txtvei').html(data);
        } else {
          $('#txtvei').html("Erro na consulta de dados");
        }
      });

    }

    $(document).ready(function() {
      $('#nomepesq').keyup(function() {
        showvend($('#nomepesq').val());
      })
      $('#nomepesqc').keyup(function() {
        showcomp($('#nomepesqc').val());
      })

      $('#nomepesqv').keyup(function() {
        showvei($('#nomepesqv').val());
      })
      showcomp('');
      showvend('');
      showvei('');
    });

  </script>

</head>

<body style="background: #007bff;
				 background: linear-gradient(to left, #5A8BB7, #2D9AAD);">
  <script type="text/javascript" src="javascript/contrato.js"></script>
  <script type="text/javascript" src="javascript/vendedorcomprador.js"></script>
  <!--NAVBAR-->
  <nav class="navbar navbar-expand-sm bg-info navbar-light sticky-top">
    <div class="container">
      <a class="navbar-brand" href="#"><img src="imagens/icone.png" width="30px">Á definir</a>
      <a class="nav-text d-sm-none d-md-block">Bem vindo(a) <?php echo $_SESSION['nome']; ?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="contrato.php">Criar contrato</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
              Cadastrar
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="cadastros/vendedor.php">Pessoa</a>
              <a class="dropdown-item" href="cadastros/veiculo.php">Veículo</a>
              <a class="dropdown-item" href="cadastro_contrato.php">Contrato</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
              Ver cadastros
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="cadastros/cadastro_pessoa.php">Pessoa</a>
              <a class="dropdown-item" href="cadastros/cadastro_veiculo.php">Veículo</a>
              <a class="dropdown-item" href="cadastros/cadastro_contrato.php">Contrato</a>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav flex-row ml-md-auto d-md-flex">
          <li class="nav-item">
            <a class="nav-link" href="config/logout.php">Logout</a>
          </li>
        </ul>

      </div>

    </div>
  </nav>
  <!--</NAVBAR-->
  <!--MODAL VENDEDOR Buscar-->
  <div class="modal fade" id="modalVendedor" tabindex="-1" role="dialog" aria-labelledby="modalVendedor" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document" style="max-width: 90%;">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="TituloVendedor">Encontrar vendedor</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="form-group">
              <!--<label for="nome" style="display:inline;">Pesquisar</label>-->
              <input type='text' name='nomepesq' id='nomepesq' class="form-control" placeholder="Pesquisar uma pessoa" style="display:inline;" autofocus>
            </div>
          </div>
          <div id="txtcli">
            Dados das pessoas....
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--MODAL VENDEDOR Buscar-->
  <!--MODAL COMPRADOR Buscar-->
  <div class="modal fade" id="modalComprador" tabindex="-1" role="dialog" aria-labelledby="modalComprador" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document" style="max-width: 90%;">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="TituloComprador">Encontrar comprador</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="form-group">
              <!--<label for="nome" style="display:inline;">Pesquisar</label>-->
              <input type='text' name='nomepesqc' id='nomepesqc' class="form-control" placeholder="Pesquisar uma pessoa" style="display:inline;" autofocus>
            </div>
          </div>
          <div id="txtclicomp">
            Dados das pessoas....
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--MODAL COMPRADOR Buscar-->
  <!--MODAL VENDEDOR/COMPRADOR Cadastrar-->
  <div class="modal fade" id="modalVendedorCadastrar" tabindex="-1" role="dialog" aria-labelledby="modalVendedorCadastrar" aria-hidden="true">
    <script type="text/javascript" src="javascript/vendedorcomprador.js"></script>
    <div class="modal-dialog modal-xl" role="document" style="max-width: 95%;">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="TituloVendedor">Cadastrar pessoa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="#" method="post" class="form-padrao">

            <div class="form-group">
              <label for="pessoa">Tipo de pessoa</label>
              <div class="form-check-inline">
                <input type="radio" class="form-check-input" name="pessoa" value="f" id="pessoaf">Pessoa física
              </div>
              <div class="form-check-inline">
                <input type="radio" class="form-check-input" name="pessoa" value="j" id="pessoaj">Pessoa jurídica
              </div>
            </div>

            <div class="row">
              <div class="form-group col-xl">
                <label for="nome">Nome completo</label><label for="nome" class="representante"> do representante</label>
                <input type="text" id="nome" class="form-control" name="nome">
              </div>

              <div class="form-group col-xl">
                <label for="nacionalidade">Nacionalidade</label><label for="nacionalidade" class="representante"> do representante</label>
                <input type="text" id="nacionalidade" class="form-control" name="nacionalidade">
              </div>
            </div>

            <div class="row">
              <div class="form-group col-xl">
                <label for="profissao">Profissão</label><label for="profissao" class="representante"> do representante</label>
                <input type="text" id="profissao" class="form-control" name="profissao">
              </div>

              <div class="form-group col-xl">
                <label for="rg">RG</label><label for="rg" class="representante"> do representante</label>
                <input type="text" id="rg" class="form-control" name="rg">
              </div>
            </div>

            <div class="form-group" id="ecivil">
              <label for="ecivil">Estado cívil</label>
              <label for="ecivil" class="representante"> do representante</label>
              <div class="form-check-inline">
                <input type="radio" class="form-check-input" name="ecivil" value="solteiro" id="solteiro">Solteiro(a)
              </div>
              <div class="form-check-inline">
                <input type="radio" class="form-check-input" name="ecivil" value="casado" id="casado">Casado(a)
              </div>
              <div class="form-check-inline">
                <input type="radio" class="form-check-input" name="ecivil" value="divorciado" id="divorciado">Divorciado(a)
              </div>
              <div class="form-check-inline">
                <input type="radio" class="form-check-input" name="ecivil" value="viuvo" id="viuvo">Viúvo(a)
              </div>
              <div class="form-check-inline">
                <input type="radio" class="form-check-input" name="ecivil" value="separado" id="separado">Separado(a)
              </div>
              <p id="msg_ecivil" class="form-control feedback"></p>
            </div>

            <div class="row">
              <div class="form-group col-xl">
                <label for="cpf">CPF</label><label for="cpf" class="representante"> do representante</label>
                <input type="text" id="cpf" class="form-control" name="cpf">
              </div>

              <div class="form-group col-xl">
                <label for="endereco">Endereço</label><label for="endereco" class="representante"> do representante</label>
                <input type="text" id="endereco" class="form-control" name="endereco">
              </div>

              <div class="form-group col-xl">
                <label for="uf">UF</label><label for="uf" class="representante"> da empresa</label>
                <input type="text" id="uf" class="form-control col-md-2" name="uf" style="text-transform:uppercase" maxlength="2" value="<?php echo ($id!=0)?"$uf":'';?>">
                <p id="msg_uf" class="form-control-feedback "></p>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-xl">
                <label for="numero">Número</label><label for="numero" class="representante"> do representante</label>
                <input type="text" id="numero" class="form-control" name="numero">
              </div>

              <div class="form-group col-xl">
                <label for="cidade">Cidade</label><label for="cidade" class="representante"> do representante</label>
                <input type="text" id="cidade" class="form-control" name="cidade">
              </div>
            </div>

            <div class="row">
              <div class="form-group col-xl">
                <label for="cep">CEP</label><label for="cep" class="representante"> do representante</label>
                <input type="text" id="cep" class="form-control" name="cep">
              </div>

              <div class="form-group col-xl">
                <label for="sexo">Sexo</label><label for="cep" class="representante"> do representante</label>
                <div class="form-check-inline">
                  <input type="radio" class="form-check-input" name="sexo" value="f" id="sexof">Feminino
                </div>
                <div class="form-check-inline">
                  <input type="radio" class="form-check-input" name="sexo" value="m" id="sexom">Masculino
                </div>
              </div>
            </div>

            <div class="row">
              <div class="form-group col-xl" id="gnomeempresa">
                <label for="nomeempresa">Nome</label><label for="nomeempresa" class="representante"> da empresa</label>
                <input type="text" id="nomeempresa" class="form-control" name="nomeempresa">
              </div>

              <div class="form-group col-xl" id="gcnpj">
                <label for="cnpj">CNPJ</label><label for="cnpj" class="representante"> da empresa</label>
                <input type="text" id="cnpj" class="form-control" name="cnpjempresa">
              </div>
            </div>

            <div class="row">
              <div class="form-group col-xl" id="gtipoempresa">
                <label for="tipoempresa">Tipo</label>
                <label for="tipoempresa" class="representante"> da empresa</label>
                <div class="form-check-inline">
                  <input type="radio" class="form-check-input" name="tipoempresa" value="pu" id="tipoempresapu">Pública
                </div>
                <div class="form-check-inline">
                  <input type="radio" class="form-check-input" name="tipoempresa" value="pr" id="tipoempresapr"> Privada
                </div>
                <p id="msg_tipoempresa" class="form-control feedback"></p>
              </div>

              <div class="form-group col-xl" id="gcargoempresa">
                <label for="cargo">Cargo</label><label for="cargo" class="representante"> do representante</label>
                <input type="text" id="cargoempresa" class="form-control" name="cargoempresa">
              </div>
            </div>

            <div class="row">
              <div class="form-group col-xl" id="genderecoempresa">
                <label for="enderecoempresa">Endereço</label><label for="enderecoempresa" class="representante"> da empresa</label>
                <input type="text" id="enderecoempresa" class="form-control" name="enderecoempresa">
              </div>

              <div class="form-group col-xl" id="gcidadeempresa">
                <label for="cidadeempresa">Cidade</label><label for="cidadeempresa" class="representante"> da empresa</label>
                <input type="text" id="cidadeempresa" class="form-control" name="cidadeempresa">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-xl" id="gufempresa">
                <label for="ufempresa">UF</label><label for="ufempresa" class="representante"> da empresa</label>
                <input type="text" id="ufempresa" class="form-control" name="ufempresa" style="text-transform:uppercase" maxlength="2" value="<?php echo ($id!=0)?"$ufempresa":'';?>">
                <p id="msg_ufempresa" class="form-control-feedback "></p>
              </div>
              <div class="form-group" id="gnumeroempresa">
                <label for="numeroempresa">Número</label><label for="numeroempresa" class="representante"> da empresa</label>
                <input type="text" id="numeroempresa" class="form-control" name="numeroempresa" value="<?php echo ($id!=0)?"$numeroempresa":'';?>">
                <p id="msg_numeroempresa" class="form-control-feedback "></p>
              </div>
            </div>

            <input type='hidden' name='id' id='codigo' value="<?php echo ($id!=0)?"$id":'0';?>">


            <input class="btn btn-md btn-primary btn-block text-uppercase" type="submit" name="enviarpessoa" value="Incluir" id="salvar">
          </form>
        </div>
      </div>
    </div>
  </div>
  <!--MODAL VENDEDOR/COMPRADOR Cadastrar -->
  <!--MODAL VEICULO Buscar-->
  <div class="modal fade" id="modalVeiculo" tabindex="-1" role="dialog" aria-labelledby="modalVeiculo" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document" style="max-width: 90%;">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="TituloVeiculo">Encontrar veículo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="form-group">
              <!--<label for="nome" style="display:inline;">Pesquisar</label>-->
              <input type='text' name='nomepesqv' id='nomepesqv' class="form-control" placeholder="Pesquisar uma placa" style="display:inline;" autofocus>
            </div>
          </div>
          <div id="txtvei">
            Dados dos veiculos....
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--MODAL VEICULO Buscar-->
  <!--MODAL VEICULO Cadastrar-->
  <div class="modal fade" id="modalVeiculoCadastrar" tabindex="-1" role="dialog" aria-labelledby="modalVeiculoCadastrar" aria-hidden="true">
    <script type="text/javascript" src="javascript/veiculo.js"></script>
    <div class="modal-dialog modal-xl" role="document" style="max-width: 90%;">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="TituloVeiculo">Cadastrar veículo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="#" method="post" class="form-padrao">
            <p class="feedback"><?php
								if (isset($_SESSION['msg'])) {
									echo  $_SESSION['msg'];
									unset ($_SESSION['msg']);
								}
								?></p>

            <div class="row">
              <div class="form-group col-xl">
                <label for="nomevei">Modelo(Nome)</label>
                <input type="text" id="nomevei" class="form-control" name="nomevei" title="Ex.: Celta, Prisma, Corsa" value="<?php echo ($id!=0)?"$nomevei":'';?>">
              </div>

              <div class="form-group col-xl">
                <label for="marca">Marca</label>
                <input type="text" id="marca" class="form-control" name="marca" title="Ex.: Chevrolet, Volkswagen, Ford " value="<?php echo ($id!=0)?"$marca":'';?>">
              </div>
            </div>

            <div class="row">
              <div class="form-group col-xl">
                <label for="ano">Ano</label>
                <input type="text" id="ano" class="form-control" name="ano" title="Ex.: 2010, 2000, 2019" value="<?php echo ($id!=0)?"$ano":'';?>">
              </div>

              <div class="form-group col-xl">
                <label for="modelo">Modelo(Ano)</label>
                <input type="text" id="modelo" class="form-control" name="modelo" value="<?php echo ($id!=0)?"$modelo":'';?>">
              </div>
            </div>

            <div class="row">
              <div class="form-group col-xl">
                <label for="chassi">Chassi</label>
                <input type="text" id="chassi" class="form-control" maxlength="17" name="chassi" value="<?php echo ($id!=0)?"$chassi":'';?>">
              </div>

              <div class="form-group col-xl">
                <label for="cor">Cor</label>
                <input type="text" id="cor" class="form-control" name="cor" title="Ex.: Vermelho, Rosa, Prata" value="<?php echo ($id!=0)?"$cor":'';?>">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-xl">
                <label for="placa">Placa</label>
                <input type="text" id="placa" class="form-control" maxlength="8" name="placa" title="XXX-0000" value="<?php echo ($id!=0)?"$placa":'';?>">
              </div>

              <div class="form-group col-xl">
                <label for="renavam">Renavam</label>
                <input type="text" id="renavam" class="form-control" maxlength="11" name="renavam" value="<?php echo ($id!=0)?"$renavam":'';?>">
              </div>
            </div>

            <div class="row">
              <div class="form-group col-xl">
                <label for="proprietario">Proprietario</label>
                <input type="text" id="proprietario" class="form-control" name="proprietario" title="O veículo esta em nome de ..." value="<?php echo ($id!=0)?"$proprietario":'';?>">
              </div>

              <div class="form-group col-xl">
                <label for="valorvei">Valor</label>
                <input type="text" id="valorvei" class="form-control" name="valorvei" title="Ex.: 10000,00" value="<?php echo ($id!=0)?"$valorvei":'';?>">
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
            <input class="btn btn-md btn-primary btn-block text-uppercase" type="submit" name="enviarveiculo" value="<?php echo $txtbtn?>" id="salvarveiculo">
          </form>
        </div>
      </div>
    </div>
  </div>
  <!--MODAL VEICULO Cadastrar-->

  <div class="container fundo-card col-md-11 col-lg-12 col-sm-12">
    <div class="col-sm-12 col-md-12 col-lg-11 mx-auto">
      <div class="card card-padrao my-5">
        <div class="card-body">
          <h5 class="card-title text-center">O contrato:</h5>
          <form action="#" method="post" class="form-padrao">
            <p class="feedback" id="msg">
              <?php
	if (isset($_SESSION['msg'])) {
		echo  $_SESSION['msg'];
		unset ($_SESSION['msg']);
	}
								?></p>
            <p class="feedback"><?php
								if (isset($_SESSION['msgvendedor'])) {
									echo  $_SESSION['msgvendedor'];
									unset ($_SESSION['msgvendedor']);
								}
								?></p>

            <div class="row">
              <div class="form-group col-md">
                <label for="vendedor" class="col-lg-4 col-sm-12 m-0">Vendedor</label>
                <input type="text" id="vendedor" class="form-control col-lg-5" name="vededor" value="<?php echo ($id!=0)?"$nomevend":''?>" readonly>
                <i class="material-icons " style="font-size: 24px;" data-toggle="modal" data-target="#modalVendedor">
                  search
                </i>
                <i class="material-icons " style="font-size: 24px;" data-toggle="modal" data-target="#modalVendedorCadastrar">
                  edit
                </i>
              </div>
              <div class="form-group col-md">
                <label for="cpfvreadonly">CPF</label>
                <input type="text" id="cpfvreadonly" class="form-control" placeholder="CPF do vendedor" value="<?php echo ($id!=0)?"$cpfvend":''?>" readonly>

              </div>
            </div>

            <div class="row">
              <div class="form-group col-md">
                <label for="comprador" class="col-lg-4 col-sm-12 m-0 ">Comprador</label>
                <input type="text" id="comprador" class="form-control col-lg-5 m-0" name="comprador" value="<?php echo ($id!=0)?"$nomecomp":'';?>" readonly>
                <i class="material-icons" style="font-size: 24px;" data-toggle="modal" data-target="#modalComprador">
                  search
                </i>
                <i class="material-icons" style="font-size: 24px;" data-toggle="modal" data-target="#modalVendedorCadastrar">
                  edit
                </i>
              </div>
              <div class="form-group col-md">
                <label for="cpfcreadonly">CPF</label>
                <input type="text" id="cpfcreadonly" class="form-control" placeholder="CPF do comprador" value="<?php echo ($id!=0)?"$cpfcomp":'';?>" readonly>
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md">
                <label for="veiculo" class="col-lg-4 col-sm-12 m-0 ">Veículo</label>
                <input type="text" id="veiculo" class="form-control col-lg-5 m-0" name="veiculo" value="<?php echo ($id!=0)?"$nomevei":'';?>" readonly>
                <i class="material-icons" style="font-size: 24px;" data-toggle="modal" data-target="#modalVeiculo">
                  search
                </i>
                <i class="material-icons" style="font-size: 24px;" data-toggle="modal" data-target="#modalVeiculoCadastrar">
                  edit
                </i>
              </div>
              <div class="form-group col-md">
                <label for="placareadonly">Placa</label>
                <input type="text" id="placareadonly" class="form-control" placeholder="Placa do veículo" value="<?php echo ($id!=0)?"$placavei":'';?>" readonly>
              </div>
            </div>


            <div class="form-group col-md">
              <label for="dpagamento" class="col-lg-4 col-sm-12 m-0">Dia de Pagamento</label>
              <input type="text" id="dpagamento" class="form-control col-lg-5 m-0" name="dpagamento" value="<?php echo ($id!=0)?"$dpagamento":'';?>" placeholder="Ex. 15" title="Todo dia X de cada mês">

              <label for="valortotal" class="col-lg-4 col-sm-12 m-0">Valor Total</label>
              <input type="text" id="valortotal" class="form-control col-lg-5 m-0" name="valortotal" value="<?php echo ($id!=0)?"$valortotal":'';?>" readonly>

              <label for="entrada" class="col-lg-4 col-sm-12 m-0">Entrada</label>
              <input type="text" id="entrada" class="form-control col-lg-5 m-0" name="entrada" title="Caso seja á vista digite 0 na entrada" value="<?php echo ($id!=0)?"$entrada":'';?>">

              <label for="numeroparcelas" class="col-lg-4 col-sm-12 m-0">Quantidade de Parcelas</label>
              <input type="text" id="numeroparcelas" class="form-control col-lg-5 m-0" name="numeroparcelas" value="<?php echo ($id!=0)?"$numeroparcelas":'';?>">

              <label for="vparcela" class="col-lg-4 col-sm-12 m-0">Valor das Parcelas</label>
              <input type="text" id="valorparcela" class="form-control col-lg-5 m-0" name="valorparcela" value="<?php echo ($id!=0)?"$valorparcela":'';?>" readonly>

              <label for="juro" class="col-lg-4 col-sm-12 m-0">Juros</label>
              <div class="form-check-inline">
                <input type="radio" id="juro05" class="form-check-input" name="juro" value="0.5% ao mês" <?php echo ($id!=0)?"$juro05":'';?>>0.5% ao mês
              </div>
              <div class="form-check-inline">
                <input type="radio" id="juro1" class="form-check-input" name="juro" value="1% ao mês" <?php echo ($id!=0)?"$juro1":'';?>>1% ao mês
              </div>
              <div class="form-check-inline">
                <input type="radio" id="juro15" class="form-check-input" name="juro" value="1.5% ao mês" <?php echo ($id!=0)?"$juro15":'';?>>1.5% ao mês
              </div>
              <div class="form-check-inline">
                <input type="radio" id="juro2" class="form-check-input" name="juro" value="2% ao mês" <?php echo ($id!=0)?"$juro2":'';?>>2% ao mês
              </div>
              <label class="form-text text-muted">A porcentagem de juros é cobrada sob o valor incial.</label>
              <p id="msg_juro" class="form-control-feedback"></p>

              <label for="foro" class="col-lg-4 col-sm-12 m-0">Foro</label>
              <input type="text" id="foro" class="form-control col-lg-5 m-0" name="foro" value="<?php echo ($id!=0)?"$foro":'';?>">

              <label for="datacriacao">Data Criação</label>
              <input type="text" id="datacriacao" class="form-control" name="datacriacao" value="<?php echo ($id!=0)?"$datacriacao":'';?>">
            </div>
            <div class="row">
              <div class="form-group col-xl">
                <label for="ntestemunha1" class="col-lg-5 col-xl-4 col-sm-12 m-0 ">Nome Completo da Testemunha 1</label>
                <input type="text" id="ntestemunha1" class="form-control col-xl-4 col-lg-5 m-0" name="ntestemunha1" value="<?php echo ($id!=0)?"$ntestemunha1":'';?>">

                <label for="rgtestemunha1" class="col-lg-5 col-xl-3 col-sm-12 m-0 ">RG da Testemunha 1</label>
                <input type="text" id="rgtestemunha1" class="form-control col-xl-4 col-lg-5 m-0" name="rgtestemunha1" value="<?php echo ($id!=0)?"$rgtestemunha1":'';?>">
              </div>
            </div>

            <div class="row">
              <div class="form-group col-xl">
                <label for="ntestemunha2" class="col-lg-5 col-xl-4 col-sm-12 m-0 ">Nome Completo da Testemunha 2</label>
                <input type="text" id="ntestemunha2" class="form-control col-xl-4 col-lg-5 m-0" name="ntestemunha2" value="<?php echo ($id!=0)?"$ntestemunha2":'';?>">

                <label for="rgtestemunha2" class="col-lg-5 col-xl-3 col-sm-12 m-0 ">RG da Testemunha 2</label>
                <input type="text" id="rgtestemunha2" class="form-control col-xl-4 col-lg-5 m-0" name="rgtestemunha2" value="<?php echo ($id!=0)?"$rgtestemunha2":'';?>">
              </div>
            </div>

            <div class="row">
              <div class="form-group col-xl">
                <label for="lassinatura" class="col-lg-3 col-sm-12 m-0 ">Cidade para Assinatura</label>
                <input type="text" id="lassinatura" class="form-control col-xl-4 col-lg-5 m-0" name="lassinatura" value="<?php echo ($id!=0)?"$lassinatura":'';?>">

                <label for="dassinatura" class="col-lg-3 col-sm-12 m-0 ">Data de Assinatura</label>
                <input type="date" id="dassinatura" class="form-control col-xl-4 col-lg-5 m-0" name="dassinatura" value="<?php echo ($id!=0)?"$dassinatura":'';?>">
              </div>
            </div>


            <input type='hidden' name='id' id='codigo' value="<?php echo ($id!=0)?"$id":'0';?>">
            <input type='hidden' name='op' value="<?php echo ($id!=0)?"$op":'';?>">
            <input type='hidden' name='idvend' id='idvend' value="<?php echo ($id!=0)?"$idvend":'';?>">
            <input type='hidden' name='idcomp' id='idcomp' value="<?php echo ($id!=0)?"$idcomp":'';?>">
            <input type='hidden' name='idvei' id='idvei' value="<?php echo ($id!=0)?"$idvei":'';?>">
            <input type='hidden' name='idlogin' id='idlogin' value="<?php echo $_SESSION['idusuario']; ?>">


            <?php
							$txtbtn="Incluir";
							if (isset($op)){
								$txtbtn=($op=='A')?'Atualizar':'Excluir';
							}
							?>
            <input class="btn btn-md btn-primary btn-block text-uppercase" type="submit" name="enviarcontrato" value="<?php echo $txtbtn?>" id="salvarcontrato">

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
