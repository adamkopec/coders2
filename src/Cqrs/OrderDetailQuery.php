<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 25.05.2016
 * Time: 14:34
 */

namespace Cqrs;

interface OrderDetailQuery
{
    /**
     * @param OrderId $orderId
     * @return OrderDetailsViewModel
     */
    public function getDetails(OrderId $orderId);
}