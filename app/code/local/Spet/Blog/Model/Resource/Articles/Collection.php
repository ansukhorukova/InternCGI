<?php

class Spet_Blog_Model_Resource_Articles_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{

    /**
     * Resource initialization.
     */
    protected function _construct()
    {
        $this->_init('blog/articles');
    }
}