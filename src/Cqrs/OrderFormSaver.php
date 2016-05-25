<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 25.05.2016
 * Time: 14:43
 */

namespace Cqrs;


interface OrderFormSaver
{
    /**
     * @param OrderId $id
     * @param array $formData
     * @return void
     */
    public function updateOrder(OrderId $id, array $formData);
}