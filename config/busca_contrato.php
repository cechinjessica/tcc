<?php
require 'conexao.php';
$sql = "SELECT p.nome, pp.nome, v.nome, c.valortotal, c.datacriacao FROM contrato c
inner join pessoa p on c.pessoa_idcomprador = p.idpessoa
inner join pessoa pp on c.pessoa_idvendedor = pp.idpessoa
inner join veiculo v on c.veiculo_idveiculo = v.idveiculo";

$idcontrato=$_GET['q']; //recupera o parâmetro passado na visualização
if ($idcontrato!='') {
    if ($idcontrato!='') {
        $sql.=" WHERE UPPER(idcontrato) LIKE UPPER('%$idcontrato%')";
    }
}
$sql.=" ORDER BY idcontrato ASC";

$result=mysqli_query($conexao,$sql);

if (mysqli_affected_rows($conexao)>0) {
    while ($row=mysqli_fetch_row($result))
    {
        echo "<div class='card' style='width:18rem;'>";
        echo "<div class='card-header'><h5>$row[2]</h5></div>";
        echo "<div class='card-body'><div class='card-text'><p>Comprador: $row[0]</br>";
        echo "Vendedor: $row[1] </p>";
        echo "R$$row[3]";
        echo "$row[4]";
        echo "</div></div></div>s";

    }
}
mysqli_close($conexao);

?>
