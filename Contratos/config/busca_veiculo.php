<?php
require 'conexao.php';
$sql = "SELECT * FROM veiculo";

$nm=$_GET['q']; //recupera o parâmetro passado na visualização
if ($nm!='') {
    if ($nm!='') {
        $sql.=" WHERE UPPER(NOME) LIKE UPPER('%$nm%')";
    }
}
$sql.=" ORDER BY idveiculo";

$result=mysqli_query($conexao,$sql);
if (mysqli_affected_rows($conexao)>0) {
    echo "<div class='table-responsive'>
	<table class='table table-hover table-light table-sm'>
             <thead>
			  <tr>
                <th scope='col'>Código</th>
                <th scope='col'>Nome</th>
                <th scope='col'>Marca</th>
                <th scope='col'>Modelo</th>
                <th scope='col'>Ano</th>
                <th scope='col'>Chassi</th>
                <th scope='col'>Cor</th>
                <th scope='col'>Placa</th>
				<th scope='col'>Renavam</th>
                <th scope='col'>Proprietário</th>
                <th scope='col'>Valor</th>
                <th scope='col'>Operação</th>
			 <tr>
            </thead>";
    while ($row=mysqli_fetch_row($result))
    {
        echo " <tbody>";
        echo " <tr>";
        echo "<th scope='row'>".$row[0]."</td>";
        echo "<td>".$row[1]."</td>";
        echo "<td>".$row[2]."</td>";
        echo "<td>".$row[3]."</td>";
        echo "<td>".$row[4]."</td>";
        echo "<td>".$row[5]."</td>";
        echo "<td>".$row[6]."</td>";
        echo "<td>".$row[7]."</td>";
        echo "<td>".$row[9]."</td>";
        echo "<td>".$row[8]."</td>";
        echo "<td>".$row[10]."</td>";
        echo "<td> <a href=veiculo.php?id=".$row[0]."&op=A><button type='button' class='btn btn-info btn-sm w-100'>Atualizar</button></a><a href=veiculo.php?id=".$row[0]. "&op=D><button type='button' class='btn btn-danger btn-sm w-100'>Deletar</button></a></td>";
		echo " </tr>";
    }   echo " </tbody>";
    echo "</table></div>";
}
mysqli_close($conexao);

?>
