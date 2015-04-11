<?php
//                Caution: in case when the PDF is sent to the browser, nothing else must be output by the script, neither before nor after (no HTML, not even a space or a carriage return). If you send something before, you will get the error message: "Some data has already been output, can't send PDF file". If you send something after, the document might not display.

require"/includes/pdfConvert/fpdf.php";
include"model/SubventionRequest.class.php";


class PDF extends FPDF
{

// Page header
    function Header()
    {
        $sv = SubventionRequest::fetchSubventionRequestById($_POST["id"]);
        // Logo
        //$this->Image("../../../logo2.png",10,6,30);
        // Arial bold 15
        $this->SetFont('Arial','B',18);
        // Move to the right
       $this->Cell(50);
        // Title
        $this->Cell(100,10,'Subsidie aanvraag: '.$sv->firm,1,0,'C');
        // Line break
        $this->Ln(20);
    }

// Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
    }
}




$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
for($i=1;$i<=40;$i++)
    $pdf->Cell(0,10,'Printing line number '.$i,0,1);
$pdf->Output();
?>
