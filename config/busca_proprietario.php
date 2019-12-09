<?php
require 'conexao.php';
$sql = "SELECT * FROM pessoa";

$nm=$_GET['q']; //recupera o parâmetro passado na visualização
if ($nm!='') {
  $sql.=" WHERE UPPER(NOME) LIKE UPPER('%$nm%')";
}
$sql.=" ORDER BY Nome ASC";

$result=mysqli_query($conexao,$sql);
if (mysqli_affected_rows($conexao)>0) {
  echo "<div class='table-responsive'>
	<table class='table table-hover table-light table-sm' >
             <thead>
			  <tr>
                <th scope='col' style='white-space: nowrap; text-align:center;'>Nome</th>
                <th scope='col' style='white-space: nowrap; text-align:center;'>Pessoa</th>
                <th scope='col' style='white-space: nowrap; text-align:center;'>Profissão</th>
                <th scope='col' style='white-space: nowrap; text-align:center;'>CPF</th>
                <th scope='col' style='white-space: nowrap; text-align:center;'>Endereço</th>
                <th scope='col' style='white-space: nowrap; text-align:center;'>Número</th>
                <th scope='col' style='white-space: nowrap; text-align:center;'>Cidade</th>
				<th scope='col' style='white-space: nowrap; text-align:center;'>Empresa</th>
                <th scope='col' style='white-space: nowrap; text-align:center;'>CNPJ</th>

			 <tr>
            </thead>";
  echo " <tbody>";
  while ($row=mysqli_fetch_row($result))
  {
    $nome = str_replace(' ', '+', $row[2]);

    if($row[1] == "f"){
      $pessoa = "Física";
    }else{
      $pessoa = "Jurídica";
    }

    echo " <tr>";
    echo "<td id=".$row[0]." onclick=getidprop('".$nome."') style='white-space: nowrap; text-align:center;' >".$row[2]."</td>";
    echo "<td id=".$row[0]." onclick=getidprop('".$nome."') style='white-space: nowrap; text-align:center;' >".$pessoa."</td>";
    echo "<td id=".$row[0]." onclick=getidprop('".$nome."') style='white-space: nowrap; text-align:center;' >".$row[4]."</td>";
    echo "<td id=".$row[0]." onclick=getidprop('".$nome."') style='white-space: nowrap; text-align:center;' >".$row[7]."</td>";
    echo "<td id=".$row[0]." onclick=getidprop('".$nome."') style='white-space: nowrap; text-align:center;' >".$row[8]."</td>";
    echo "<td id=".$row[0]." onclick=getidprop('".$nome."') style='white-space: nowrap; text-align:center;' >".$row[10]."</td>";
    echo "<td id=".$row[0]." onclick=getidprop('".$nome."') style='white-space: nowrap; text-align:center;' >".$row[11]."</td>";
    echo "<td id=".$row[0]." onclick=getidprop('".$nome."') style='white-space: nowrap; text-align:center;' >".$row[19]."</td>";
    echo "<td id=".$row[0]." onclick=getidprop('".$nome."') style='white-space: nowrap; text-align:center;' >".$row[13]."</td>";
    echo " </tr>" ;
  }
  echo " </tbody>" ;
  echo "</table></div>" ;
} mysqli_close($conexao);
?>
