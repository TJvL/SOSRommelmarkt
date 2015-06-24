<?php

class AddressAPIController extends APIController
{
    public $addressRepository;

    public function __construct()
    {
        parent::__construct("addressapi");
    }

    public function addself_POST($address)
    {
        $user = AccountHelper::getUserInfo();
        if(isset($user))
        {
            $address->accountId = $user->id;
            $this->addressRepository->insert($address);
            $this->respondOK();
        }
        else
        {
            throw new Exception("Not authorized for this action.", 401);
        }
    }

    public function deleteself_POST($address)
    {
        $user = AccountHelper::getUserInfo();
        if(isset($user))
        {
            $this->addressRepository->deleteById($address->id);
            $this->respondOK();
        }
        else
        {
            throw new Exception("Not authorized for this action.", 401);
        }
    }
}