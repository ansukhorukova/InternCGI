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


    public function updateProduct($id, $data)
    {
        $this->_data[$this->_idName] = $id;
        $this->_updateData = $data;
        $this->save();
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
                    break;
                } else {
                    continue;
                }
            }
            if(null !== $this->_updateData) {
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
    public function getDataFromDataBase($nextPage = null, $numOnPage = null, $orderBy = null)
    {
        if($nextPage == null) {
            $page = 0;
        } else {
            $page = $nextPage * $numOnPage - $numOnPage;
        }
        if($orderBy !== null) {
            $orderBySql =  "ORDER BY {$orderBy['subject']} {$orderBy['method']} ";
        } else {
            $orderBySql = '';
        }

        if($numOnPage == null) {
            $sql = "SELECT * FROM `" . $this->_tableName . "` " . $orderBySql;
        } else {
            $sql = "SELECT * FROM `" . $this->_tableName . "` " . $orderBySql
                . "LIMIT " . $page . ", " . $numOnPage;
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

    public function getRowData($id)
    {
        $this->load($id);
        return $this->_data;
    }

    /**
     * Get number of page for pagination.
     */
    public function getNumberPagesToPaginator()
    {
        $numberRowsInDataBase = $this->_countRowsInDataBase();
        $_SESSION['numberPages'] = round($numberRowsInDataBase/$_SESSION['onPage'], 0, PHP_ROUND_HALF_UP);
    }

    /**
     * Count all rows in database.
     *
     * @return int $count.
     */
    private function _countRowsInDataBase()
    {
        $data = $this->getDataFromDataBase();
        $count = count($data);
        return $count;
    }

    /**
     * Convert object from magento REST API to array.
     *
     * @param $obj
     * @return array
     */
    public function objectToArray($obj) {
        if(is_object($obj)) $obj = (array) $obj;
        if(is_array($obj)) {
            $new = array();
            foreach($obj as $key => $val) {
                $new[$key] = $this->objectToArray($val);
            }
        }
        else $new = $obj;
        return $new;
    }

}
