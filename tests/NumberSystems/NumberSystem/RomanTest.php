<?php

namespace NumberSystems\NumberSystem;

class RomanTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider romanNumbersProvider
     * @param string $romanNumber
     * @param int $arabicNumber
     */
    public function testConvertsArabicNumberToRomanNumber($romanNumber, $arabicNumber)
    {
        $roman = new Roman();
        $this->assertEquals($romanNumber, $roman->fromArabic($arabicNumber));
    }

    /**
     * @dataProvider romanNumbersProvider
     * @param string $romanNumber
     * @param int $arabicNumber
     */
    public function testConvertsRomanNumberToArabic($romanNumber, $arabicNumber)
    {
        $roman = new Roman();
        $this->assertSame($arabicNumber, $roman->toArabic($romanNumber));
    }

    public function romanNumbersProvider()
    {
        return [
            ['XXVI', 26],
            ['LXXVI', 76],
            ['DCLXVI', 666],
            ['I', 1],
            ['VI', 6],
            ['XII', 12]
        ];
    }

    /**
     * @dataProvider incorrectRomanNumbersProvider
     * @expectedException \InvalidArgumentException
     */
    public function testIfExceptionIsThrownWhenRomanNumberIsIncorrect($incorrectRomanNumber)
    {
        $roman = new Roman();
        $roman->toArabic($incorrectRomanNumber);
    }
    
    public function incorrectRomanNumbersProvider()
    {
        return [
            ['U mnie działa'],
            ['MIDI'],
            ['XXXX'],
            [''],
            ['12345'],
            ['#@#%$^&%^*&*('],
            [',,,'],
            ['II I']
        ];
    }

}
