<?php

class OrderController extends Controller
{
    public $orderRepository;
    public $orderProductRepository;
    public $orderListRepository;
    public $addressRepository;
    public $deliveryMethodRepository;
    public $payMethodRepository;

    public function __construct()
    {
        parent::__construct("order");
    }

    public function index_GET()
    {
        if(array_key_exists("cart", $_SESSION))
    {
        if (isset($_SESSION["cart"]))
        {
            $cart = $_SESSION["cart"];
            $this->render("index", $cart);
            return;
        }
    }
        $this->render("index");
    }

    public function address_GET()
    {
        $validated = false;
        if(array_key_exists("newOrder", $_SESSION))
        {
            if (isset($_SESSION["newOrder"]))
            {
                $newOrderVM = $_SESSION["newOrder"];
                if(isset($newOrderVM->orderProducts))
                {
                    if(!empty($newOrderVM->orderProducts))
                    {
                        $validated = true;
                    }
                }
            }
        }

        if($validated)
        {
            $user = AccountHelper::getUserInfo();
            if (isset($user))
            {
                $addresses = $this->addressRepository->selectAllByAccountId($user->id);
                $this->render("address", $addresses);
                return;
            }
            else
            {
                $this->render("address");
                return;
            }
        }
        else
        {
            $this->redirectTo("/order/index");
        }
    }

    public function confirm_GET()
    {
        $validated = false;
        $newOrderVM = null;
        if(array_key_exists("newOrder", $_SESSION))
        {
            if (isset($_SESSION["newOrder"]))
            {
                $newOrderVM = $_SESSION["newOrder"];
                if(isset($newOrderVM->orderProducts))
                {
                    if(!empty($newOrderVM->orderProducts))
                    {
                        if(isset($newOrderVM->billingAddress))
                        {
                            $validated = true;
                        }
                    }
                }
            }
        }

        if($validated)
        {
            $orderConfirmVM  = new OrderConfirmViewModel();
            $orderConfirmVM->deliveryMethods = $this->deliveryMethodRepository->selectAll();
            $orderConfirmVM->payMethods = $this->payMethodRepository->selectAll();
            $orderConfirmVM->newOrder = $newOrderVM;

            $this->render("", $orderConfirmVM);
            return;
        }
        else
        {
            $this->redirectTo("/order/index");
        }
    }

    public function payment_GET()
    {
        $this->render("payment");
    }
}