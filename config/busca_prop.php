<?php
require 'conexao.php';
$sql = "SELECT * FROM pessoa";

$prop=$_POST['q']; //recupera o parâmetro passado na visualização
if ($prop!='') {
    $sql.=" WHERE nome ='$prop'";
}

$result=mysqli_query($conexao,$sql);
if (mysqli_affected_rows($conexao)>0) {
    echo "1";
} else {
    echo "0";
}

mysqli_close($conexao);

?>
