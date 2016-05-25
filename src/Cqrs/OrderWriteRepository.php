<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 25.05.2016
 * Time: 15:06
 */

namespace Cqrs;


interface OrderWriteRepository
{
    /**
     * @param Order $order
     * @throws OrderPersistenceException
     * @return void
     */
    public function persist(Order $order);
}