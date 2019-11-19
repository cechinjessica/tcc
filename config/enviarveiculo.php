<?php
session_start();
require 'conexao.php';
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
    $_SESSION[_contrato] = "$placa já foi cadastrada";
}else {
    $sql = "INSERT INTO veiculo (nome, marca, modelo, ano, chassi, cor, placa, renavam, emnomede, valor, estado, combustivel) VALUES ('$nomevei', '$marca', '$modelo', '$ano', '$chassi', '$cor', UCASE('$placa'), '$renavam', '$proprietario', '$valorvei', '$estado', '$combustivel')";
    mysqli_query($conexao,$sql);

    if (mysqli_affected_rows($conexao) =='1') {
       // $_SESSION['msg'] = "<p class='text-success'>$nomevei inserido com sucesso!</p>";
    } else {
        //$_SESSION['msg'] ="<p class='text-danger'>Erro: ".mysqli_error($conexao)." no banco de dados</p>";
    }
    mysqli_close($conexao);
}
?>
