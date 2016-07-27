<?php
/**
 * @category   MagePsycho
 * @package    MagePsycho_Gridextend
 * @author     magepsycho@gmail.com
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Spet_Grid_Model_Observer {

    /**
     * Moved to Block class
     * @param Varien_Event_Observer $observer
     */
    public function coreBlockAbstractToHtmlBefore(Varien_Event_Observer $observer)
    {
        /** @var $block Mage_Core_Block_Abstract */
        $block = $observer->getEvent()->getBlock();
        if ($block->getId() == 'sales_order_grid') {

            //add new column: payment method
            $shippingArray = Mage::getSingleton('shipping/config')->getActiveCarriers();
            $shippingMethods = array();
            foreach ($shippingArray as $code => $shipping) {
                // not sure why ops_dl was not in the loop so tweaked it
                $shippingTitle = Mage::getStoreConfig('carriers/'.$code.'/title');
                $shippingMethods[$code] = $shippingTitle;
            }

            $block->addColumnAfter(
                'shipping_method',
                array(
                    'header'   => Mage::helper('sales')->__('Shipping Method'),
                    'align'    => 'left',
                    'type'     => 'options',
                    'options'  => $shippingMethods,
                    'index'    => 'shipping_method',
                    'filter_index'    => 'shipping_method',
                ),
                'shipping_name'
            );

            //similary you can addd new columns
            //...

            // Set the new columns order.. otherwise our column would be the last one
            $block->sortColumnsByOrder();
        }
    }

    /**
     * Moved to block class
     * @param Varien_Event_Observer $observer
     */
    public function salesOrderGridCollectionLoadBefore(Varien_Event_Observer $observer)
    {
        $collection = $observer->getOrderGridCollection();
        $select = $collection->getSelect();

        $select->joinLeft(array('shipping' => 'sales_flat_order'), 'shipping.entity_id = main_table.entity_id',array('shipping_method' => 'shipping_description'));
    }
}