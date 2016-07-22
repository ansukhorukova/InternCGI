<?php

class Spet_TestModule_Model_TestModel extends Mage_Core_Model_Abstract {

    public function getRecentProducts() {

        $products = Mage::getModel("catalog/product")
            ->getCollection()
                ->addAttributeToSelect('*')
                ->setOrder('entity_id', 'DESC')
                ->setPageSize(10);
    return $products;
  }
}