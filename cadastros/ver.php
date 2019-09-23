<?php
require '../config/conexao.php';

$id_imagem = $_GET['id'];
$sql = "SELECT codigo,
arquivo, tipo FROM arquivos WHERE codigo = ".$id_imagem;
$res=mysqli_query($conexao,$sql);
$row=mysqli_fetch_assoc($res);
header( "Content-type:".$row['tipo']);
echo $row['arquivo'];
?>
