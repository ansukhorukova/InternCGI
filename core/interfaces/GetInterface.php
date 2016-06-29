<?php

namespace core\interfaces;

interface GetInterface
{
    public function getSingleItem(array $item, $dbh);
    public function getCollectionItems($dbh);
}
