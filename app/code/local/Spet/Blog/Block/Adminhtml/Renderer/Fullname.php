<?php
class Spet_Blog_Block_Adminhtml_Renderer_Fullname extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $row)
    {
        $str =  $row->getFirstName() . ' ' . $row->getLastName();
        return $str;
    }
}