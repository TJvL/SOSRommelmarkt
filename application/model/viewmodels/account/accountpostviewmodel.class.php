<?php

class AccountPostViewModel
{
    public $username;
    public $password;
    public $email;

    public $roleName; //Is not always set.

    public $newPassword; //For when you update the account from account/index
    public $id; //For when you update the account from account/index
}