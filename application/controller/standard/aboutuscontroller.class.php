<?php
class aboutUsController extends Controller
{
    function __construct()
    {
        parent::__constructor("aboutus");
    }

    public function index_GET()
    {
        $this->render("index");
    }
}
?>