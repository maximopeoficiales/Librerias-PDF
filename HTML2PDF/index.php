<?php
/* requerimientos */
require __DIR__.'/vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;
/*Recoger contenido de otro fichero */
if (isset($_POST['crear'])) {
    ob_start();
    require_once 'print_view.php';
    $html= ob_get_clean();/* obtengo el html y lo guardo */
    
    $pdf = new Html2Pdf('P','A4','es',true,'utf-8');
    $pdf -> writeHTML($html);
    $pdf->output();
        
}
?>
<form action="" method="POST">
    <input type="text" placeholder="Titulo" name="titulo">
    <input type="submit" placeholder="Crear PDF" name="crear">
</form>
