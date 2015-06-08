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
        $prod = $this->auctionProductRepository->selectById($id);

        $this->render("detail", $prod);
    }
}