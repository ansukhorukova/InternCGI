<?php

namespace modules\items;

use core\interfaces\items\ItemsInterface;
use PDO;

class Items implements ItemsInterface
{
    private $dbh;
    private $data = array();
    private $dataAll = array();
    private $id;
    private $sqlInsert;
    private $sqlUpdate;
    private $tableName;
    private $functionName;

    /**
     * Users constructor. Make connection to DB
     */
    public function __construct ($dbh, $tableName)
    {
        $this->dbh = $dbh;
        $this->tableName = $tableName;
    }

    /**
     * Users destructor. Close connection to DB
     */
    public function __destruct()
    {
        unset($this->dbh);
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        return $this->data[$name];
    }

    public function __call($name, $arguments)
    {
        $this->functionName = substr($name, 0, 3);
        if($this->functionName == 'get') {
            $name = strtolower(substr($name,3));
            return $this->data[$name];
        } else {
            $name = strtolower(substr($name,3));
            $this->data[$name] = $arguments[0];
        }

    }

    /**
     * Call create() function, it'll create new user in DB.
     *
     * @param array $user. Send array with user data, like name, login, password and etc.
     */
    public function save()
    {
        $this->data['date'] = date('Y-m-d H:i:s');

        if(!array_key_exists('id', $this->data)){
            $sql = $this->_sqlInsert($this->data, $this->tableName);
            $sth = $this->dbh->prepare($sql);
            $sth->execute();
            $this->data['id'] = $this->dbh->lastInsertId();
        } else {
            $this->id = $this->data['id'];
            unset($this->data['id']);
            $sql = $this->_sqlUpdate($this->data, $this->tableName);
            $sth = $this->dbh->prepare($sql);
            $sth->execute();
            $this->data['id'] = $this->dbh->lastInsertId();

        }
    }

    /**
     * Call getCollectionItems() method, and receive collection users from 'user' table.
     *
     * @return array|void
     */
    public function loadAll()
    {
        $sql = "SELECT * FROM `" . $this->tableName . "`";
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            $this->dataAll[] = $row;
        }
        return $this->dataAll;

    }

    public function load($id)
    {
        $sql = "SELECT * FROM `" . $this->tableName . "` WHERE id = " .$id;
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        $this->data = $sth->fetch(PDO::FETCH_ASSOC);
        return $this->data;
    }

    public function getId()
    {
        return $this->data['id'];
    }

    public function delete()
    {
        $sql = "DELETE FROM `" . $this->tableName . "` WHERE id = " . $this->data['id'];
        $this->dbh->exec($sql);
    }

    private function _sqlInsert($data, $tableName)
    {
        $count = count($data);
        $i = 1;
        $this->sqlInsert = "INSERT INTO `" . $tableName ."` (";
        foreach ($data as $key => $value) {
            if($i < $count){
                $this->sqlInsert .= "$key, ";
            } else {
                $this->sqlInsert .= "$key";
            }
            $i++;
        }
        $this->sqlInsert .= ") VALUES (";

        $i = 1;
        foreach ($data as $key => $value) {
            if($i < $count){
                $this->sqlInsert .= "'$value', ";
            } else {
                $this->sqlInsert .= "'$value'";
            }
            $i++;
        }
        $this->sqlInsert .= ')';

        return $this->sqlInsert;
    }

    private function _sqlUpdate($data, $tableName)
    {
        $count = count($data);
        $i = 1;
        $this->sqlUpdate = "UPDATE `" . $tableName ."` SET ";
        foreach ($data as $key => $value) {
            if($i < $count){
                $this->sqlUpdate .= "$key = $value, ";
            } else {
                $this->sqlUpdate .= "$key = $value";
            }
            $i++;
        }
        $this->sqlUpdate .= "WHERE id = " . $this->id;

        return $this->sqlUpdate;
    }
}