<?php

	include 'plantilla-view.php';		
	$pdf = new PDF('P','mm','A4');
    $pdf->AddPage();
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Times','B',20);
    $pdf->Cell(0,0,(utf8_decode('Certificado de Matrimonio')),0,0,'C');
    $pdf->Ln(15);
    $pdf->Fecha();
    $pdf->SetFont('Times','', 11);
    $pdf->Ln(15);
    $pdf->SetX(75);
    $pdf->Cell(0,0,utf8_decode("Yo, el infrascrito certifico en legal forma, a peticion de parte interesada"),0,'R');
    $pdf->Ln(5);
    $pdf->SetX(25); 
    $pdf->MultiCell(170,10,utf8_decode('que en Tomo............... de partidas de este archivo parroquial, página ........... se halla inscrita una con los siguientes datos:'),0,'L');
    $pdf->SetFont('Times','', 11);
    $pdf->Ln(20);
    $pdf->SetXY(20,115);
    $pdf->MultiCell(60,10,utf8_decode('N° ..........................'),0,'L');
    $pdf->SetXY(45,140);
    $pdf->SetFont('Times','B',11);
    $pdf->Cell(0,0,'Con');
    $pdf->SetXY(20,145);
    $pdf->MultiCell(60,10,utf8_decode('.................................................................................................'),0,'L');

    //Columna derecha
    $pdf->SetFont('Times','',11);
    $pdf->SetXY(90,115);
    $pdf->MultiCell(100,10,utf8_decode(('El día .... del mes de .... del año ......
El la parroquia Santa María Madre de la Iglesia 
El ..............................presenció y bendijo ........  Missam el matrimonio que contrajo.
El Sr .......................... con la Srta .....................................  feligreses de la Parroquia Santa María de la Iglesia
Fueron testigos: .....................................................................')),0,'L');
    
    $pdf->SetXY(20,195);
    $pdf->MultiCell(180,10,utf8_decode('Lo certifica ...................'),0,'L');

    //firma
    $pdf->Ln(15);
    $pdf->SetX(20);
    $pdf->Cell(0,0,utf8_decode('Son datos filmente del original, al que me remito en caso necesario'),0,0,'L');
    $pdf->Ln(15);
    $pdf->SetFont('Times','B',11);
    $pdf->Cell(0,0,utf8_decode('Lo certifico'),0,0,'C');
    $pdf->Ln(25);
    $pdf->Cell(0,0,utf8_decode('(f.)............................................'),0,0,'C');
    $pdf->Ln(5);
    $pdf->Cell(0,0,utf8_decode('PARROCO'),0,0,'C');

    $pdf->Output('CertificadoMatrimonio.pdf','I');
?>