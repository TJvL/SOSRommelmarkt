<?php

class SubventionController extends Controller
{
    public $subventionRequestRepository;
    public $subventionsContentRepository;

    public function __construct()
    {
        parent::__construct("subvention");
    }

    public function index_GET()
    {
        $subventionsContent = $this->subventionsContentRepository->selectCurrent();

        $this->render("index", $subventionsContent);
    }

    public function landing_GET()
    {
        $this->render("landing");
    }

    public function successpage_GET()
    {
        $this->render("successpage");
    }
}
