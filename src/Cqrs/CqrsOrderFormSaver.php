<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 25.05.2016
 * Time: 14:44
 */

namespace Cqrs;


class CqrsOrderFormSaver implements OrderFormSaver
{
    /** @var FrameworkIdentityProvider */
    private $identityProvider;
    
    /** @var UpdateOrderCommandDispatcher */
    private $updateOrderCommandDispatcher;
    
    /** @var FrameworkEventDispatcher */
    private $eventDispatcher;
    
    public function updateOrder(OrderId $id, array $formData)
    {
        $this->validateFormData($formData);
        
        $command = new UpdateOrderCommand(
            $id,
            $this->identityProvider->getCurrentUserId(),
            $formData['status']
        );

        $dispatcher = $this->updateOrderCommandDispatcher;
        $dispatcher->dispatch($command);
        
        $this->eventDispatcher->dispatch($dispatcher->getEventStream());
    }
}