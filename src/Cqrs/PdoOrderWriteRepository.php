<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 25.05.2016
 * Time: 15:07
 */

namespace Cqrs;


class PdoOrderWriteRepository implements OrderWriteRepository
{
    private $cacheInvalidator;
    
    private $pdo;

    public function persist(Order $order)
    {
        $orderId = $order->getId();
        if ($this->orderExists($orderId)) {
            $this->update($order);
        } else {
            $this->insert($order);
        }
        
        $this->cacheInvalidator->invalidateTag('order' . $orderId);
    }
    
    private function orderExists(OrderId $orderId)
    {
        //SELECT 1 FROM order where id = ?
    }
    
    private function insert(Order $order)
    {
        $mappedData = $this->map($order);
        //INSERT INTO order ????
    }

    private function update(Order $order)
    {
        //UPDATE order SET ?????
    }
    
    private function map(Order $order)
    {
        return [
            'order_id' => $order->getId()->getValue(),
            'user_id' => $order->getUserId()->getValue(),
            'status' => $order->getStatus()
        ];
    }
}