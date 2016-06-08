<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 01.06.2016
 * Time: 13:27
 */

namespace NumberSystems\NumberSystem;

use NumberSystems\NumberSystem;

class Urnfield implements NumberSystem
{
    public function toArabic($value)
    {
        $numberOfOnes = strlen(trim($value, '\\'));
        $numberOfFives = strlen(trim($value, '/'));
        $result = $numberOfFives * 5 + $numberOfOnes * 1;
        return $result;
    }

    public function fromArabic($value)
    {
        $numberOfOnes = $value % 5;
        $numberOfFives = floor($value / 5);
        $result = str_repeat('/', $numberOfOnes) . str_repeat('\\', $numberOfFives);
        return $result;
    }

}