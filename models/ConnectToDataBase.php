<?php

namespace models;

class ConnectToDataBase
{
    public $connect;

    public function __construct($dataBase)
    {
        $this->connect = new $dataBase();
        $this->getConnect();
    }

     /**
     * @return mixed
     */
    private function getConnect()
    {
        return $this->connect->getDbh();
    }

    public function __destruct()
    {
        unset($this->dataBaseConnect);
    }
}
