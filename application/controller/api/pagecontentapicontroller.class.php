<?php

class PageContentAPIController extends APIController
{
    public $moduleRepository;
    public $companyInformationRepository;
    public $visitinghoursRepository;

    public function __construct()
    {
        parent::__construct("pagecontentapi");
    }

    /**
     *{{Role=Administrator;}}
     */
    public function deletemodule_POST($module)
    {
        if(isset($module->id))
        {
            $this->moduleRepository->deleteById($module->id);
            $this->respondOK();
        }
        else
        {
            throw new Exception("Resource not found.", 404);
        }
    }

    /**
     *{{Permission=Tekst;}}
     */
    public function updatemodule_POST($module)
    {
        if(isset($module->id))
        {
            $this->moduleRepository->update($module);
            $this->respondOK();
        }
        else
        {
            throw new Exception("Resource not found.", 404);
        }
    }

    /**
     *{{Permission=Tekst;}}
     */
    public function addmodule_POST($module)
    {

        if((isset($module->heading))&&(isset($module->content))&&(isset($module->category)))
        {
            if($module->category == "home"){
                if((isset($module->reference))&&(isset($module->reference_label))){

                }
                else{
                    throw new Exception("Not all required data was provided", 400);
                }
            }
            $this->moduleRepository->insert($module);
            $this->respondOK();
        }
        else
        {
            throw new Exception("Not all required data was provided", 400);
        }
    }
}