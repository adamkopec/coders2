<?php

namespace NumberSystems\NumberSystem;

class UrnfieldTest extends \PHPUnit_Framework_TestCase
{
    public function testConvertsArabicNumberToUrnfieldNumber()
    {
        $urnfield = new Urnfield();
        $this->assertEquals('/', $urnfield->fromArabic(1));
        $this->assertEquals('/\\', $urnfield->fromArabic(6));
        $this->assertEquals('//\\\\', $urnfield->fromArabic(12));
    }
    
    public function testConvertsUrnfieldNumberToArabic()
    {
        $urnfield = new Urnfield();
        $this->assertSame(1, $urnfield->toArabic('/'));
        $this->assertSame(6, $urnfield->toArabic('/\\'));
        $this->assertSame(12, $urnfield->toArabic('//\\\\'));
    }
}
