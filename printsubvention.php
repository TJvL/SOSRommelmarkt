<?php
//                Caution: in case when the PDF is sent to the browser, nothing else must be output by the script, neither before nor after (no HTML, not even a space or a carriage return). If you send something before, you will get the error message: "Some data has already been output, can't send PDF file". If you send something after, the document might not display.
require"/includes/pdfConvert/fpdf.php";
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Hello World!');
$pdf->Output();
