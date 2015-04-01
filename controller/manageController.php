<?php
class ManageController extends Controller
{
    function __construct()
    {
        parent::__constructor("manage");
    }

    public function index_GET()
    {
        $this->render("index");
    }

    public function subventions_GET()
    {
        $this->render("subventions");
    }


    public function subventions_POST()
    {
        //kijk welk type post er binnen komt
        switch ($_POST["post_type"]) {
            case "print":

//                Caution: in case when the PDF is sent to the browser, nothing else must be output by the script, neither before nor after (no HTML, not even a space or a carriage return). If you send something before, you will get the error message: "Some data has already been output, can't send PDF file". If you send something after, the document might not display.
            require"/includes/pdfConvert/fpdf.php";
                $pdf = new FPDF();
                $pdf->AddPage();
                $pdf->SetFont('Arial','B',16);
                $pdf->Cell(40,10,'Hello World!');
                $pdf->Output();
                break;
            case "delete":
                include_once "/model/SubventionRequest.class.php";
                SubventionRequest::deleteById($_POST["id"]);
                $this->render("subventions");
                break;
        }

        }










    public function productList_GET()
    {
        $this->render("manage_product");
    }

        public function instellingen_GET()
    {
        $this->render("instellingen");
    }


}
?>