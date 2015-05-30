<?php
class ModuleAPIController extends APIController
{
	public $moduleRepository;
	
	public function __construct()
	{
		parent::__construct("module");
	}
	
	public function create_POST()
	{
		
	}
	
	public function update_POST()
	{
		file_put_contents("debuglogfile.txt", "Updating...", FILE_APPEND | LOCK_EX);
		
		// Check if all the necessary data has been sent with the request.
		if (isset($_POST["id"]) && isset($_POST["heading"]) && isset($_POST["content"]) && isset($_POST["category"]) && isset($_POST["reference"]) && isset($_POST["reference_label"]))
		{
			// Get the module, set the data and update.
			$module						= $this->moduleRepository->selectById($_POST["id"]);
			$module->heading			= $_POST["heading"];
			$module->content			= $_POST["content"];
			$module->category			= $_POST["category"];
			$module->reference			= $_POST["reference"];
			$module->reference_label	= $_POST["reference_label"];
			
			file_put_contents("debuglogfile.txt", var_dump($module), FILE_APPEND | LOCK_EX);
			
			$this->moduleRepository->update($module);
		}
		else
		{
			throw new Exception("Resource was not found. Not all fields were provided.", 404);
		}
	}
	
	public function delete_POST()
	{
		// Check if all the necessary data has been sent with the request.
		if (isset($_POST["id"]))
		{
			// Delete the module.
			$this->moduleRepository->deleteById($_POST["id"]);
		}
		else
		{
            throw new Exception("Resource was not found. No id was provided", 404);
		}
	}
}