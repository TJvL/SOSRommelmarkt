<?php


class AccountAPIController extends APIController
{
    public $accountRepository;

    public function __construct()
    {
        parent::__construct("accountapi");
    }

    public function checkUsername_POST()
    {
        $username = $_POST["username"];
        $users = $this->accountRepository->selectAll();
        foreach($users as $user)
        {
            if($user->username === $username)
            {
                $this->respondWithJSON(false);
            }
        }
        $this->respondWithJSON(true);
    }

    public function checkEmail_POST()
    {
        $email = $_POST["email"];
        $users = $this->accountRepository->selectAll();
        foreach($users as $user)
        {
            if($user->email === $email)
            {
                $this->respondWithJSON(false);
            }
        }
        $this->respondWithJSON(true);
    }
}