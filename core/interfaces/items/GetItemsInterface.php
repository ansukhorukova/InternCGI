<?php

namespace core\interfaces\items;

interface GetItemsInterface
{
    public function getSingleItem(array $item, $dbh);
    public function getCollectionItems($dbh);
}
