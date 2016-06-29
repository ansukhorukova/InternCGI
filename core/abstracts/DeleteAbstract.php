<?php

namespace core\abstracts;

abstract class DeleteAbstract
{
    public function delete(array $item, $dbh)
    {
        $this->_deleteItem($item, $dbh);
    }
    abstract protected function _deleteItem($item, $dbh);
}
