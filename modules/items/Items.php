<?php

namespace modules\items;

use core\interfaces\items\ItemsInterface;
use PDO;

class Items implements ItemsInterface
{
    protected $id;
    protected $dbh;
    protected $tableName;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

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

    /**
     * Call create() function, it'll create new user in DB.
     *
     * @param array $user . Send array with user data, like name, login, password and etc.
     *
     * @return string|void
     */
    public function save()
    {
        $this->date = date('Y-m-d H:i:s');

        if($this->id == null){
            $sql = $this->_sqlInsert($this, $this->tableName);
            $sth = $this->dbh->prepare($sql);
            $sth->execute();
            $this->id = $this->dbh->lastInsertId();
            return 'New row added in db';
        } else {
            $sql = $this->_sqlUpdate($this, $this->tableName);
            $sth = $this->dbh->prepare($sql);
            $sth->execute();
            return 'row is updated in db';
        }
    }

    /**
     * Call loadAll() method, and receive collection users from 'user' table.
     *
     * @return array|void
     */
    public function loadAll()
    {
        $sql = "SELECT * FROM `" . $this->tableName . "`";
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
             $dataAll[] = $row;
        }
        return $dataAll;

    }

    public function load($id)
    {
        $sql = "SELECT * FROM `" . $this->tableName . "` WHERE id = " .$id;
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        return $row = $sth->fetch(PDO::FETCH_ASSOC);
    }

    public function delete()
    {
        $sql = "DELETE FROM `" . $this->tableName . "` WHERE id = " . $this->id;
        $this->dbh->exec($sql);
    }

    private function _sqlInsert($data, $tableName)
    {
        $returnData = $this->returnThisData($data);
        $data = $returnData[0];
        $count = $returnData[1];
        $sqlInsertKey = '';
        $sqlInsertValue = '';
        $i = 1;
        $sqlInsert = "INSERT INTO `" . $tableName ."` (";
        foreach ($data as $key => $value) {
            if($i < $count){
                $sqlInsertKey .= "$key, ";
                $sqlInsertValue .= "'$value', ";
            } else {
                $sqlInsertKey .= "$key";
                $sqlInsertValue .= "'$value'";
            }
            $i++;
        }
        $sqlInsert .= $sqlInsertKey. ") VALUES (" . $sqlInsertValue . ')';

        return $sqlInsert;
    }

    private function _sqlUpdate($data, $tableName)
    {
        $returnData = $this->returnThisData($data);
        $data = $returnData[0];
        $count = $returnData[1];
        $i = 1;
        $sqlUpdate = "UPDATE `" . $tableName ."` SET ";
        foreach ($data as $key => $value) {
            if($i < $count){
                $sqlUpdate .= "$key = '$value', ";
            } else {
                $sqlUpdate .= "$key = '$value'";
            }
            $i++;
        }
        $sqlUpdate .= "WHERE id = " . $this->id;

        return $sqlUpdate;
    }

    public function returnThisData($data) {
        $i = 0;
        foreach ($data as $key => $value) {
            if($key == 'dbh' || $key == 'tableName' || $key == 'id') {
                continue;
            } else {
                $returnData[0][$key] = $value;
                $i++;
            }
        }
        $returnData[1] = $i;
        return $returnData;
    }
}