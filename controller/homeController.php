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
        $auctionProductList = new ArrayList("AuctionProduct");
        $auctionProductList->addAll(AuctionProduct::selectAll());
        $this->render("index", $auctionProductList);
    }
}
?>