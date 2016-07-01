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
     * @var array $data.
     */
    protected $data = array();

    /**
     * @var string $tableName
     */
    protected $tableName;

    /**
     * Method getId() returns current item id.
     *
     * @return int|string $this->data['id'].
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Users constructor. Get connection to DB and configure model to work with entity.
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
            $sql = $this->_sqlInsert($this->data, $this->tableName);
            $sth = $this->dbh->prepare($sql);
            $sth->execute();
            $this->id = $this->dbh->lastInsertId();
            return 'New row added in db at ' . date('Y-m-d H:i:s');
        } else {
            $sql = $this->_sqlUpdate($this->data, $this->tableName);
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
     *
     * @return void
     */
    public function load($id)
    {
        $this->id = $id;
        $sql = "SELECT * FROM `" . $this->tableName . "` WHERE id = " .$id;
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        $row = $sth->fetch(PDO::FETCH_ASSOC);
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
        $this->id = null;
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
        return
            $sqlInsert = "INSERT INTO `"
            . $tableName . "` (`" . implode("`, `", array_keys($data)) . "`) "
                    . "VALUES ('" . implode("', '", $data) . "')";
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
        return $sqlUpdate = "UPDATE `" . $tableName ."` SET "
            . array_map(
                function ($key, $value)
                {
                    return $key . " = '" . $value;
                },
                array_keys($data),
                $data
              )
            . " WHERE id = " . $this->id;
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
    /*
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
    */
    /**
     * Method _getValuesFromTable() saves data returned from table
     *    in protected properties of object $this.
     *
     * @param array $row
     */
    protected function _getValuesFromTable($row)
    {
        foreach ($row as $key =>$value) {
            $this->data[$key] = $value;
        }
    }
}
