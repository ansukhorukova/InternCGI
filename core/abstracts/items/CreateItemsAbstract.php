<?php

namespace core\abstracts\items;

abstract class CreateItemsAbstract
{
    public function create(array $item, $dbh)
    {
        $this->_createItem($item, $dbh);
    }
    abstract protected function _createItem($item, $dbh);
}
