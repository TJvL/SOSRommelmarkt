<?php
/**
 * Created by PhpStorm.
 * User: bram
 * Date: 3/12/2015
 * Time: 5:37 PM
 */


class SubventionController extends Controller
{
    function __construct()
    {
        parent::__constructor("subvention");
    }

    public function index_GET()
    {
        $this->render("index");
    }


}
