<?php
class AuctionController extends Controller
{
    public $auctionProductRepository;
    public $auctionRepository;

    public function __construct()
    {
        parent::__construct("auction");
    }

    public function index_GET()
    {
        $auctionHomeVM = new AuctionHomeViewModel();

        $auctionProducts = new ArrayList("Product");
        $auctionProducts->addAll($this->auctionProductRepository->selectByCurrentAuction());

        $auctionDates = $this->auctionRepository->getCurrentAuctionDates();

        $auctionHomeVM->auctionProducts = $auctionProducts;
        $auctionHomeVM->auctionDates = $auctionDates;

        $this->render("index", $auctionHomeVM);
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
        
        $this->redirectTo("/manage/auctionproductview/" . $auctionProduct->id);
    }
}