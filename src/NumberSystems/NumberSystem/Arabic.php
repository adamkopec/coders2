<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 01.06.2016
 * Time: 13:26
 */

namespace NumberSystems\NumberSystem;

use NumberSystems\NumberSystem;

class Arabic implements NumberSystem
{
    public function toArabic($value)
    {
        return (int) $value;
    }

    public function fromArabic($value)
    {
        return (string) $value;
    }


}