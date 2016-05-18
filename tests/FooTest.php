<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 18.05.2016
 * Time: 13:08
 */

namespace Coders;


class FooTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \Coders\MaciekOnVacationException
     */
    public function testSomething()
    {
        $barMock = $this->getMockBuilder(Bar::class)
            ->getMock();

        $barMock->expects($this->once())
            ->method('getEverything')
            ->willReturn([0]);

        $foo = new Foo($barMock);
        $foo->doSomething();
    }

    public function testItShouldNotThrowAnythingIfBarReturnsEmptySet()
    {
        try {
            $barMock = $this->getMockBuilder(Bar::class)
                ->getMock();

            $barMock->expects($this->once())
                ->method('getEverything')
                ->willReturn([]);

            $foo = new Foo($barMock);
            $foo->doSomething();
        } catch (\Exception $e) {
            $this->fail('This should not happen');
        }
    }
}