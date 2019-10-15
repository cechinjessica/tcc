<?php
define("HOST","127.0.0.1");
define("USUARIO","root");
define("SENHA","");
define("DB","mydb");

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB);

if (mysqli_connect_errno($conexao)){
	echo "Problemas para conectar no BD";
	die();
}

?>
