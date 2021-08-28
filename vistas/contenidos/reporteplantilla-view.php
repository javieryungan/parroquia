<?php ob_start();
require('./vistas/fpdf/fpdf.php');
class PDF extends FPDF
    {
        protected $B = 0;
        protected $I = 0;
        protected $U = 0;
        protected $HREF = '';
        function Header()
        {
            $this->Image('./vistas/assets/avatars/logo3.png',20,10,75,25,'png');
            $this->Ln(1);
            $this->SetFont('Courier','',12);
            $this->SetDrawColor(64,64,255);
            $this->Line(130,10,130,30);
            $this->SetTextColor(64,64,255);
            $this->Cell(180,20,utf8_decode('Arquidiócesis de Quito'),0,0,'R');
            $this->SetDrawColor(200,0,0);
            //linea desvanecida
            $this->Line(20,38.5,190,38.5);
            $this->Line(25,38.51,190,38.51);
            $this->Line(35,38.53,190,38.53);
            $this->Line(40,38.54,190,38.54);
            $this->Line(45,38.55,190,38.55);
            $this->Line(50,38.56,190,38.56);
            $this->Line(55,38.57,190,38.57);
            $this->Line(60,38.58,190,38.58);
            $this->Line(65,38.59,190,38.59);
            $this->Line(70,38.60,190,38.60);
            $this->Line(75,38.61,190,38.61);
            $this->Line(80,38.62,190,38.62);
            $this->Line(85,38.63,190,38.63);
            $this->Line(90,38.64,190,38.64);
            $this->Line(95,38.65,190,38.65);
            $this->Line(100,38.66,190,38.66);
            $this->Line(105,38.67,190,38.67);
            $this->Line(110,38.68,190,38.68);
            $this->Line(115,38.69,190,38.69);
            $this->Line(120,38.70,190,38.70);
            $this->Line(125,38.71,190,38.71);
            $this->Line(130,38.72,190,38.72);
            $this->Line(135,38.73,190,38.73);
            $this->Line(140,38.74,190,38.74);
            $this->Ln(40);
        }
        
        function Footer()
        {
            $this->SetY(-22);
            $this->SetLineWidth(0.8);
            $this->SetDrawColor(200,0,0);
            $this->Line(20,275,190,275);
            $this->SetFont('Times','', 11);
            $this->SetTextColor(64,64,255);
            $this->Cell(0,10,utf8_decode('Dirección: Santa Rosa Oe7-126 y José de Armero'),0,0,'C');
            $this->Ln(5);
            $this->Cell(0,10,utf8_decode('Télefono: 022 520 378'),0,0,'C');
            $this->Ln(5);
            $this->Cell(0,10,utf8_decode('E-mail: miraflores@arquidiocesisdequito.com.ec'),0,0,'C');

        }

        function WriteHTML($html)
{
    // Intérprete de HTML
    $html = str_replace("\n",' ',$html);
    $a = preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
    foreach($a as $i=>$e)
    {
        if($i%2==0)
        {
            // Text
            if($this->HREF)
                $this->PutLink($this->HREF,$e);
            else
                $this->Write(8,$e);
        }
        else
        {
            // Etiqueta
            if($e[0]=='/')
                $this->CloseTag(strtoupper(substr($e,1)));
            else
            {
                // Extraer atributos
                $a2 = explode(' ',$e);
                $tag = strtoupper(array_shift($a2));
                $attr = array();
                foreach($a2 as $v)
                {
                    if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
                        $attr[strtoupper($a3[1])] = $a3[2];
                }
                $this->OpenTag($tag,$attr);
            }
        }
    }
}

function OpenTag($tag, $attr)
{
    // Etiqueta de apertura
    if($tag=='B' || $tag=='I' || $tag=='U')
        $this->SetStyle($tag,true);
    if($tag=='A')
        $this->HREF = $attr['HREF'];
    if($tag=='BR')
        $this->Ln(8);
}

function CloseTag($tag)
{
    // Etiqueta de cierre
    if($tag=='B' || $tag=='I' || $tag=='U')
        $this->SetStyle($tag,false);
    if($tag=='A')
        $this->HREF = '';
}
function SetStyle($tag, $enable)
{
    // Modificar estilo y escoger la fuente correspondiente
    $this->$tag += ($enable ? 1 : -1);
    $style = '';
    foreach(array('B', 'I', 'U') as $s)
    {
        if($this->$s>0)
            $style .= $s;
    }
    $this->SetFont('',$style);
}

function PutLink($URL, $txt)
{
    // Escribir un hiper-enlace
    $this->SetTextColor(0,0,255);
    $this->SetStyle('U',true);
    $this->Write(5,$txt,$URL);
    $this->SetStyle('U',false);
    $this->SetTextColor(0);
}

function Fecha(){
    date_default_timezone_set('America/Guayaquil');
    $dia=date('d');
    $mes=date('F');
    switch($mes)
        {   
            case "January":
            $mes = "Enero";
            break;

            case "mes":
            $mes = "Febrero";
            break;

            case "March":
            $mes = "Marzo";
            break;

            case "April":
            $mes = "Abril";
            break;

            case "June":
            $mes = "Junio";
            break;
            
            case "July":
            $mes = "Marzo";
            
            case "August":
            $mes = "Agosto";
            break;

            case "September":
            $mes = "Septiembre";
            break;

            case "October":
            $mes = "Octubre";
            break;

            case "November":
            $mes = "Noviembre";
            break;

            case "December":
            $mes = "Diciembre";
            break;

        }
    $año=date('Y');
    $this->SetFont('Times','',12);
    $this->Cell(180,0,utf8_decode('Quito, '.$dia.' de '.$mes.' del '.$año),0,0,'R');
}

}
ob_end_flush(); 
?>