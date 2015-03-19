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