<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 18.05.2016
 * Time: 13:38
 */

namespace Coders;


class Main
{
    public function doSomething()
    {
        $fireInterceptor = new FireInterceptor(
            HotLine::getInstance()
        );
    }
}