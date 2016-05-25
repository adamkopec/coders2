<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 25.05.2016
 * Time: 14:49
 */

namespace Cqrs;


class UpdateOrderCommandDispatcher
{
    /** @var Event[] */
    private $events;
    /** @var OrderReadRepository */
    private $orderReadRepository;
    /** @var OrderWriteRepository */
    private $orderWriteRepository;
    
    /**
     * @param UpdateOrderCommand $command
     * @throws OrderNotFoundException
     * @return void
     */
    public function dispatch(UpdateOrderCommand $command)
    {
        $this->transactional(function() {
            $orderId = $command->getOrderId();
            $order = $this->orderReadRepository->getById($orderId);

            if (is_null($order)) {
                throw new OrderNotFoundException("Order not found");
            }

            if (!$this->aclVerifier->isUserAllowedToModify($orderId, $command->getChangeAuthorId())) {
                throw new OperationNotAllowedException("User not allowed to edit orders");
            }

            try {
                $order->setNewStatus($command->getNewStatus());

                $this->orderWriteRepository->persist($order);
                $this->events[] = new OrderUpdatedEvent($orderId);
            } catch (\LogicException $ex) {
                $this->events[] = new OrderUpdateErrorOccuredEvent($orderId);
            }    
        });
    }
    
    public function getEventStream()
    {
        return $this->events;
    }
}