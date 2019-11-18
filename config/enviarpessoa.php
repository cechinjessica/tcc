<?php
session_start();
require 'conexao.php';

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
if(isset($_POST['tipoempresa'])){
	$tipoempresa = $_POST['tipoempresa'];
}else{
	$tipoempresa="";
}
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
	$_SESSION['msg_cpf'] = "<p class='text-danger '>$cpf já foi cadastrado</p>";

}else {
	if($tipopessoa == "j"){
		$sql = "INSERT INTO pessoa (tipopessoa, nome, nacionalidade, profissao, estadocivil, rg, cpf, endereco, sexo, numero, cidade, cep, cnpj, enderecoempresa, cargoempresa, tipoempresa, cidadeempresa, numeroempresa, nomeempresa, uf, ufempresa) VALUES ('$tipopessoa', '$nome', LCASE('$nacionalidade'), '$profissao', '$ecivil', '$rg', '$cpf', '$endereco', '$sexo', '$numero', '$cidade', '$cep', '$cnpjempresa', '$enderecoempresa', '$cargoempresa', '$tipoempresa', '$cidadeempresa', '$numeroempresa', '$nomeempresa',UCASE('$uf'),UCASE('$ufempresa'))";

	} else if($tipopessoa == "f"){
		$sql = "INSERT INTO pessoa (tipopessoa, nome, nacionalidade, profissao, estadocivil, rg, cpf, endereco, sexo, numero, cidade, cep, uf) VALUES ('$tipopessoa', '$nome', LCASE('$nacionalidade'), '$profissao', '$ecivil', '$rg', '$cpf', '$endereco', '$sexo', '$numero', '$cidade', '$cep', UCASE('$uf'))";
	}
	mysqli_query($conexao,$sql);

	if (mysqli_affected_rows($conexao) =='1') {
		$_SESSION['msgvendedor'] = "<p class='text-success '>$nome inserido com sucesso!</p>";
	} else {
		$_SESSION['msgvendedor'] ="<p class='text-danger '>Erro: ".mysqli_error($conexao)." no banco de dados</p>";
	}
	mysqli_close($conexao);
}

?>
