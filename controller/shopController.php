<?php
class ShopController extends Controller
{
    function __construct()
    {
        parent::__constructor("shop");
    }

    public function index_GET()
    {
        $this->render("index");
    }

    public function detail_GET()
    {
        //Hier komt logic met de GET data
        $prod = Product::get($_GET['id']);

        $this->render("detail", $prod);
    }
}
?>