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
        $this->render("index");
    }

    public function strong_GET()
    {
        $prodlist = new ArrayList("Product");
        $prodlist->addAll(Product::fetchAllProducts());

        $this->render("strong", $prodlist);
    }
}
?>