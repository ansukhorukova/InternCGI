<?php

class Spet_Price_Model_Observer
{
    public function addMassActionToCatalogProduct($observer)
    {
        $block = $observer->getEvent()->getBlock();
        if(get_class($block) =='Mage_Adminhtml_Block_Widget_Grid_Massaction'
            && $block->getRequest()->getControllerName() == 'catalog_product')
        {
            $statuses = $this->getOptionArray();

            $block->addItem('price', array(
                'label' => 'Change price',
                'url' => Mage::app()->getStore()->getUrl('adminhtml/price/index'),
                'additional' => array(
                    'expression' => array(
                        'name'   => 'expression',
                        'type'   => 'select',
                        'class'  => 'required-entry',
                        'label'  => 'Expression',
                        'values' => $statuses
                    ),
                    'number' => array(
                        'name'  => 'number',
                        'type'  => 'text',
                        'class' => 'required-entry',
                        'label' => 'Value'
                    )
            )));
        }

    }

    public function getOptionArray()
    {
        $array['sum'] = '+ n';
        $array['sub'] = '- n';
        $array['sumPercent'] = '+ n%';
        $array['subPercent'] = '- n%';
        $array['multiply'] = '* n';
        return $array;
    }
}
