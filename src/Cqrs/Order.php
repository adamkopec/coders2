<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 25.05.2016
 * Time: 14:27
 */

namespace Cqrs;

class Order
{
    /** @var OrderId */
    private $id;
    /** @var UserId */
    private $userId;
    /** @var int */
    private $status;

    /**
     * Order constructor.
     * @param OrderId $id
     * @param UserId $userId
     */
    public function __construct(OrderId $id, UserId $userId)
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->status = 1;
    }
    
    public function setNewStatus($status)
    {
        if ($status < $this->status) {
            throw new \LogicException("Status change not allowed");
        }
    }

    /**
     * @return OrderId
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return UserId
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }
}