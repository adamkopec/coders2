<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 18.05.2016
 * Time: 13:45
 */

namespace Coders;

class OrderModel
{
    public function save(Order $order) {
        $order->save();
    }

}