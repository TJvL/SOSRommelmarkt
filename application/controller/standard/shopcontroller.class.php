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
        $productList = new ArrayList("Product");
        $productList->addAll($this->shopProductRepository->selectAll());
        
        $this->render("index", $productList);
    }

    public function detail_GET()
    {
        $prod = $this->shopProductRepository->selectById($_GET['id']);

        $this->render("detail", $prod);
    }
}
?>