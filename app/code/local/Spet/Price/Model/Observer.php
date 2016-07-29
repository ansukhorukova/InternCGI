<?php

class Spet_Price_Model_Observer
{
    /**
     * Observer executed at the event when opened catalog product page.
     *    Adds new mass action, and redirects to executable controller.
     *
     * @param resource $observer
     */
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

    /**
     * Get array of options to change price.
     *
     * @return array $options.
     */
    public function getOptionArray()
    {
        $options = [
            'sum'        => '+ n',
            'sub'        => '- n',
            'sumPercent' => '+ n%',
            'subPercent' => '- n%',
            'multiply'   => '* n'
        ];

        return $options;
    }
}
