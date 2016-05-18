<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 18.05.2016
 * Time: 13:32
 */

namespace Coders;

class HotLine
{
    private static $instance;

    private function __construct() {}

    private function __clone() {}

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function callMaciek()
    {
        
    }
}