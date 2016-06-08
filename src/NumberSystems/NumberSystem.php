<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 01.06.2016
 * Time: 13:25
 */

namespace NumberSystems;


interface NumberSystem
{
    /**
     * @param string $value
     * @return int
     */
    public function toArabic($value);

    /**
     * @param int $value
     * @return string
     */
    public function fromArabic($value); 

}