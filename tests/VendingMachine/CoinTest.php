<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 20.07.2016
 * Time: 14:18
 */

namespace VendingMachine;

class CoinTest extends \PHPUnit_Framework_TestCase
{
    public function testAcceptCoins() 
    {
        $coin = new Coin(100);
        $this->assertGreaterThan(0,$coin->getValue());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testItShouldRejectFloats()
    {
        new Coin(0.5);
    }
}