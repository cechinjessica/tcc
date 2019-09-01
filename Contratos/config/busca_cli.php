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
	<table class='table table-hover table-light table-sm'>
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
                <th scope='col'>CEP</th>
				<th scope='col'>Empresa</th>
                <th scope='col'>CNPJ</th>
                <th scope='col'>Enderço da Empresa</th>
                <th scope='col'>Cargo</th>
                <th scope='col'>Tipo de Empresa</th>
                <th scope='col'>Cidade da Empresa</th>
                <th scope='col'>Número da Empresa</th>
                <th scope='col'>Operação</th>
			 <tr>
            </thead>";
    while ($row=mysqli_fetch_row($result))
    {
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

        echo " <tbody class='table-striped'>";
        echo " <tr>";
        echo "<th scope='row'>".$row[0]."</td>";
        echo "<td>".$pessoa."</td>";
        echo "<td>".$row[2]."</td>";
        echo "<td>".$row[3]."</td>";
        echo "<td>".$row[4]."</td>";
        echo "<td>".$row[5]."</td>";
        echo "<td>".$row[6]."</td>";
        echo "<td>".$row[7]."</td>";
        echo "<td>".$sexo."</td>";
        echo "<td>".$row[8]."</td>";
        echo "<td>".$row[10]."</td>";
        echo "<td>".$row[11]."</td>";
        echo "<td>".$row[12]."</td>";
        echo "<td>".$row[19]."</td>";
        echo "<td>".$row[13]."</td>";
        echo "<td>".$row[14]."</td>";
        echo "<td>".$row[15]."</td>";
        echo "<td>".$row[16]."</td>";
        echo "<td>".$row[17]."</td>";
        echo "<td>".$row[18]."</td>";
        echo "<td> <a href=vendedor.php?id=".$row[0]."&op=A><button type='button' class='btn btn-info btn-sm w-100'>Atualizar</button></a><a href=vendedor.php?id=".$row[0]. "&op=D><button type='button' class='btn btn-danger btn-sm w-100'>Deletar</button></a></td>";
		echo " </tr>";
    }   echo " </tbody>";
    echo "</table></div>";
}
mysqli_close($conexao);

?>
