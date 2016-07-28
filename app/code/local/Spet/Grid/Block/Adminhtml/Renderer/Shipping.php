<?php
class Spet_Grid_Block_Adminhtml_Renderer_Shipping extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $row)
    {
        $str =  $row->getShippingMethod();
        return $str;
    }
}