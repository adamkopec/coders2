<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 25.05.2016
 * Time: 14:20
 */

namespace TheOldWay;

class User {
    
    private $id;
    
    private $name;
}

class Order {
    
    private $id;
    
    private $userId;
    
}

class Model {

    public function save(array $data)
    {
        $order = new Order();
        $order->fromArray($data);
        
        $order->save();
    }
    
    public function getById($id, $withLastOrder = false) {
        $q = \Charl_Query::create()
            ->from('order')
            ->leftJoin('order.user as user')
            ->where('id = ?', $id)
            ...
        
        $data = $q->execute(\Charl::HYDRATE_ARRAY);
        
        if ($withLastOrder) {
            $data['lastOrder'] = ...;
        }
        
        return $data;
    }
    
}

class Controller
{
    public function indexAction()
    {
        $this->view->order = $this->model->getById(
            $this->_request->getParam('id')
        );
    }
    
    public function editAction()
    {
        $safeData = $_POST;
        
        $this->model->save($safeData);
    }
}