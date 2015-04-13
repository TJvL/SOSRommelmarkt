<?php
class AuctionController extends Controller
{
    function __construct()
    {
        parent::__constructor("auction");
    }

    public function index_GET()
    {
        $productList = new ArrayList("Product");
        $productList->addAll(AuctionProduct::selectCurrentAuction());

        $this->render("index", $productList);
    }

    public function detail_GET()
    {
        //Hier komt logic met de GET data
        $prod = Product::get($_GET['id']);

        $this->render("detail", $prod);
    }
}
?>