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

    protected $romans = [null, 'I','II','III','IV','V','VI','VII','VIII','IX','X', 'XI', 'XII'];
    
    public function toArabic($value)
    {
        return array_flip(array_slice($this->romans, 1))[$value ] + 1;
    }

    public function fromArabic($value)
    {
        return $this->romans[$value];
    }

}