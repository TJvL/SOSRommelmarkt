<?php
class aboutUsController extends Controller
{
    function __construct()
    {
        parent::__constructor("aboutUs");
    }

    public function index_GET()
    {
        $this->render("index");
    }
}
?>