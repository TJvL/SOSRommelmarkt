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