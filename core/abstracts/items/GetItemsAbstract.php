<?php

namespace core\abstracts\items;

use core\interfaces\items\GetItemsInterface;

abstract class GetItemsAbstract
    implements GetItemsInterface
{
    public function getSingleItem(array $item, $dbh)
    {
        $this->_showItem($item, $dbh);
    }
    public function getCollectionItems($dbh)
    {
       $this->_showItem(null, $dbh);
    }
   abstract protected function _showItem($item, $dbh);
}
