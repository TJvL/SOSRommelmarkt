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
	
	public function renderView($action)
	{
        $viewbag = $this->viewbag;
		include("/view/" . $this->name. "/" . $action . ".php");
	}
}
?>