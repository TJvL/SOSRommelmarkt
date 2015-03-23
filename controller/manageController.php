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

        //delete aanvraag
        //er kan een extra parameter meegegeven worden die gebruikt wordt in een case om te kijken wat er met het item moet gebeuren
        //bijvoorbeeld het archiveren van een item, etc kan allemaal heel makkelijk hierin worden uitgevoerd.
        include_once "/model/SubventionRequest.class.php";
        SubventionRequest::deleteById($_POST["id"]);
        $this->render("subventions");
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