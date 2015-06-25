<?php

class OrderPlacementAPIController extends APIController
{
    public $orderRepository;
    public $orderProductRepository;
    public $orderListRepository;

    public function __construct()
    {
        parent::__construct("orderplacementapi");
    }

    /**
     * The post model for this action is: NewOrderViewModel
     *
     * @param $newOrder NewOrderViewModel           Must be an instance of this class with $orderProducts set and not empty.
     * @throws Exception                            When an empty collection or null is provided as parameter.
     */
    public function startnew_POST($newOrder)
    {
        if((isset($newOrder->orderProducts))&&(!empty($newOrder->orderProducts)))
        {
            $_SESSION["newOrder"] = $newOrder;
            $this->respondOK();
        }
        else
        {
            throw new Exception("Not all required data was provided.", 400);
        }
    }

    public function addaddresses_POST($newOrder)
    {
        if((isset($newOrder->shippingAddress))&&($newOrder->billingAddress))
        {
            $valid = false;
            if(array_key_exists("newOrder", $_SESSION))
            {
                if (isset($_SESSION["newOrder"]))
                {
                    $valid = true;
                }
            }

            if($valid)
            {
                $_SESSION["newOrder"]->shippingAddress = $newOrder->shippingAddress;
                $_SESSION["newOrder"]->billingAddress = $newOrder->billingAddress;
                $this->respondOK();
            }
            else
            {
                throw new Exception("There was no order to append the addresses to.", 500);
            }
        }
        else
        {
            throw new Exception("Not all required data was provided.", 400);
        }
    }

    public function confirmorder_POST($newOrder)
    {
        if((isset($newOrder->deliveryMethod))&&($newOrder->payMethod))
        {
            $valid = false;
            if(array_key_exists("newOrder", $_SESSION))
            {
                if (isset($_SESSION["newOrder"]))
                {
                    $valid = true;
                }
            }

            if($valid)
            {
                $order = new Order();

                $order->shippingAddressId = $newOrder->shippingAddress->id;
                $order->billingAddressId = $newOrder->billingAddress->id;
                $order->deliveryMethod = $newOrder->deliveryMethod;
                $order->payMethod = $newOrder->payMethod;

                $orderId = $this->orderRepository->insert($order);

                $orderProductIds = array();
                foreach($newOrder->orderProducts as $orderProduct)
                {
                    $orderProductIds[] = $this->orderProductRepository->insert($orderProduct);
                }

                foreach($orderProductIds as $orderProductId)
                {
                    $orderList = new OrderList();
                    $orderList->order_id = $orderId;
                    $orderList->orderProduct_id = $orderProductId;
                    $this->orderListRepository->insert($orderList);
                }

                $this->respondOK();
            }
            else
            {
                throw new Exception("There was no order to append the addresses to.", 500);
            }
        }
        else
        {
            throw new Exception("Not all required data was provided.", 400);
        }
    }
}