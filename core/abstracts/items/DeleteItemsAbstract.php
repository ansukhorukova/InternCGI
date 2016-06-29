<?php

namespace core\abstracts\items;

abstract class DeleteItemsAbstract
{
    abstract public function deleteItem($item, $dbh);
}
