<?php
class AuctionController extends Controller
{
    private $auctionProductRepository;

    public function __construct($auctionProductRepository)
    {
        $this->auctionProductRepository = $auctionProductRepository;

        parent::__construct("auction");
    }

    public function index_GET()
    {
        $productList = new ArrayList("Product");
        $productList->addAll($this->auctionProductRepository->selectByCurrentAuction());

        $this->render("index", $productList);
    }

    public function detail_GET($id)
    {
        //Hier komt logic met de GET data
        $prod = $this->auctionProductRepository->selectById($id);

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
            $auctionProduct = $this->auctionProductRepository->insert($_POST['name'], $_POST['description'], "Administrator", $_POST['colorCode']);
            $auctionProduct->addToAuction($_POST['auctionId']);
        }
        
        $this->redirectTo("/manage/auctionproduct/" . $auctionProduct->id);
    }
}