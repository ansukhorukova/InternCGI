<?php

namespace core\abstracts;

abstract class CreateAbstract 
{
    public function create(array $item, $dbh)
    {
        $this->_createItem($item, $dbh);
    }
    abstract protected function _createItem($item, $dbh);
}
