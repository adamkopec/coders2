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
        if (!is_numeric($value)) {
            throw new \InvalidArgumentException();
        }
        return (int) $value;
    }

    public function fromArabic($value)
    {
        if (!is_int($value) || $value <= 0) {
            throw new \InvalidArgumentException();
        }

        return (string) $value;
    }
}