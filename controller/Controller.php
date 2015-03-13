<?php
class Controller
{
	private $name;
    protected $viewbag;
	
	function __constructor($name)
	{
		$this->name = $name;
        $this->viewbag = array();
	}

    protected function render()
    {
        if(func_num_args() ==1)
        {
            $this->renderView(func_get_arg(0));
        }
        elseif(func_num_args() == 2)
        {
            $this->renderStrongView(func_get_arg(0), func_get_arg(1));
        }
        else
        {
            throw new BadFunctionCallException("Invalid argument count");
        }
    }

    private function renderView($action)
    {
        $viewbag = $this->viewbag;
        include("/view/" . $this->name . "/" . $action . ".php");
    }
    private function renderStrongView($action, $model)
    {
        $viewbag = $this->viewbag;
        include("/view/" . $this->name . "/" . $action . ".php");
    }

    protected function redirectTo($target)
    {
        header('Location: ' . ROOT_DIR . $target);
    }
}
?>