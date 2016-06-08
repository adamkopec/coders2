<?php

namespace NumberSystems;
use NumberSystems\NumberSystem\Arabic;
use NumberSystems\NumberSystem\Roman;
use NumberSystems\NumberSystem\Urnfield;

/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 01.06.2016
 * Time: 13:06
 */
class ConverterTest extends \PHPUnit_Framework_TestCase
{
    public function testValueDoesNotGetChangedWhenUsingTheSameSystem()
    {
        $converter = new Converter();

        $arabic = $converter->convert(new Arabic(), new Arabic(), '1');
        $roman = $converter->convert(new Roman(), new Roman(), 'I');
        $urnfield = $converter->convert(new Urnfield(), new Urnfield(), '/');

        $this->assertEquals('1', $arabic);
        $this->assertEquals('I', $roman);
        $this->assertEquals('/', $urnfield);
    }

    public function testConvertsOneToOne() {
        $converter = new Converter();

        $this->assertEquals('I', $converter->convert(new Arabic(), new Roman(), '1'));
        $this->assertEquals('1', $converter->convert(new Roman(), new Arabic(), 'I'));
        $this->assertEquals('/', $converter->convert(new Roman(), new Urnfield(), 'I'));
        $this->assertEquals('/', $converter->convert(new Arabic(), new Urnfield(), '1'));
        $this->assertEquals('I', $converter->convert(new Urnfield(), new Roman(), '/'));
        $this->assertEquals('1', $converter->convert(new Urnfield(), new Arabic(), '/'));
    }
}
