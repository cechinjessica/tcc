<?php
require 'conexao.php';
$sql = "SELECT * FROM pessoa";

$nm=$_GET['q']; //recupera o parâmetro passado na visualização
if ($nm!='') {      
    if ($nm!='') {
        $sql.=" WHERE UPPER(NOME) LIKE UPPER('%$nm%')";   
    }
   // unset($_POST['nome']);
    //unset($_POST['filtrar']);

}
$sql.=" ORDER BY idpessoa";

$result=mysqli_query($conexao,$sql);
if (mysqli_affected_rows($conexao)>0) {
    echo "<table>
            <tr>
                <th>Id</th>
                <th>Pessoa</th>
                <th>Nome</th>
                <th>Nacionalidade</th>
                <th>Profissao</th>                
                <th>Sexo</th>
                <th>CPF</th>                
                <th>Endereço</th>                
                <th>CNPJ</th>                
                <th>Operação</th>
            </tr>";    
    while ($row=mysqli_fetch_row($result))
    {
        echo "<tr>";
        echo "<td>".$row[0]."</td>";
        echo "<td>".$row[1]."</td>";   
        echo "<td>".$row[2]."</td>";   
        echo "<td>".$row[3]."</td>";                     
        echo "<td>".$row[4]."</td>";         
        echo "<td>".$row[5]."</td>";
        echo "<td>".$row[6]."</td>";
        echo "<td>".$row[7]."</td>";
        echo "<td>".$row[8]."</td>";
        echo "<td> <a href=Vendedor.php?id=".$row[0]."&op=A"."><img src='https://img.icons8.com/wired/50/000000/edit.png'>".  "" ."<a href=Vendedor.php?id=".$row[0]. "&op=D". "><img src='https://img.icons8.com/wired/64/000000/delete-sign.png'>" . "</td>";
    }   echo "</tr>";          
    echo "</table>";               
}
mysqli_close($conexao);

?>
