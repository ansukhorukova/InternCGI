<?php

namespace Models;

use Orm\EntityModel;

/**
 * Class User implements logic to work with 'user' table.
 *
 * @package Spet\Orm.
 */
class ProductModel extends EntityModel
{
    /**
     * Specify the table name to work with database.
     *
     * @var string $_tableName.
     */
    protected $_tableName = 'product';

    /**
     * Specify the id field name.
     *
     * @var string $_idName.
     */
    protected $_idName = 'id';

    /**
     * UsersController constructor,
     *     implement transfer connection to model.
     *
     * @param resource $dbh.
     * @param null $logger.
     */
    public function __construct($dbh, $logger = null)
    {
        parent::__construct($dbh, $this->_tableName, $this->_idName, $logger);

    }

    /**
     * Insert data in database
     *
     * @param array $data
     * @return bool
     */
    public function setDataInDataBase($data)
    {
        $dataInDataBase = $this->getDataFromDataBase();
        for($i = 0 ; $i < count($data); $i++) {
            $this->_updateData = null;
            for($j = 0; $j < count($dataInDataBase); $j++) {
                if($data[$i]['sku'] == $dataInDataBase[$j]['sku']) {
                    $this->_updateData = $data[$i];
                    $this->_data[$this->_idName] = $dataInDataBase[$j][$this->_idName];
                } else {
                    continue;
                }
            }
            if(!is_null($this->_updateData)) {
                $this->save();
            } else {
                $this->_data = $data[$i];
                $this->save();
            }
        }
        return true;
    }

    /**
     * Call getDataFromDataBase() method, and receive collection products.
     *
     * @param null $nextPage
     * @param $numOnPage
     * @return array $dataAll.
     */
    public function getDataFromDataBase($nextPage = null, $numOnPage = null)
    {
        if($nextPage == null) {
            $page = 0;
        } else {
            $page = $nextPage * $numOnPage - $numOnPage;
        }

        if($numOnPage == null) {
            $sql = "SELECT * FROM `" . $this->_tableName . "`";
        } else {
            $sql = "SELECT * FROM `" . $this->_tableName . "`" . "LIMIT " . $page . ", " . $numOnPage;
        }
        $sth = $this->_executeSql($sql);
        while($row = $sth->fetch(\PDO::FETCH_ASSOC)) {
            $dataAll[] = $row;
        }
        if(!isset($dataAll)) {
            return false;
        } else {
            return $dataAll;
        }
    }

}
