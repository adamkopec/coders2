<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 25.05.2016
 * Time: 14:45
 */

namespace Cqrs;

class UpdateOrderCommand
{
    /** @var OrderId */
    private $orderId;
    /** @var int */
    private $newStatus;
    /** @var UserId */
    private $changeAuthorId;

    /**
     * UpdateOrderCommand constructor.
     * @param OrderId $orderId
     * @param UserId $changeAuthorId
     * @param int $newStatus
     */
    public function __construct(OrderId $orderId, UserId $changeAuthorId, $newStatus)
    {
        $this->orderId = $orderId;
        $this->changeAuthorId = $changeAuthorId;
        $this->newStatus = $newStatus;
    }

    /**
     * @return UserId
     */
    public function getChangeAuthorId()
    {
        return $this->changeAuthorId;
    }

    /**
     * @return int
     */
    public function getNewStatus()
    {
        return $this->newStatus;
    }

    /**
     * @return OrderId
     */
    public function getOrderId()
    {
        return $this->orderId;
    }
}