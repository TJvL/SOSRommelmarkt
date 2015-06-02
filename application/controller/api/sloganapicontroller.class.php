<?php

class SloganAPIController extends APIController
{
    public $sloganRepository;

    public function __construct()
    {
        parent::__construct("sloganapi");
    }

    /**
     *{{Role=Administrator;}}
     */
    public function delete_POST($slogan)
    {
        if(isset($slogan->id))
        {
            $this->sloganRepository->deleteById($slogan->id);
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
    public function update_POST($slogan)
    {
        if(isset($slogan->id))
        {
            $this->sloganRepository->update($slogan);
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
    public function add_POST($slogan)
    {
        if(isset($slogan->slogan))
        {
            $this->sloganRepository->insert($slogan);
            $this->respondOK();
        }
        else
        {
            throw new Exception("Not all required data was provided", 400);
        }
    }
}