<?php

class SettingsAPIController extends APIController
{
    public $companyInformationRepository;
    public $visitinghoursRepository;

    public function __construct()
    {
        parent::__construct("settingsapi");
    }

    /**
     *{{Role=Administrator;}}
     */
    public function updatecompanyinformation_POST($companyinformation)
    {
        if (isset($companyinformation->id))
        {
            $this->companyInformationRepository->update($companyinformation);
            $this->respondOK();
        }
        else
        {
            throw new Exception("Not all required data was provided", 400);
        }
    }

    /**
     *{{Role=Administrator;}}
     */
    public function updatevisitinghours_POST($visitinghours)
    {
        if (isset($visitinghours->id))
        {
            $this->visitinghoursRepository->update($visitinghours);
            $this->respondOK();
        }
        else
        {
            throw new Exception("Not all required data was provided", 400);
        }
    }
    
    /**
     *{{Role=Administrator;}}
     */
    public function updatebackground_POST()
    {
    	if (isset($_FILES["image"]))
    	{
    		// Remove the current background image.
    		$result = glob("img/content/" . "background." . "*");
    		if ($result)
    			unlink($result[0]);
    		
    		// Set the new one.
    		$imageFileExtension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
    		move_uploaded_file($_FILES["image"]["tmp_name"], "img/content/background." . $imageFileExtension);
    		
    		$this->respondOK();
    	}
    	else
    	{
    		throw new Exception("Not all required data was provided", 400);
    	}
    }
}