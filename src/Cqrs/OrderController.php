<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 25.05.2016
 * Time: 14:34
 */

namespace Cqrs;


class OrderController implements EventDispatcher
{
    /** @var OrderDetailQuery */
    private $orderDetailQuery;
    
    public function dispatch(Event $event)
    {
        if ($event instanceof OrderUpdatedEvent) {
            $this->_helper->messenger->ok(sprintf(
                $this->translate('order_was_updated'),
                $event->getOrderId()
            ));
        }
    }

    public function detailsAction()
    {
        $id = $this->getIdFromRequest();

        $viewModel = $this->orderDetailQuery->getDetails($id);
        
        $this->view->assign($viewModel->toArray());
    }

    public function editAction()
    {
        $id = $this->getIdFromRequest();
        
        $form = $this->formBuilder->buildFormByOrderId($id);
        
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($this->getRequest()->getPost())) {
                $this->formSaver->setEventDispatcher($this);
                try {
                    $this->formSaver->updateOrder($id, $form->getValues());
                } catch (\Exception $e) {
                    $this->_helper->messenger->err('a u mnie działało');
                }
            }
        }
        
        $this->view->form = $form;
    }

    /**
     * @return OrderId
     */
    private function getIdFromRequest()
    {
        $idParam = (int)$this->getParam('id', -1);
        $id = new OrderId($idParam);
        return $id;
    }
}