<?php 

//referenciar o dompdf com namespace
use Dompdf\Dompdf;

// include autoloader(para o domphp)
require_once 'dompdf/autoload.inc.php';

//Criar a instancia do DOMPDF
$pdf = new DOMPDF();

//Carregar o htlm
$pdf->load_html('
<h1>Testando gerar pdf</h1>
<table style="border:2px solid black;"> <th>Col1</th><th>Col2</th>
		<td>Hello</td><td>World</td>
</table>
<p><b>Lorem ipsum</b> dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. At auctor urna nunc id cursus metus aliquam eleifend mi. In est ante in nibh mauris cursus mattis. Justo eget magna fermentum iaculis eu non diam. Integer enim neque volutpat ac tincidunt vitae. Bibendum neque egestas congue quisque egestas diam in. Nisl nunc mi ipsum faucibus vitae aliquet nec ullamcorper. Sodales ut etiam sit amet nisl purus. Nisi est sit amet facilisis magna. Libero id faucibus nisl tincidunt eget nullam non nisi est. Augue neque gravida in fermentum et.</p>

<p>Hendrerit dolor magna eget est lorem. Interdum velit laoreet id donec ultrices. Nisi scelerisque eu ultrices vitae auctor eu augue ut. Ut consequat semper viverra nam libero justo laoreet sit. Et netus et malesuada fames ac. Cursus metus aliquam eleifend mi. Integer enim neque volutpat ac tincidunt vitae semper. Lorem mollis aliquam ut porttitor leo a diam. Lectus mauris ultrices eros in cursus turpis. Aliquet nibh praesent tristique magna sit amet. Condimentum mattis pellentesque id nibh tortor id. Nibh praesent tristique magna sit amet purus gravida quis blandit.</p>
'); 

//Renderizar o html
$pdf->render();

//Exibir a página, o nome do arquivo caso seja baixado
$pdf->stream("Contrato.pdf",array("Attachment"=> false));//true para baixar false para não baixar

?>
