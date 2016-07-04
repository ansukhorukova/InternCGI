<?php

namespace orm\src\models;

use orm\src\core\EntityInterface;
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
     * @var array $data. The array for creating new records in table.
     */
    protected $data = array();

    /**
     * @var array $updateData. The array for update records in table.
     */
    protected $updateData = array();

    /**
     * @var string $tableName
     */
    protected $tableName;

    /**
     * @var string $functionName.
     */
    protected $functionName;

    /**
     * @var string $logger.
     */
    protected $logger;

    /**
     * Users constructor. Get connection to DB and configure model to work with entity.
     */
    public function __construct ($dbh, $tableName, $logger = null)
    {
        $this->dbh = $dbh;
        $this->tableName = $tableName;
        $this->logger = $logger;
    }

    /**
     * Users destructor. Close connection to DB
     */
    public function __destruct()
    {
        unset($this->dbh);
    }

     /**
     * Method getId() returns current item id.
     *
     * @return int|string $this->id.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Method save() creates new entity or update it in DB.
     *
     * @param array $this ->data. Contains properties, like name, email or etc.
     * @param string $this ->tableName. Contains name of DataBase.
     *
     * @return void.
     */
    public function save()
    {
        if($this->id == null){
            $sql = $this->_sqlInsert($this->data, $this->tableName);
            $sth = $this->dbh->prepare($sql);
            $this->_bindValue($this->data, $sth);
            $sth->execute();
            $this->id = $this->dbh->lastInsertId();
        } else {
            $sql = $this->_sqlUpdate($this->updateData, $this->tableName);
            $sth = $this->dbh->prepare($sql);
            $this->_bindValue($this->updateData, $sth);
            $sth->execute();
            $this->data = array_replace($this->data, $this->updateData);
            unset($this->updateData);
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
        $this->data = null;
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
        return $sqlInsert = "INSERT INTO `"
                 . $tableName . "` (`" . implode("`, `", array_keys($data)) . "`) "
                 . "VALUES (" . implode(", ", array_fill(0, count($data), '?')) . ")";
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
            . implode(", ", array_map(function ($key)
                                        {
                                            return $key . " = ? ";
                                        },
                                        array_keys($data)
                                     )
            )
            . " WHERE id = " . $this->id;
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
            $this->data[$key] = $value;
        }
    }

    /**
     * Method _bindValue() bind data with prepared expressions.
     *
     * @param array $data.
     * @param object $sth.
     */
    protected function _bindValue($data, $sth)
    {
        $i = 0;
        foreach ($data as $key => $value) {
            $sth->bindValue(++$i, $value);
        }
    }
}
