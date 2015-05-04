<?php
class HomeController extends Controller
{
    function __construct()
    {
        parent::__constructor("home");
    }

    public function index_GET()
    {
        $this->viewbag['voorbeeld'] = "hello, greetings from the viewbag";
        $productList = new ArrayList("AuctionProduct");
        $productList->addAll(AuctionProductRepository::selectByCurrentAuction());
        $this->render("index", $productList);
    }
}
?>