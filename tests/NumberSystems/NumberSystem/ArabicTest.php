<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 15.06.2016
 * Time: 14:11
 */

namespace NumberSystems\NumberSystem;


class ArabicTest extends \PHPUnit_Framework_TestCase
{

    public function testItConvertsToArabic()
    {
        $arabic = new Arabic();
        $this->assertEquals(1, $arabic->toArabic('1'));
    }

    public function testItConvertsFromArabic()
    {
        $arabic = new Arabic();
        $this->assertEquals('1', $arabic->fromArabic(1));
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testItThrowsExceptionOnInvalidArabicString()
    {
        $arabic = new Arabic();
        $arabic->toArabic('test');
    }

    /**
     * @expectedException \InvalidArgumentException
     * @dataProvider invalidNumberProvider
     * @param int $invalidNumber
     */
    public function testItThrowsExceptionOnInvalidInteger($invalidNumber)
    {
        $arabic = new Arabic();
        $arabic->fromArabic($invalidNumber);
    }

    public function invalidNumberProvider() {
        return [
            [-1],
            [0],
            [1.3],
            [0.25]
        ];
    }
}