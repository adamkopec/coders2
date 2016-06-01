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
    
    
    protected $romans = [null, 'I','II','III','IV','V','VI','VII','VIII','IX','X', 'XI'];

    public function convert(NumberSystem $from, NumberSystem $to, $value)
    {
        $fromClass = get_class($from);
        $toClass = get_class($to);
        if ($fromClass == $toClass) {
            return $value;
        }

        if ($fromClass == Arabic::class && $toClass == Roman::class){
            return $this->romans[(int) $value];
        }

    }
}