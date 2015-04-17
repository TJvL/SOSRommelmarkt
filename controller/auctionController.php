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

    public function addProduct_GET()
    {
        $this->render('addProduct');
    }

    public function addProduct_POST()
    {
        if(isset($_POST['name']) && isset($_POST['description']) && isset($_POST['colorCode']) && isset($_POST['auctionId']))
        {
            AuctionProduct::insert($_POST['name'], $_POST['description'], "PLACEHOLDER", $_POST['colorCode']);
            
        }
        $this->redirectTo("SOSRommelmarkt/manage/editauction/");
    }
}
?>