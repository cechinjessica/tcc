<?php
require '../config/conexao.php';

$id_imagem = $_GET['codigo'];
$querySelecionaPorCodigo = "SELECT codigo,
arquivo FROM arquivos WHERE codigo = ".$id_imagem;
$resultado = mysqli_query($conexao, $querySelecionaPorCodigo);
$imagem = mysqli_fetch_object($resultado);
Header( "Content-type: application/pdf");
echo $imagem->pdf;
?>
