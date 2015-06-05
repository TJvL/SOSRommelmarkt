<?php
abstract class Controller
{

    public $companyInformationRepository;
    public $partnerRepository;

	private $name; //The name of this controller, meaning the name that has to be used in the URL.
    protected $viewBag; //The view bag can be used to make certain values accessible in the view script. Do not use this to send complex data! Use the $model for that.

    /**
     * @param $name string      The name of this controller, meaning the name that has to be used in the URL.
     */
    protected function __construct($name)
	{
		$this->name = $name;
        $this->viewBag = array();
	}

    /**
     * This function includes everything needed to show the view specified by the $action parameter. The model parameter can contain all data retrieved in the controller.
     * In the view the parameters can be used as variables, as expected.
     *
     * @param $action string                    The name of the action (first part of the method's (that invoked this function) name. The view php script file needs to have exactly this name.
     * @param null $model mixed                 Can be used to pass a model object containing data to be displayed inside the view.
     */
    protected function render($action, $model = null)
    {
        if(empty($action))//If no action name was given, throw an exception.
        {
            throw new InvalidArgumentException("Action parameter must not be empty.");
        }

        $controller = $this->name;//Make the name of this controller available in the view.
        $viewBag = $this->viewBag;//Make the contents of the view bag array available in the view.

        $this->includeHeader($controller, $action);
        include("application/view/" . $this->name . "/" . $action . ".php");
        $this->includeFooter($controller, $action);
    }

    /**
     * @param $target string        The partial URL that needs to be redirected to. (example: "home/index" or "manage/product")
     */
    protected function redirectTo($target)
    {
        header('Location: ' . ROOT_PATH . $target);
        exit;
    }

    private function includeHeader($controller, $action)
    {
        $headerVM = new HeaderViewModel();

        $companyInformation = $this->companyInformationRepository->selectCurrent();
        $username = null;

        $user = AccountHelper::getUserInfo();
        if(isset($user))
        {
            $username = $user->username;
        }

        $headerVM->companyInformation = $companyInformation;
        $headerVM->username = $username;

        include("includes/header.inc.php");
    }

    private function includeFooter($controller, $action)
    {
        $footerVM = new FooterViewModel();

        $partners = new ArrayList("Partner");
        $partners->addAll($this->partnerRepository->selectAll());

        $footerVM->partners = $partners;

        include("includes/footer.inc.php");
    }
}
