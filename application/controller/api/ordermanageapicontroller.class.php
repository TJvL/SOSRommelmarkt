<?php

class OrderManageAPIController extends APIController
{
    public $orderRepository;
    public $orderProductRepository;
    public $orderListRepository;

    public function __construct()
    {
        parent::__construct("ordermanageapi");
    }

    /**
     *{{Permission=Order;}}
     */
    public function update_POST($orderVM)
    {
        if(isset($orderVM->id))
        {
            $order = new Order();
            $order->id = $orderVM->id;
            $order->isPayed = $orderVM->isPayed;
            $order->status = $orderVM->status;
            $order->deliveryMethod = $orderVM->deliveryMethod;
            $order->payMethod = $orderVM->payMethod;

            $this->orderRepository->updateStatus($order);
            $this->orderRepository->updatePayMethod($order);
            $this->orderRepository->updateDeliveryMethod($order);
            $this->orderRepository->updateIsPayed($order);
        }
        else
        {
            throw new Exception("Resource not found.", 404);
        }
    }

    /**
     *{{Role=Administrator;}}
     */
    public function delete_POST($orderVM)
    {
        if(isset($orderVM->id))
        {
            $orderId = $orderVM->id;

            $orderList = $this->orderListRepository->selectByOrderId($orderId);
            $this->orderListRepository->deleteByOrderId($orderId);
            foreach($orderList as $item)
            {
                $this->orderProductRepository->deleteById($item->orderProduct_id);
            }

            $this->orderRepository->deleteById($orderId);
            $this->respondOK();
        }
        else
        {
            throw new Exception("Resource not found.", 404);
        }
    }
}