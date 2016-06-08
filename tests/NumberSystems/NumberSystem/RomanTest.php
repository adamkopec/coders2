<?php

namespace NumberSystems\NumberSystem;

class RomanTest extends \PHPUnit_Framework_TestCase
{
    public function testConvertsArabicNumberToRomanNumber()
    {
        $roman = new Roman();
        $this->assertEquals('I', $roman->fromArabic(1));
        $this->assertEquals('VI', $roman->fromArabic(6));
        $this->assertEquals('XII', $roman->fromArabic(12));
    }
    
    public function testConvertsRomanNumberToArabic()
    {
        $roman = new Roman();
        $this->assertSame(1, $roman->toArabic('I'));
        $this->assertSame(6, $roman->toArabic('VI'));
        $this->assertSame(12, $roman->toArabic('XII'));
    }
}
