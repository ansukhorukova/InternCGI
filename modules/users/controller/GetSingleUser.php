<?php

namespace modules\users\controller;

use modules\users\core\abstracts\GetUsersFromDataBaseAbstract;

class GetSingleUser extends GetUsersFromDataBaseAbstract
{
    protected $dbh = null;

    protected function _showUsers($users, $dbh)
    {
        $this->dbh = $dbh;
        if($users['id'] != null) {
            $statement = $this->request('id', $users['id']);
        } elseif ($users['email'] != null) {
            $statement = $this->request('email', $users['id']);
        }

        echo '<table border="1">';
        echo '<tr><th>id</th><th>firstname</th><th>lastname</th><th>login</th><th>type</th><th>email</th></tr>';
        foreach ($statement as $row) {
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>' . '<td>' . $row['firstname'] . '</td>' .
                '<td>' . $row['lastname'] . '</td>' . '<td>' . $row['login'] . '</td>' .
                '<td>' . $row['type'] . '</td>' . '<td>' . $row['email'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }

    protected function request($searchType, $searchValue)
    {
        return $this->dbh->query("SELECT * FROM `users` WHERE $searchType = $searchValue");
    }
}