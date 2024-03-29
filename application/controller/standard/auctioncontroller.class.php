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
        $productList->addAll(AuctionProductRepository::selectByCurrentAuction());

        $this->render("index", $productList);
    }

    public function detail_GET()
    {
        //Hier komt logic met de GET data
        $prod = Product::get($_GET['id']);

        $this->render("detail", $prod);
    }

    public function addProduct_GET()
    {
        $this->render('addProduct');
    }

    public function addProduct_POST()
    {
    	$auctionProduct = null;
        if (isset($_POST['name']) && isset($_POST['description']) && isset($_POST['colorCode']) && isset($_POST['auctionId']))
        {
            $auctionProduct = AuctionProductRepository::insert($_POST['name'], $_POST['description'], "Administrator", $_POST['colorCode']);
            $auctionProduct->addToAuction($_POST['auctionId']);
        }
        
        $this->redirectTo("/manage/auctionproduct/" . $auctionProduct->id);
    }
}
?>