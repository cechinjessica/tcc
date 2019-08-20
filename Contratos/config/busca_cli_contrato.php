<?php
require 'conexao.php';
$sql = "SELECT * FROM pessoa";

$nm=$_GET['q']; //recupera o parâmetro passado na visualização
if ($nm!='') {
   if ($nm!='') {
      $sql.=" WHERE UPPER(NOME) LIKE UPPER('%$nm%')";
   }
}
$sql.=" ORDER BY idpessoa";

$result=mysqli_query($conexao,$sql);
if (mysqli_affected_rows($conexao)>0) {
   echo "<div class='table-responsive'>
	<table class='table table-hover table-light table-sm' >
             <thead>
			  <tr>
                <th scope='col'>Código</th>
                <th scope='col'>Pessoa</th>
                <th scope='col'>Nome</th>
                <th scope='col'>Origem</th>
                <th scope='col'>Profissão</th>
                <th scope='col'>Est. Cívil</th>
                <th scope='col'>RG</th>
                <th scope='col'>CPF</th>
				<th scope='col'>Sexo</th>
                <th scope='col'>Endereço</th>
                <th scope='col'>Número</th>
                <th scope='col'>Cidade</th>
				<th scope='col'>Empresa</th>
                <th scope='col'>CNPJ</th>
                <th scope='col'>Cargo</th>
                <th scope='col'>Cidade</th>
                <th scope='col'>Operação</th>
			 <tr>
            </thead>";
   while ($row=mysqli_fetch_row($result))
   {
      $nome = str_replace(' ', '+', $row[2]);
      if($row[1] == "f"){
         $pessoa = "Física";
      }else{
         $pessoa = "Jurídica";
      }
      if($row[9] == "f"){
         $sexo = "Feminino";
      }else{
         $sexo = "Masculino";
      }
      echo " <tbody>";
      echo " <tr>";
      echo "<th scope='row' id=".$row[0]." onclick=getid(".$row[0].",'".$row[7]."','".$nome."') >".$row[0]."</td>";
      echo "<td id=".$row[0]." onclick=getid(".$row[0].",'".$row[7]."','".$nome."') >".$pessoa."</td>";
      echo "<td id=".$row[0]." onclick=getid(".$row[0].",'".$row[7]."','".$nome."') >".$row[2]."</td>";
      echo "<td id=".$row[0]." onclick=getid(".$row[0].",'".$row[7]."','".$nome."') >".$row[3]."</td>";
      echo "<td id=".$row[0]." onclick=getid(".$row[0].",'".$row[7]."','".$nome."') >".$row[4]."</td>";
      echo "<td id=".$row[0]." onclick=getid(".$row[0].",'".$row[7]."','".$nome."') >".$row[5]."</td>";
      echo "<td id=".$row[0]." onclick=getid(".$row[0].",'".$row[7]."','".$nome."') >".$row[6]."</td>";
      echo "<td id=".$row[0]." onclick=getid(".$row[0].",'".$row[7]."','".$nome."') >".$row[7]."</td>";
      echo "<td id=".$row[0]." onclick=getid(".$row[0].",'".$row[7]."','".$nome."') >".$sexo."</td>";
      echo "<td id=".$row[0]." onclick=getid(".$row[0].",'".$row[7]."','".$nome."') >".$row[8]."</td>";
      echo "<td id=".$row[0]." onclick=getid(".$row[0].",'".$row[7]."','".$nome."') >".$row[10]."</td>";
      echo "<td id=".$row[0]." onclick=getid(".$row[0].",'".$row[7]."','".$nome."') >".$row[11]."</td>";
      echo "<td id=".$row[0]." onclick=getid(".$row[0].",'".$row[7]."','".$nome."') >".$row[19]."</td>";
      echo "<td id=".$row[0]." onclick=getid(".$row[0].",'".$row[7]."','".$nome."') >".$row[13]."</td>";
      echo "<td id=".$row[0]." onclick=getid(".$row[0].",'".$row[7]."','".$nome."') >".$row[15]."</td>";
      echo "<td id=".$row[0]." onclick=getid(".$row[0].",'".$row[7]."','".$nome."') >".$row[17]."</td>";
      echo "<td> <a href=cadastros/vendedor.php?id=".$row[0]."&op=A"."><button type='button' class='btn btn-info btn-sm w-100'>Atualizar</button></a><a href=cadastros/vendedor.php?id=".$row[0]. "&op=D" . "><button type='button' class='btn btn-danger btn-sm w-100'>Deletar</button></a>" . "</td>" ;
      echo " </tr>" ;
   } echo " </tbody>" ;
   echo "</table></div>" ;
} mysqli_close($conexao);
?>
