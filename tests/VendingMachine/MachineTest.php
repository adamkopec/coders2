<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 20.07.2016
 * Time: 14:37
 */

namespace VendingMachine;


class MachineTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param int $value
     * @dataProvider correctCoinValueProvider
     */
    public function testItShouldAcceptCoins($value)
    {
        $machine = new Machine();
        $machine->insertCoin(new Coin($value));
    }

    public function testCashReturn()
    {
        $machine = new Machine();
        $machine->insertCoin(new Coin(100));
        $machine->insertCoin(new Coin(5));

        $coins = $machine->returnCash();
        $this->assertEquals(2, count($coins));
        $this->assertContains(new Coin(5), $coins);
        $this->assertContains(new Coin(100), $coins);

    }

    /**
     * @return array
     */
    public function correctCoinValueProvider()
    {
        return [
            [5],
            [10],
            [25],
            [100]
        ];
    }
}