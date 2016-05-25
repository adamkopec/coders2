<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 25.05.2016
 * Time: 14:52
 */

namespace Cqrs;


interface OrderReadRepository
{
    /**
     * @param OrderId $id
     * @return Order|null
     */
    public function getById(OrderId $id);
}