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
}