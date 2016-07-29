<?php

class Spet_Price_Adminhtml_PriceController extends Mage_Adminhtml_Controller_Action
{
    /**
     * Implement change price, save it in database
     *     and redirect to the catalog product page.
     */
    public function indexAction()
    {
        $data = $this->getRequest()->getParams();

        if(!is_numeric($data['number']) || $data['number'] <= 0) {
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('spet_blog')
                ->__('Please enter valid value. Only positive numbers allowed.'));
            $this->_redirect('*/catalog_product/index');
        }

        $catalogModel  = Mage::getModel('catalog/product');

        foreach ($data['product'] as $product) {
            $oldPrice = $catalogModel->load($product)->getPrice();
            $number = $data['number'];

            switch ($data['expression']) {
                case 'sum':
                    $priceToSave = $oldPrice + $number;
                    break;
                case 'sub':
                    $priceToSave = $oldPrice - $number;
                    break;
                case 'sumPercent':
                    $priceToSave = $oldPrice + ($oldPrice * $number/100);
                    break;
                case 'subPercent':
                    $priceToSave = $oldPrice - ($oldPrice * $number/100);
                    break;
                case 'multiply':
                    $priceToSave = $oldPrice * $number;
                    break;
            }

            $catalogModel->setPrice($priceToSave)->save();
        }

        Mage::getSingleton('adminhtml/session')->addSuccess(
            Mage::helper('spet_blog')->__('Price of %d record(s) were changed.', count($data['product']))
        );
        $this->_redirect('*/catalog_product/index');
    }
}
