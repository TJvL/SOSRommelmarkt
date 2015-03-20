<?php
class ShopController extends Controller
{
    function __construct()
    {
        parent::__constructor("shop");
    }

    public function index_GET()
    {
//        $productList = new ArrayList("Product");
//        $productList->addAll(ShopProduct::selectAll());

        $this->render("index", ShopProduct::selectAll());
    }

    public function detail_GET()
    {
        //Hier komt logic met de GET data
        $prod = Product::get($_GET['id']);

        $this->render("detail", $prod);
    }
}
?>