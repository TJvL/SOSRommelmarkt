<?php
/**
 * Model klasse voor de subsidieaanvraag.
 */
class SubventionRequest
{
    //alle waardes die we straks door moeten krijgen van het formulier, het kan zijn dat er lege waardes bij zitten, ligt eraan hoe de w
    public $id;
    public $contactperson;
    public $firm;
    public $kvk;
    public $address;
    public $postalcode;
    public $city;
    public $phonenumber1;
    public $phonenumber2;
    public $fax;
    public $email;
    public $elucidation;
    public $activities;
    public $results;
    public $status;
    
    public function getAttachedFilepaths()
    {
    	$result = glob("files/subventions/" . $this->id . "/" . "*");
    	if ($result)
    	{
    		$paths = array();
    		
    		foreach ($result as $key => $path)
    			$paths[$key] = ROOT_PATH . "/" . $path;
    		
    		return $paths;
    	}
    	else
    		return array();
    }
    
    public function getAttachedFilenames()
    {
    	$result = glob("files/subventions/" . $this->id . "/" . "*");
    	if ($result)
    	{
    		$filenames = array();
    
    		foreach ($result as $key => $filename)
    		{
    			
    			$filenames[$key] = substr($filename, strripos($filename, "/") + 1);
    		}
    
    		return $filenames;
    	}
    	else
    		return array();
    }
}

?>