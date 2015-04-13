<?php
//                Caution: in case when the PDF is sent to the browser, nothing else must be output by the script, neither before nor after (no HTML, not even a space or a carriage return). If you send something before, you will get the error message: "Some data has already been output, can't send PDF file". If you send something after, the document might not display.

require"/includes/pdfConvert/fpdf.php";
include"model/SubventionRequest.class.php";


class PDF extends FPDF
{

// Page header
    function Header()
    {
        $sv = SubventionRequest::fetchSubventionRequestById($_GET["id"]);
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


$sv = SubventionRequest::fetchSubventionRequestById($_GET["id"]);
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();


$pdf->SetFont('Arial','B',18);
$pdf->Cell(0,10,'Contactgegevens',0,1);

$pdf->SetFont('Arial','B',15);
$pdf->Cell(0,10,'Contactpersoon:',0,1);
$pdf->SetFont('Arial','I',15);
$pdf->Cell(0,6,$sv->contactperson,0,1);

$pdf->SetFont('Arial','B',15);
$pdf->Cell(0,10,'Adres:',0,1);
$pdf->SetFont('Arial','I',15);
$pdf->Cell(0,6,$sv->adress.'      '.$sv->postalcode.'     '.$sv->city,0,1);

$pdf->SetFont('Arial','B',15);
$pdf->Cell(0,10,'Telefoonnummer(s):',0,1);
$pdf->SetFont('Arial','I',15);
$pdf->Cell(0,6,$sv->phonenumber1 .'     '.$sv->phonenumber2,0,1);

$pdf->SetFont('Arial','B',15);
$pdf->Cell(0,10,'Fax:',0,1);
$pdf->SetFont('Arial','I',15);
$pdf->Cell(0,6,$sv->fax,0,1);

$pdf->SetFont('Arial','B',15);
$pdf->Cell(0,10,'E-mail:',0,1);
$pdf->SetFont('Arial','I',15);
$pdf->Cell(0,6,$sv->email,0,1);

$pdf->SetFont('Arial','B',15);
$pdf->Cell(0,10,'Kvk:',0,1);
$pdf->SetFont('Arial','I',15);
$pdf->Cell(0,6,$sv->kvk,0,1);

$pdf->SetFont('Arial','B',18);
$pdf->Cell(0,10,'Aanvraag',0,1);

$pdf->SetFont('Arial','B',15);
$pdf->Cell(0,10,'Toelichting:',0,1);
$pdf->SetFont('Arial','I',15);
$pdf->Cell(0,6,$sv->elucidation,0,1);

$pdf->SetFont('Arial','B',15);
$pdf->Cell(0,10,'Geplande activiteiten:',0,1);
$pdf->SetFont('Arial','I',15);
$pdf->Cell(0,6,$sv->activities,0,1);

$pdf->SetFont('Arial','B',15);
$pdf->Cell(0,10,'Gewenste resultaten',0,1);
$pdf->SetFont('Arial','I',15);
$pdf->Cell(0,6,$sv->results,0,1);



$pdf->Output();
?>
