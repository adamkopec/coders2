<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 25.05.2016
 * Time: 14:39
 */

namespace Cqrs;


interface OrderFormBuilder
{

    public function buildForm(OrderId $id);
}