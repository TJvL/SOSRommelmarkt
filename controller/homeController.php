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
        $this->renderView("index");
    }

    public function about_GET()
    {
        $this->renderView("about");
    }

    public function product_GET()
    {
        $this->renderView("product");
    }
}
?>