<?php
class Controller
{
	private $name;
    protected $viewBag;
	
	function __constructor($name)
	{
		$this->name = $name;
        $this->viewbag = array();
	}

    protected function render($action, $model = null)
    {
        if(empty($action))
        {
            throw new InvalidArgumentException("Action parameter must not be empty.");
        }

        $controller = $this->name;
        $viewBag = $this->viewBag;

        if ($this->name == "manage")
        {
            include("includes/manageheader.inc.php");
        }
        else
        {
            include("includes/header.inc.php");
        }

        if(isset($model))
        {
            $this->renderStrongView($action, $model, $viewBag);
        }
        else
        {
            $this->renderView($action, $viewBag);
        }
        
        if ($this->name == "manage" || $this->name == "auction")
        {
        	include("includes/managefooter.inc.php");
        }
        else
        {
        	include("includes/footer.inc.php");
        }
    }

    private function renderView($action, $viewBag)
    {
        $viewbag = $this->viewbag;
        include("application/view/" . $this->name . "/" . $action . ".php");
    }
    
    private function renderStrongView($action, $model, $viewBag)
    {
        $viewbag = $this->viewbag;
        include("application/view/" . $this->name . "/" . $action . ".php");
    }

    protected function redirectTo($target)
    {
        header('Location: ' . ROOT_DIR . $target);
    }
}
?>