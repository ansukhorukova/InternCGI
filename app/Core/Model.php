<?php

namespace Core;

use Models\ConnectToDataBaseModel;

class Model
{
    private $_dbh;
    /**
     * Method disConnect() implements connection to database.
     */
    public function getConnect()
    {
        $connect = ConnectToDataBaseModel::getInstance();
        return $this->_dbh = $connect->getConnectToDataBase();
    }

    /**
     * Method disConnect() implements disconnection from database.
     */
    public function disConnect()
    {
        unset($this->_dbh);
    }
}