<?php

class NewsAPIController extends APIController
{
    public $newsRepository;

    public function __construct()
    {
        parent::__construct("newsapi");
    }

    /**
     *{{Role=Administrator;}}
     */
    public function delete_POST($news)
    {
        if(isset($news->id))
        {
            $this->newsRepository->deleteById($news->id);
            $this->respondOK();
        }
        else
        {
            throw new Exception("Resource not found.", 404);
        }
    }

    /**
     *{{Permission=Nieuws;}}
     */
    public function update_POST($news)
    {
        if(isset($news->id))
        {
            $news->expiration_date = date("Y-m-d H:i:s", strtotime($news->expiration_date));
            $this->newsRepository->update($news);
            $this->respondOK();
        }
        else
        {
            throw new Exception("Resource not found.", 404);
        }
    }

    /**
     *{{Permission=Nieuws;}}
     */
    public function add_POST($news)
    {
        if((isset($news->heading))&&(isset($news->content))&&(isset($news->expiration_date)))
        {
            $user = $_SESSION["user"];

            $news->publisher = $user->username;
            $news->expiration_date = date("Y-m-d H:i:s", strtotime($news->expiration_date));

            $this->newsRepository->insert($news);
            $this->respondOK();
        }
        else
        {
            throw new Exception("Not all required data was provided", 400);
        }
    }
}