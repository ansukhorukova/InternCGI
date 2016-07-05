<?php

namespace Orm\Models;

use Orm\Core\EntityInterface;
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
    protected $_id;

    /**
     * @var int|string $idName.
     */
    protected $_idName;

    /**
     * @var resource $dbh.
     */
    protected $_dbh;

    /**
     * @var array $data. The array for creating new records in table.
     */
    protected $_data = array();

    /**
     * @var array $updateData. The array for update records in table.
     */
    protected $_updateData = array();

    /**
     * @var string $tableName
     */
    protected $_tableName;

    /**
     * @var string $functionName.
     */
    protected $_functionName;

    /**
     * @var string $logger.
     */
    protected $_logger;

    /**
     * Users constructor. Get connection to DB and configure model to work with entity.
     *
     * @param resource $dbh
     * @param string $tableName
     * @param string $idName
     * @param object $logger
     */
    public function __construct ($dbh, $tableName, $idName,$logger = null)
    {
        $this->_dbh = $dbh;
        $this->_tableName = $tableName;
        $this->_idName = $idName;
        $this->_logger = $logger;
    }

    /**
     * Users destructor. Close connection to DB
     */
    public function __destruct()
    {
        unset($this->_dbh);
    }

     /**
     * Method getId() returns current item id.
     *
     * @return int|string $this->id.
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * Method save() creates new entity or update it in DB.
     *
     * @param array $this ->data. Contains properties, like name, email or etc.
     *
     * @return void.
     */
    public function save()
    {
        if($this->_id == null){
            $sql = $this->_sqlInsert($this->_data);
            $this->_executeSql($sql, $this->_data);
            $this->_id = $this->_dbh->lastInsertId();
        } else {
            $sql = $this->_sqlUpdate($this->_updateData);
            $this->_updateData[$this->_idName] = $this->_id;
            $this->_executeSql($sql, $this->_updateData);
            $this->_data = array_replace($this->_data, $this->_updateData);
            unset($this->_updateData);
        }
    }

    /**
     * Call loadAll() method, and receive collection users from 'user' table.
     *
     * @return array $dataAll.
     */
    public function loadAll()
    {
        $sql = "SELECT * FROM `" . $this->_tableName . "`";
        $sth = $this->_executeSql($sql);
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
        $this->_id = $id;
        $sql = "SELECT * FROM `" . $this->_tableName . "` WHERE " . $this->_idName . " = ?";
        $sth = $this->_executeSql($sql, $this->_id);
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
        $sql = "DELETE FROM `" . $this->_tableName . "` WHERE " . $this->_idName . " = " . $this->_id;
        $this->_dbh->exec($sql);
        $this->_id = null;
        $this->_data = null;
    }

    /**
     * Method _sqlInsert() is internal method for dynamically creates SQL INSERT query.
     *
     * @param object $data
     * @param string $tableName
     *
     * @return string $sqlInsert
     */
    protected function _sqlInsert($data)
    {
        return $sqlInsert = "INSERT INTO `"
                 . $this->_tableName . "` (`" . implode("`, `", array_keys($data)) . "`) "
                 . "VALUES (" . implode(", ", array_fill(0, count($data), '?')) . ")";
    }

    /**
     * Method _sqlUpdate() is internal method for dynamically creates SQL UPDATE query.
     *
     * @param object $data
     *
     * @return string $sqlUpdate
     */
    protected function _sqlUpdate($data)
    {
        return $sqlUpdate = "UPDATE `" . $this->_tableName ."` SET "
            . implode(", ", array_map(function ($key)
                                        {
                                            return $key . " = ? ";
                                        },
                                        array_keys($data)
                                     )
            )
            . " WHERE " . $this->_idName . " = ?";
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
            $this->_data[$key] = $value;
        }
    }

    /**
     * Method _executeSql() implements binding parameters for sql query.
     *
     * @param array $data
     */
    protected function _executeSql($sql, $data = null)
    {
        $sth = $this->_dbh->prepare($sql);
        if($data !==null) {
            $this->_bindValue($data, $sth);
        }
        $sth->execute();
        return $sth;
    }

    /**
     * Method _bindValue() bind data with prepared expressions.
     *
     * @param array $data.
     * @param object $sth.
     */
    protected function _bindValue($data, $sth)
    {
        if(!is_array($data)){
            $sth->bindValue(1, $data);
        } else {
            $i = 0;
            foreach ($data as $key => $value) {
                $sth->bindValue(++$i, $value);
            }
        }
    }
}
