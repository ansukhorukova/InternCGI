<?php
class Spet_Blog_Block_Adminhtml_Renderer_Image extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $row)
    {
        return "<img src='" . Mage::getBaseUrl('media') . $row->getImage() . "' style='width: 400px; height: 200px'>";
    }
}