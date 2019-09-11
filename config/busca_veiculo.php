<?php
require 'conexao.php';
$sql = "SELECT * FROM veiculo";

$nm=$_GET['q']; //recupera o parâmetro passado na visualização
if ($nm!='') {
    if ($nm!='') {
        $sql.=" WHERE UPPER(Placa) LIKE UPPER('%$nm%')";
    }
}
$sql.=" ORDER BY Nome ASC";

$result=mysqli_query($conexao,$sql);
if (mysqli_affected_rows($conexao)>0) {
    echo "<div class='table-responsive'>
	<table class='table table-hover table-light table-sm'>
             <thead>
			  <tr>
                <th scope='col' style='white-space: nowrap; text-align:center;'>Código</th>
                <th scope='col' style='white-space: nowrap; text-align:center;'>Nome</th>
                <th scope='col' style='white-space: nowrap; text-align:center;'>Marca</th>
                <th scope='col' style='white-space: nowrap; text-align:center;'>Modelo</th>
                <th scope='col' style='white-space: nowrap; text-align:center;'>Ano</th>
                <th scope='col' style='white-space: nowrap; text-align:center;'>Chassi</th>
                <th scope='col' style='white-space: nowrap; text-align:center;'>Cor</th>
                <th scope='col' style='white-space: nowrap; text-align:center;'>Placa</th>
				<th scope='col' style='white-space: nowrap; text-align:center;'>Renavam</th>
                <th scope='col' style='white-space: nowrap; text-align:center;'>Proprietário</th>
                <th scope='col' style='white-space: nowrap; text-align:center;'>Valor</th>
                <th scope='col' style='white-space: nowrap; text-align:center;'>Operação</th>
			 <tr>
            </thead>";
    while ($row=mysqli_fetch_row($result))
    {
        echo " <tbody>";
        echo " <tr>";
        echo "<th scope='row' style='white-space: nowrap; text-align:center;'>".$row[0]."</td>";
        echo "<td style='white-space: nowrap; text-align:center;'>".$row[1]."</td>";
        echo "<td style='white-space: nowrap; text-align:center;'>".$row[2]."</td>";
        echo "<td style='white-space: nowrap; text-align:center;'>".$row[3]."</td>";
        echo "<td style='white-space: nowrap; text-align:center;'>".$row[4]."</td>";
        echo "<td style='white-space: nowrap; text-align:center;'>".$row[5]."</td>";
        echo "<td style='white-space: nowrap; text-align:center;'>".$row[6]."</td>";
        echo "<td style='white-space: nowrap; text-align:center;'>".$row[7]."</td>";
        echo "<td style='white-space: nowrap; text-align:center;'>".$row[8]."</td>";
        echo "<td style='white-space: nowrap; text-align:center;'>".$row[9]."</td>";
        echo "<td style='white-space: nowrap; text-align:center;'>".$row[10]."</td>";
        echo "<td> <a href=veiculo.php?id=".$row[0]."&op=A><button type='button' class='btn btn-info btn-sm w-100'>Atualizar</button></a><a href=veiculo.php?id=".$row[0]. "&op=D><button type='button' class='btn btn-danger btn-sm w-100'>Deletar</button></a></td>";
		echo " </tr>";
    }   echo " </tbody>";
    echo "</table></div>";
}
mysqli_close($conexao);

?>
