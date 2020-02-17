<?php /* mi plantilla  */
require('fpdf/fpdf.php');
class PDF extends FPDF{

    function Header (){
        $this->AddLink();
        $this->Image('img/arduino.png',10,10,25,0,'','https://maximojunior.netlify.com/');
        $this->SetFont('Arial','B',18);
        /* el ancho de la hoja 160 */
        $this->Cell(80);
        /* Ancho,alto,texto,border,salto de linea,alineacion */
        $this->Cell(30,10,"Proyecto Arduino",0,1,'C');
        $this->SetFont('Arial','B',14);
        $this->Cell(0,10,"Control de Puertas",0,1,'C');
        $this->Ln(10);/*  10 lineas de salto*/
    }


    function Footer()
    {
        
        $this->SetY(-18);/* posicion actual del eje*/
        $this->SetFont('Arial','I',12);
        $this->AddLink();
        $this->Cell(5,10,'https://maximojunior.netlify.com',0,0,'L');
        $this->SetFont('Arial','I',10);
        $this->Cell(0,10,utf8_decode('Página ') . $this->PageNo() .' de {nb} ',0,0,'C');
        $this->AddLink();
        $this->Image('img/idat.png',160,260,25,35,'','https://maximojunior.netlify.com/');
        
              /* ancho auto,altura,numero de pagina actual nb-> total de paginas,
              border,salto de linea,Centrado */      
    }
}


 


