<?php

//OCP - open-closed principle

//problem

class Customer {
    /** @var string */
    private $name;
    /** @var int */
    private $awesomenessLevel;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getAwesomenessLevel()
    {
        return $this->awesomenessLevel;
    }

    /**
     * @param int $awesomenessLevel
     */
    public function setAwesomenessLevel($awesomenessLevel)
    {
        $this->awesomenessLevel = $awesomenessLevel;
    }
}

class CustomerValidator {

    /**
     * @param Customer $c
     * @return float
     */
    public function validateName(Customer $c) {}

    /**
     * @param Customer $c
     * @return \Exception
     */
    public function validateSomethingElse(Customer $c) {}

    /**
     * @param Customer $c
     * @return ItsNotMyFaultException
     */
    public function validateThatCrapNikielWanted(Customer $c) {}
}

class CustomerAdder {

    /** @var CustomerValidator */
    private $validator;

    /**
     * CustomerAdder constructor.
     * @param CustomerValidator $validator
     */
    public function __construct(CustomerValidator $validator)
    {
        $this->validator = $validator;
    }

    public function register(Customer $c) {
        if ($this->validator->validateName($c)
            && $this->validator->validateSomethingElse($c)
            && $this->validator->validateThatCrapNikielWanted($c)
        ) {
            $this->doTheSadThings();
        }
    }
}

//solution

interface BetterCustomerValidator {

    /**
     * @param Customer $c
     * @return bool
     */
    public function isValid(Customer $c);
}

class NameValidator implements BetterCustomerValidator {

    public function isValid(Customer $c)
    {
        return $c->getName() == 'Czesław';
    }
}

class SomethingElseValidator implements BetterCustomerValidator {
    public function isValid(Customer $c)
    {
        return $c->getAwesomenessLevel() < 17;
    }
}

class AggregateCustomerValidator implements BetterCustomerValidator {
    /** @var BetterCustomerValidator[] */
    private $validators;

    /**
     * AggregateCustomerValidator constructor.
     * @param BetterCustomerValidator[] $validators
     */
    public function __construct(array $validators)
    {
        $this->validators = $validators;
    }

    public function isValid(Customer $c)
    {
        foreach ($this->validators as $validator) {
            if (!$validator->isValid($c)) {
                return false;
            }
        }

        return true;
    }
}

class BetterCustomerAdder {

    /** @var BetterCustomerValidator */
    private $validator;

    /**
     * CustomerAdder constructor.
     * @param BetterCustomerValidator $validator
     */
    public function __construct(BetterCustomerValidator $validator)
    {
        $this->validator = $validator;
    }

    public function register(Customer $c)
    {
        if ($this->validator->isValid($c)) {
            $this->doTheSadThings();
        }
    }
}

//problem 2

class File {
    /** @var int */
    public $totalBytes;
    /** @var int */
    public $bytesUploadedSoFar;
}

class Progress
{
    /** @var File */
    private $file;

    /**
     * Progress constructor.
     * @param File $file
     */
    public function __construct(File $file)
    {
        $this->file = $file;
    }

    public function getProgress()
    {
        return $this->file->bytesUploadedSoFar / $this->file->totalBytes;
    }
}

class Mp3 {

    private $currentPosition;

    private $length;

}

//poor man's solution


class File1 {
    /** @var int */
    public $total;
    /** @var int */
    public $current;
}

class Progress1
{
    /** @var object */
    private $object;

    /**
     * Progress1 constructor.
     * @param object $object
     */
    public function __construct($object)
    {
        $this->object = $object;
    }

    public function getProgress()
    {
        return $this->object->current / $this->object->total;
    }
}

class Mp31 {
    public $current;

    public $total;
}

//better solution

interface Measurable {
    /**
     * @return int
     */
    public function getCurrentPosition();

    /**
     * @return int
     */
    public function getTotalLength();
}

class File2 implements Measurable {

    private $totalBytes;

    private $currentPositionInBytes;

    public function getCurrentPosition()
    {
        return $this->currentPositionInBytes;
    }

    public function getTotalLength()
    {
        return $this->totalBytes;
    }
}

class Mp32 implements Measurable {

    private $currentPositionInSeconds;

    private $lengthInSeconds;

    public function getCurrentPosition()
    {
        return $this->currentPositionInSeconds;
    }

    public function getTotalLength()
    {
        return $this->lengthInSeconds;
    }
}

interface ProgressMeter {

    /**
     * @param Measurable $subject
     * @return float
     */
    public function getProgress(Measurable $subject);
}

class Progress2 implements ProgressMeter
{
    public function getProgress(Measurable $subject)
    {
        return $subject->getCurrentPosition() / $subject->getTotalLength();
    }
}

