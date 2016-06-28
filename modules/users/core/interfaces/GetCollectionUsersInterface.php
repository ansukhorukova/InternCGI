<?php

namespace modules\users\core\interfaces;

interface GetCollectionUsersInterface
{
    public function getSingleUser(array $user, $dbh);
    public function getCollectionUsers($dbh);
}
