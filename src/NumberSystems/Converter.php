<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 01.06.2016
 * Time: 13:06
 */

namespace NumberSystems;

use NumberSystems\NumberSystem\Arabic;
use NumberSystems\NumberSystem\Roman;

/**
 * arabic, arabski: 1,2,3,4..
 * roman, rzymski: I -> 1, V -> 5, X -> 10, L -> 50, C -> 100, D -> 500, M -> 1000
 * urnfield, prastary: / -> 1, \ -> 5, /// -> 3, /\ -> 6, //\\ -> 12
 */
class Converter
{
    public function convert(NumberSystem $from, NumberSystem $to, $value)
    {
        $arabicValue = $from->toArabic($value);
        return $to->fromArabic($arabicValue);
    }
}