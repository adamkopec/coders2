<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 20.07.2016
 * Time: 14:18
 */

namespace VendingMachine;

class Coin
{
    /** @var int */
    private $value;

    private $legalValues = [5, 10, 25, 100];

    /**
     * Coins constructor.
     * @param int $value
     */
    public function __construct($value)
    {
        if(!in_array($value, $this->legalValues, true)) {
            throw new \InvalidArgumentException();
        }

        $this->value = $value;
    }

    /**
     * @return float
     */
    public function getValue()
    {
        return $this->value;
    }
}