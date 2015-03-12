<?php
class ContactController extends Controller
{
    function __construct()
    {
        parent::__constructor("contact");
    }

    public function index_GET()
    {
        $this->render("index");
    }
}
?>