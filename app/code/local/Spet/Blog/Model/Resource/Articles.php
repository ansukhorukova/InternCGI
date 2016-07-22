<?php

class Spet_Blog_Model_Resource_Articles extends Mage_Core_Model_Resource_Db_Abstract
{

    /**
     * Resource initialization.
     */
    protected function _construct()
    {
        $this->_init('blog/articles', 'blogpost_id');
    }

    /**
     * Method _getLoadSelect() needs for use joins where do some load.
     *
     * @param string $field
     * @param mixed $value
     * @param Mage_Core_Model_Abstract $object
     * @return Zend_Db_Select
     */
    protected function _getLoadSelect($field, $value, $object)
    {
        $select = parent::_getLoadSelect($field, $value, $object);

        $select->join(array('ce1' => 'customer_entity_varchar'),'ce1.entity_id = author_id AND ce1.attribute_id = 5', 'ce1.value as name');
        $select->join(array('ce2' => 'customer_entity_varchar'),'ce2.entity_id = author_id AND ce2.attribute_id = 7', 'ce2.value as lname');
        return $select;
    }
}