<?php
class Spet_Blog_Block_Adminhtml_Renderer_Status extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $row)
    {
        if($row->getStatus() == 1) {
            return 'On';
        } else {
            return 'Off';
        }
    }
}