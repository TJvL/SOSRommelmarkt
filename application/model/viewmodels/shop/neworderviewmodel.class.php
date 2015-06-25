<?php

class NewOrderViewModel
{
    public $orderProducts; //Array of OrderProduct model class instances.
    public $shippingAddress; //Address model class instance.
    public $billingAddress; //Address model class instance.
    public $deliveryMethod; //String.
    public $payMethod; //String.
}