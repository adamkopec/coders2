<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 25.05.2016
 * Time: 15:20
 */

namespace Cqrs;

class FrameworkOrderFormBuilder implements OrderFormBuilder
{
    public function buildForm(OrderId $id)
    {
        $form = new FrameworkForm('stefan');

        $form->setDefault('orderId', $id->getValue());

        return $form;
    }
}