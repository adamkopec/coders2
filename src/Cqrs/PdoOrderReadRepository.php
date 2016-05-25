<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 25.05.2016
 * Time: 14:54
 */

namespace Cqrs;


class PdoOrderReadRepository implements OrderReadRepository
{
    /** @var \PDO */
    private $pdo;
    /** @var PdoOrderFactory */
    private $orderFactory;
    
    public function getById(OrderId $id)
    {
        $rawData = $this->retrieveRecord($id);
        
        if ($rawData === false) {
            return null;
        }
        
        return $this->orderFactory->createFromRecord($rawData);
    }
}