<?php

namespace core\abstracts\items;

abstract class DeleteItemsAbstract
{
    public function delete(array $item, $dbh)
    {
        $this->_deleteItem($item, $dbh);
    }
    abstract protected function _deleteItem($item, $dbh);
}
