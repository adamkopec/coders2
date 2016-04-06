<?php
//SRP

namespace Sales;

class User extends OhMyGodRecord {

    private $name;

    private $id;

    private $trustLevel;

    public function save()
    {

    }

    public function calculatePayment()
    {

    }

    public function getLastTransactions()
    {

    }

    public function qualifiesForDiscount()
    {

    }
}

class Product {

    private $categoryId;

    private $parentCategoryId;

    private $categoryName;

    private $sku;

    /**
     * @return mixed
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * @return mixed
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * @param mixed $categoryId
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
    }

    /**
     * @return mixed
     */
    public function getParentCategoryId()
    {
        return $this->parentCategoryId;
    }

    /**
     * @param mixed $parentCategoryId
     */
    public function setParentCategoryId($parentCategoryId)
    {
        $this->parentCategoryId = $parentCategoryId;
    }

    /**
     * @return mixed
     */
    public function getCategoryName()
    {
        return $this->categoryName;
    }

    /**
     * @param mixed $categoryName
     */
    public function setCategoryName($categoryName)
    {
        $this->categoryName = $categoryName;
    }
}

class CategoryBinding {
    /** @var int */
    private $categoryId;
    /** @var int */
    private $parentCategoryId;
    /** @var string */
    private $categoryName;

    /**
     * CategoryBinding constructor.
     * @param int $categoryId
     * @param int $parentCategoryId
     * @param string $categoryName
     */
    public function __construct($categoryId, $parentCategoryId, $categoryName)
    {
        if ($categoryId == $parentCategoryId) {
            throw new \InvalidArgumentException("Category could not be a parent of itself");
        }

        $this->categoryId = $categoryId;
        $this->parentCategoryId = $parentCategoryId;
        $this->categoryName = $categoryName;
    }

    public function updateCategoryIds($categoryId, $parentCategoryId)
    {

    }

    /**
     * @param int $categoryId
     */
    private function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
    }

    /**
     * @param int $parentCategoryId
     */
    private function setParentCategoryId($parentCategoryId)
    {
        $this->parentCategoryId = $parentCategoryId;
    }
}

class Product2 {
    /** @var CategoryBinding */
    private $categoryBinding;
    /** @var string */
    private $sku;
}


class BetterUser implements EventSource {

    private $id;

    private $name;

    private $deletedAt;

    /**
     * BetterUser constructor.
     * @param $id
     * @param $name
     */
    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;

        $this->raiseEvent(new UserCreatedEvent($this));
    }

    public function markAsDeleted()
    {
        $this->deletedAt = new \DateTimeImmutable();
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }
}


$user = new BetterUser(5, 'Wacek');
$user->markAsDeleted();

$rc = new \ReflectionClass(BetterUser::class);
$instance = $rc->newInstanceWithoutConstructor();

$rp = new \ReflectionProperty($instance, 'deletedAt');
$rp->setAccessible(true);
$rp->setValue($instance, $record['deletedAt']);

return $instance;

class UserCreatedEvent {}

class CodersMeetingFailedEvent {}

class WhateverEvent {}

class UserCreatedEventListener implements EventListener {

    public function react(UserCreatedEvent $event) {

    }
}

class WhateverEventListener {

    public function react(WhateverEvent $event) {

    }
}

abstract class AbstractEventListener {

    /**
     * @return string
     */
    public function getEventClassName() {
        $currentClass = get_class($this);
        $rc = new \ReflectionClass($currentClass);

        if (!$rc->hasMethod('react')) {
            throw new \RuntimeException("Listener does not implement react()");
        }

        $rm = new \ReflectionMethod($currentClass, 'react');
        if ($rm->getNumberOfParameters() != 1) {
            throw new \RuntimeException("Listener's react method has an unsupported signature");
        }

        $parameters = $rm->getParameters();
        $parameter = $parameters[0];

        return $parameter->getClass()->getName();
    }


}

class CodersMeetingFailedEventListener extends AbstractEventListener
{
    public function react(CodersMeetingFailedEvent $event) {

    }
}


