<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 25.05.2016
 * Time: 15:12
 */

namespace Cqrs;


class OrderUpdatedEvent
{
    /** @var OrderId */
    private $orderId;

    /**
     * OrderUpdatedEvent constructor.
     * @param OrderId $orderId
     */
    public function __construct(OrderId $orderId)
    {
        $this->orderId = $orderId;
    }
}