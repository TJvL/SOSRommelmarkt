<?php
class ShopController extends Controller
{
    function __construct()
    {
        parent::__constructor("shop");
    }

    public function index_GET()
    {
        $productList = new ArrayList("Product");
        $productList->addAll(ShopProductRepository::selectAll());
        
        $this->render("index", $productList);
    }

    public function detail_GET()
    {
        $prod = ShopProductRepository::selectById($_GET['id']);

        $this->render("detail", $prod);
    }
}
?>