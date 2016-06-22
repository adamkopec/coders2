<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 01.06.2016
 * Time: 13:26
 */

namespace NumberSystems\NumberSystem;

use NumberSystems\NumberSystem;

class Roman implements NumberSystem
{

    protected $romans = [
        'M' => 1000,
        'CM' => 900,
        'D' => 500,
        'CD' => 400,
        'C' => 100,
        'XC' => 90,
        'L' => 50,
        'XL' => 40,
        'X' => 10,
        'IX' => 9,
        'V' => 5,
        'IV' => 4,
        'I' => 1
    ];
    
    public function toArabic($value)
    {
        foreach ($value as $char) {
            if (!array_key_exists($char, $this->romans)) {
                throw new \InvalidArgumentException();
            }
        }
        $result = 0;
        foreach ($this->romans as $roman => $arabic) {

            while (strpos($value, $roman) === 0) {
                $result += $arabic;
                $value = substr($value, strlen($roman));
            }
        }
        return $result;
    }

    public function fromArabic($value)
    {
        $result = '';

        foreach ($this->romans as $roman => $arabic) {

            while ($value-$arabic >= 0) {
                $result .= $roman;
                $value -= $arabic;
            }
        }
        return $result;
    }

}