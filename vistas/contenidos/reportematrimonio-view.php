<?php

    require_once "./controladores/certificado.controlador.php";
    $login = new certificadosControlador();
    $editarmisa = $login->CtrlEditarCertificadoMatrimonio();
    $data = json_encode($editarmisa);
    ob_start();

    include './vistas/contenidos/reporteplantilla-view.php';		
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
    $pdf->MultiCell(170,10,utf8_decode('que en Tomo '.$editarmisa['ce_tomo'].' de partidas de este archivo parroquial, página '.$editarmisa['ce_pagina'].' se halla inscrita una con los siguientes datos:'),0,'L');
    $pdf->SetFont('Times','', 11);
    $pdf->Ln(20);
    $pdf->SetXY(20,115);
    $pdf->MultiCell(60,10,utf8_decode('N°.'.$editarmisa['ce_numero']),0,'L');
    $pdf->SetXY(20,125);
    $pdf->MultiCell(60,10,utf8_decode($editarmisa['ce_observacion']),0,'L');
    $pdf->SetXY(45,155);
    $pdf->SetFont('Times','B',11);
    $pdf->Cell(0,0,'Con');
    $pdf->SetFont('Times','',11);
    $pdf->SetXY(20,165);
    $pdf->MultiCell(60,10,utf8_decode($editarmisa['ce_nota_marginal']),0,'L');

    //Columna derecha
    $pdf->SetFont('Times','',11);
    $pdf->SetXY(90,115);
    $pdf->MultiCell(100,10,utf8_decode(dateName('30/08/2021').
'El la parroquia Santa María Madre de la Iglesia 
El '.utf8_decode($editarmisa['ce_nombre_parroco']).'presenció y bendijo '.$editarmisa['ce_intro_extra'].' Missam el matrimonio que contrajo.
El Sr. '.utf8_decode($editarmisa['ce_nombre_padre']).' con la Srta. '.utf8_decode($editarmisa['ce_nombre_madre']).' feligreses de la Parroquia Santa María de la Iglesia
Fueron testigos: '.$editarmisa['ce_testigos_padrinos']),0,'L');
    
    $pdf->SetXY(20,195);
    $pdf->MultiCell(180,10,utf8_decode('Lo certifica '.$editarmisa['ce_certifica']),0,'L');

    //firma
    $pdf->Ln(15);
    $pdf->SetX(20);
    $pdf->Cell(0,0,utf8_decode('Son datos filmente del original, al que me remito en caso necesario'),0,0,'L');
    $pdf->Ln(15);
    $pdf->SetFont('Times','B',11);
    $pdf->Cell(0,0,utf8_decode('Lo certifico,'),0,0,'C');
    $pdf->Ln(25);
    $pdf->Cell(0,0,utf8_decode('(f.)............................................'),0,0,'C');
    $pdf->Ln(5);
    $pdf->Cell(0,0,utf8_decode('PARROCO'),0,0,'C');

    $pdf->Output('CertificadoMatrimonio.pdf','I');
    ob_end_flush();

    function dateName($date) {

        $result = "";
    
        $convert_date = strtotime($date);
        $month = date('F',$convert_date);
        $year = date('Y',$convert_date);
        $day = date('j',$convert_date);
        switch($month)
        {   
            case "January":
            $month = "Enero";
            break;
    
            case "mes":
            $month = "Febrero";
            break;
    
            case "March":
            $month = "Marzo";
            break;
    
            case "April":
            $month = "Abril";
            break;
    
            case "June":
            $month = "Junio";
            break;
            
            case "July":
            $month = "Marzo";
            
            case "August":
            $month = "Agosto";
            break;
    
            case "September":
            $month = "Septiembre";
            break;
    
            case "October":
            $month = "Octubre";
            break;
    
            case "November":
            $month = "Noviembre";
            break;
    
            case "December":
            $month = "Diciembre";
            break;
    
        }
    
        $result = 'El día '.$day . " del mes " . $month . " del año " . $year;
    
        return $result;
    }
?>