<?php

namespace core\abstracts;

use core\interfaces\GetInterface;

abstract class GetAbstract
    implements GetInterface
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
