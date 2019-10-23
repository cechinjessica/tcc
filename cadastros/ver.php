<?php
require '../config/conexao.php';

$id = $_GET['id'];
$sql = "SELECT Arquivo, Tipo FROM contrato WHERE IdContrato = ".$id;
$res=mysqli_query($conexao,$sql);
$row=mysqli_fetch_assoc($res);
header( "Content-type:".$row['Tipo']);
echo $row['Arquivo'];
?>
