<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 25.05.2016
 * Time: 14:56
 */

namespace Cqrs;


class PdoOrderFactory
{
    
    public function createFromRecord(array $record)
    {
        $this->validateContents($record);
        
        $order = new Order(
            new OrderId($record['order_id']),
            new UserId($record['user_id'])
        );
        
        $rp = new \ReflectionProperty(Order::class, 'status');
        $rp->setAccessible(true);
        $rp->setValue($order, $record['status']);
        
        return $order;
    }
}