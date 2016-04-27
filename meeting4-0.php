<?php

namespace LspProblem {

interface FooFactory
{
    /**
     * @param mixed $fromWhat
     * @return Foo
     */
    public function create($fromWhat);
}

class MyPreciousFooFactory implements FooFactory
{
    /**
     * @param Bar $fromWhat
     * @return FooSubclass
     */
    public function create($fromWhat)
    {
        // TODO: Implement create() method.
    }
}

class FactoryConsumer
{
    /** @var FooFactory */
    private $fooFactory;

    /**
     * FactoryConsumer constructor.
     * @param FooFactory $fooFactory
     */
    public function __construct(FooFactory $fooFactory)
    {
        $this->fooFactory = $fooFactory;
    }

    public function doSomething()
    {
        $myNotSoGenericContent = new \Exception();
        $foo = $this->fooFactory->create($myNotSoGenericContent);
    }
}

}

namespace LspSolution
{

interface FooFromBarFactory
{
    /**
     * @param Bar $fromWhat
     * @return Foo
     */
    public function create(Bar $fromWhat);
}

class SimpleValueCopyingFooFromBarFactory implements FooFromBarFactory
{
    public function create(Bar $fromWhat)
    {
        return new Foo($fromWhat->getBaz());
    }
}

}