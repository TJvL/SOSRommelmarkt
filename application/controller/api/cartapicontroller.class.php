<?php

class CartAPIController extends APIController
{
    public function __construct()
    {
        parent::__construct("cartapi");
    }

    public function get_GET()
    {
        $cartExists = false;
        if(array_key_exists("cart", $_SESSION))
        {
            if (isset($_SESSION["cart"]))
            {
                $cartExists = true;
            }
        }

        $cart = null;
        if($cartExists)
        {
            $cart = $_SESSION["cart"];
        }
        else
        {
            $cart = new CartViewModel();
            $_SESSION["cart"] = $cart;
        }

        $this->respondWithJSON($cart);
    }

    public function additem_POST($shopProduct)
    {
        if(isset($shopProduct))
        {
            $cartExists = false;
            if(array_key_exists("cart", $_SESSION))
            {
                if (isset($_SESSION["cart"]))
                {
                    $cartExists = true;
                }
            }
            if($cartExists)
            {
                $_SESSION["cart"]->cartContent[$shopProduct->id] = $shopProduct;
                $this->respondOK();
            }
            else
            {
                $_SESSION["cart"] = new CartViewModel();
                $_SESSION["cart"]->cartContent[$shopProduct->id] = $shopProduct;
                $this->respondOK();
            }
        }
        else
        {
            throw new Exception("Not all required data was provided.", 400);
        }
    }

    public function empty_POST()
    {
        unset($_SESSION["cart"]);
        $_SESSION["cart"] = new CartViewModel();
    }

    public function deleteitem_POST($shopProduct)
    {
        if(isset($shopProduct))
        {
            $cartExists = false;
            if(array_key_exists("cart", $_SESSION))
            {
                if (isset($_SESSION["cart"]))
                {
                    $cartExists = true;
                }
            }
            if($cartExists)
            {
                unset($_SESSION["cart"]->cartContent[$shopProduct->id]);
            }
            else
            {
                throw new Exception("No cart was found to delete item from.", 400);
            }
        }
        else
        {
            throw new Exception("Not all required data was provided.", 400);
        }
    }
}