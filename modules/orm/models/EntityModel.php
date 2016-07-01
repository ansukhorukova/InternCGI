<?php

namespace modules\orm\models;

use modules\orm\core\interfaces\EntityInterface;
use PDO;

/**
 * Class EntityModel implements interface ItemsInterface.
 *
 * All implemented method are need for work ORM.
 *
 * @package modules\orm\models
 */
class EntityModel implements EntityInterface
{

    /**
     * @var int|string $id.
     */
    protected $id;
    /**
     * @var resource $dbh.
     */
    protected $dbh;
    /**
     * @var string $tableName
     */
    protected $tableName;

    /**
     * Method getId() returns current item $id.
     *
     * @return int $id.
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
     * Call create() function, it'll create new entity in DB.
     *
     * @param object. Send object with properties, like name, login, password or etc.
     *
     * @return string|void
     */
    public function save()
    {
        if($this->id == null){
            $sql = $this->_sqlInsert($this, $this->tableName);
            $sth = $this->dbh->prepare($sql);
            $sth->execute();
            $this->id = $this->dbh->lastInsertId();
            return 'New row added in db at ' . date('Y-m-d H:i:s');
        } else {
            $sql = $this->_sqlUpdate($this, $this->tableName);
            $sth = $this->dbh->prepare($sql);
            $sth->execute();
            return 'row id:' . $this->id . ' is updated at ' . date('Y-m-d H:i:s');
        }
    }

    /**
     * Call loadAll() method, and receive collection users from 'user' table.
     *
     * @return array $dataAll.
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

    /**
     * Load data from database and save it in protected properties.
     *
     * @param int|string $id Record Id.
     */
    public function load($id)
    {
        $sql = "SELECT * FROM `" . $this->tableName . "` WHERE id = " .$id;
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        $row = $sth->fetch(PDO::FETCH_ASSOC);
        $this->id = $id;
        $this->_getValuesFromTable($row);
    }

    /**
     * Delete record from the database.
     *
     * @return void
     */
    public function delete()
    {
        $sql = "DELETE FROM `" . $this->tableName . "` WHERE id = " . $this->id;
        $this->dbh->exec($sql);
    }

    /**
     * Method _sqlInsert() is internal method for dynamically creates SQL INSERT query.
     *
     * @param object $data
     * @param string $tableName
     *
     * @return string $sqlInsert
     */
    protected function _sqlInsert($data, $tableName)
    {
        $returnData = $this->_returnThisData($data);
        $data = $returnData[0];
        /**
         * @param $count, $sqlInsertKey, $sqlInsertValue, $i, $key and $value
         *     they are internal variables to create the logic of this method.
         */
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

    /**
     * Method _sqlUpdate() is internal method for dynamically creates SQL UPDATE query.
     *
     * @param object $data
     * @param string $tableName
     *
     * @return string $sqlUpdate
     */
    protected function _sqlUpdate($data, $tableName)
    {
        $returnData = $this->_returnThisData($data);
        $data = $returnData[0];
        /**
         * @param $count, $i, $key and $value
         *     they are internal variables to create the logic of this method.
         */
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
        $sqlUpdate .= " WHERE id = " . $this->id;

        return $sqlUpdate;
    }

    /**
     * The method _returnThisData() implements logic iterate object $data,
     * find all properties, that are will used.
     * Method _returnThisData() return all found properties and them count.
     *
     * @param object $data
     *
     * @return mixed $returnData
     */
    protected function _returnThisData($data) {
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

    /**
     * Method _getValuesFromTable() saves data returned from table
     *    in protected properties of object $this.
     *
     * @param array $row
     */
    protected function _getValuesFromTable($row)
    {
        foreach ($row as $key =>$value) {
            $this->$key = $value;
        }
    }
}