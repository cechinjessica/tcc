<?php
require 'conexao.php';
$sql = "SELECT * FROM pessoa";

$cpf=$_POST['q']; //recupera o parâmetro passado na visualização
if ($cpf!='') {
    $sql.=" WHERE cpf = ('$cpf')";

}

$result=mysqli_query($conexao,$sql);

//echo mysqli_error($con);
if (mysqli_affected_rows($conexao)>0) {
    echo "1";
} else {
    echo "0";
}

mysqli_close($conexao);

?>
