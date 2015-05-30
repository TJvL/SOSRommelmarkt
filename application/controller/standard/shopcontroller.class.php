<?php
class ShopController extends Controller
{
    public $shopProductRepository;

    public function __construct()
    {
        parent::__construct("shop");
    }

    public function index_GET()
    {
        $shopHomeVM = new ShopHomeViewModel();

        $shopProducts = new ArrayList("Product");
        $shopProducts->addAll($this->shopProductRepository->selectAll());

        $prices = $this->shopProductRepository->getPriceRanges();

        $shopHomeVM->shopProducts = $shopProducts;
        $shopHomeVM->prices = $prices;
        
        $this->render("index", $shopHomeVM);
    }

    public function detail_GET($id)
    {
        $prod = $this->shopProductRepository->selectById($id);

        $this->render("detail", $prod);
    }
}