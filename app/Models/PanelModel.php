<?php
//
//namespace Models;
//
//use Core\Model;
//
//class PanelModel extends Model
//{
//    protected $_url;
//    protected $_page;
//    protected $_limit;
//    protected $_dbh;
//    protected $_productModel;
//
//    /**
//     * @param $productsList
//     * @param $nextPage
//     * @param $numOnPage
//     * @return array
//     */
//    public function workWithDataInDataBase($productsList, $nextPage, $numOnPage)
//    {
//        $productsList = $this->_objectToArray($productsList);
//        $productsList = array_values($productsList);
//        $this->_dbh = $this->getConnect();
//        $this->_productModel = new ProductModel($this->_dbh);
//        if(true == $this->_productModel->setDataInDataBase($productsList)) {
//            return $data = $this->_productModel->getDataFromDataBase($nextPage, $numOnPage);
//        }
//    }
//
//    public function updateProduct($id, $data)
//    {
//        if($data['is_saleable'] == 'on') {
//            $data['is_saleable'] = true;
//        } else {
//            $data['is_saleable'] = false;
//        }
//        $this->_dbh = $this->getConnect();
//        $this->_productModel = new ProductModel($this->_dbh);
//        $this->_productModel->updateProduct($id, $data);
//    }
//
//
//
//    /**
//     * Get all data from database.
//     *
//     * @param $nextPage
//     * @param $numOnPage
//     * @return array
//     */
//    public function getDataFromDataBase($nextPage, $numOnPage, $orderBy)
//    {
//        $this->_dbh = $this->getConnect();
//        $this->_productModel = new ProductModel($this->_dbh);
//        return $data = $this->_productModel->getDataFromDataBase($nextPage, $numOnPage, $orderBy);
//    }
//
//    /**
//     * Get single product from database.
//     *
//     * @param $id
//     * @return array
//     */
//    public function getLineFromDataBase($id)
//    {
//        $this->_dbh = $this->getConnect();
//        $this->_productModel = new ProductModel($this->_dbh);
//        $this->_productModel->load($id);
//        return $this->_productModel->getLineData();
//    }
//
//    /**
//     * Convert object from magento REST API to array.
//     *
//     * @param $obj
//     * @return array
//     */
//    private function _objectToArray($obj) {
//        if(is_object($obj)) $obj = (array) $obj;
//        if(is_array($obj)) {
//            $new = array();
//            foreach($obj as $key => $val) {
//                $new[$key] = $this->_objectToArray($val);
//            }
//        }
//        else $new = $obj;
//        return $new;
//    }
//}
