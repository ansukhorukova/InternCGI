<?php

namespace core\abstracts\items;

abstract class CreateItemsAbstract
{
    abstract public function createItem($item, $dbh);
}
