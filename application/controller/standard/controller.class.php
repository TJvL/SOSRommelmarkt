<?php
abstract class Controller
{
	private $name;
    protected $viewBag;
	
	protected function __construct($name)
	{
		$this->name = $name;
        $this->viewBag = array();
	}

    protected function render($action, $model = null)
    {
        if(empty($action))
        {
            throw new InvalidArgumentException("Action parameter must not be empty.");
        }
        
        $controller = $this->name;

        include("includes/header.inc.php");

        if(isset($model))
        {
            $this->renderStrongView($action, $model);
        }
        else
        {
            $this->renderView($action);
        }

        include("includes/footer.inc.php");
    }

    private function renderView($action)
    {
        $viewBag = $this->viewBag;
        include("application/view/" . $this->name . "/" . $action . ".php");
    }
    
    private function renderStrongView($action, $model)
    {
        $viewBag = $this->viewBag;
        include("application/view/" . $this->name . "/" . $action . ".php");
    }

    protected function redirectTo($target)
    {
        header('Location: ' . ROOT_PATH . $target);
        exit("Redirecting...");
    }
}
?>