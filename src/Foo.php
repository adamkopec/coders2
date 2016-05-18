<?php

namespace Coders;

class Foo
{
    /** @var Bar */
    private $bar;

    /**
     * Foo constructor.
     * @param Bar $bar
     */
    public function __construct(Bar $bar)
    {
        $this->bar = $bar;
    }

    public function doSomething()
    {
        $bar = $this->bar;
        $everything = $bar->getEverything();
        
        foreach ($everything as $something) {
            $this->callMaciek($something);
        }
    }

    private function callMaciek($why)
    {
        throw new MaciekOnVacationException('sorry');
    }
}