<?php

namespace core\interfaces\items;

interface GetItemsInterface
{
    public function getSingleItem($item, $dbh);
    public function getCollectionItems($dbh);
}
