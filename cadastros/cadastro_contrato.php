<!DOCTYPE html>
<?php session_start();
include('../config/verifica_login.php');
require '../config/conexao.php';

if (isset($_POST['enviararquivo'])){
    $nomeEvento = $_POST['nome'];
    $descricaoEvento = $_POST['descricao'];
    $arquivo= $_FILES['arquivo']['tmp_name'];
    $tamanho = $_FILES['arquivo']['size'];
    $tipo = $_FILES['arquivo']['type'];
    $nome = $_FILES['arquivo']['name'];

    if ( $arquivo != "none" )
    {
        $fp = fopen($arquivo, "rb");
        $conteudo = fread($fp, $tamanho);
        $conteudo = addslashes($conteudo);
        fclose($fp);

        $sql = "INSERT INTO arquivos (nome,
descricao,  tamanho, tipo, arquivo) VALUES ('$nomeEvento',
'$descricaoEvento','$tamanho', '$tipo','$conteudo')";

     $res=mysqli_query($conexao,$sql) or die("Algo deu errado ao inserir
 o registro. Tente novamente.");
        echo 'Registro inserido com sucesso!';
        header('Location: cadastro_contrato.php');
        if(mysqli_affected_rows($conexao) > 0)
            print "A imagem foi salva na base de dados.";
        else
            print "Não foi possível salvar a imagem na base de dados.";
    }
    else
        print "Não foi possível carregar a imagem.";
}
?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="../imagens/icone.png" />
    <title>Contrato - Contratos</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script>
        function showcontrato(vei) {
            str = vei;

            ///GET
            $.get("../config/busca_contrato.php?q=" + str, function(data, status) {
                if (status == 'success') {
                    $('#txtcontrato').html(data);
                } else {
                    $('#txtcontrato').html("Erro na consulta de dados");
                }
            });

        }

        $(document).ready(function() {
            $('#vei').keyup(function() {
                showcontrato($('#vei').val());
            })
            showcontrato('');
        });

    </script>

</head>

<body style="background: #007bff;
                 background: linear-gradient(to left, #5A8BB7, #2D9AAD);">
    <!--NAVBAR-->
    <nav class="navbar navbar-expand-sm bg-info navbar-light sticky-top">
        <a class="navbar-brand " href="#"><img src="../imagens/icone.png" width="30px">Á definir</a>
        <a class="nav-text">Bem vindo(a) <?php echo $_SESSION['nome']; ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../contrato.php">Criar contrato</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        Cadastrar
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="vendedor.php">Pessoa</a>
                        <a class="dropdown-item" href="veiculo.php">Veículo</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        Ver cadastros
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="cadastro_pessoa.php">Pessoa</a>
                        <a class="dropdown-item" href="cadastro_veiculo.php">Veículo</a>
                        <a class="dropdown-item" href="cadastro_contrato.php">Contrato</a>
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
        <div class="col-sm-12 col-md-12 col-lg-11 mx-auto">
            <div class="card card-padrao my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Contratos Cadastrados</h5>
                    <div class="form-padrao">
                        <form>
                            <div class="row">
                                <div class="form-group">
                                    <input type='text' name='vei' id='vei' class="form-control" placeholder="Pesquisar uma placa" style="display:inline;" autofocus>
                                </div>
                            </div>
                        </form>
                        <div id="txtcontrato">
                            Contratos..
                        </div>
                        <center><a href="../contrato.php"><button class="btn btn-outline-info text-uppercase btn-inline col-sm-9 col-md-5 col-lg-5">Cadastrar um Contrato</button></a>
                        </center>

                        <form enctype="multipart/form-data" action="#" method="post">
                            <div><input name="nome" type="text" /></div>
                            <div><input name="descricao" type="textarea" /></div>
                            <input type="hidden" name="MAX_FILE_SIZE" value="99999999" />
                            <div><input name="arquivo" type="file" /></div>
                            <div><input type="submit" name="enviararquivo" value="Salvar" /></div>
                        </form>
                        <table border="1">
                            <tr>
                                <td align="center">
                                    Código
                                </td>
                                <td align="center">
                                    Evento
                                </td>
                                <td align="center">
                                    Descrição
                                </td>
                                <td align="center">
                                    Tipo
                                </td>
                                <td align="center">
                                    Visualizar imagem
                                </td>
                                <td align="center">
                                    Excluir imagem
                                </td>
                            </tr>
                            <?php

    $querySelecao = "SELECT codigo, nome, descricao,
     tipo, arquivo FROM arquivos";
    $resultado = mysqli_query($conexao,$querySelecao);

    while ($aquivos = mysqli_fetch_array($resultado)) { ?>
                            <td align="center">
                                <?php echo $aquivos['codigo']; ?>
                            </td>
                            <td align="center">
                                <?php echo $aquivos['nome']; ?>
                            </td>
                            <td align="center">
                                <?php echo $aquivos['descricao']; ?>
                            </td>
                            <td align="center">
                                <?php echo $aquivos['tipo']; ?>
                            </td>
                            <td align="center">
                                <?php echo '<a href="ver_imagem.php?id='.$aquivos['codigo'].
        '">Imagem '.$aquivos['codigo'].'</a>'; ?>
                            </td>
                            <td align="center">
                                <?php echo '<a href="excluir_imagem.php?id='.$aquivos['codigo'].
        '">Imagem '.$aquivos['codigo'].'</a>'; ?>
                            </td>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
