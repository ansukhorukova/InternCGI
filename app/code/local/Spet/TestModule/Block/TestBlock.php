<?php

class Spet_TestModule_Block_TestBlock extends Mage_Core_Block_Template {

    public function getRecentProducts() {
        $arr_products = array();
        // call model to fetch data
        $products = Mage::getModel("testmodule/testModel")->getRecentProducts();

        return $products->getData();

        foreach ($products as $product) {
            $arr_products[] = array(
                'id' => $product->getId(),
                'name' => $product->getName(),
                'url' => $product->getProductUrl(),
                'image' => $product->getImage(),
            );
        }

        return $arr_products;
  }
}