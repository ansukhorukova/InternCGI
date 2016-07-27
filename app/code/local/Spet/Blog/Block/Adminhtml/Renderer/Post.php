<?php
class Spet_Blog_Block_Adminhtml_Renderer_Post extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $row)
    {
        return substr($row->getPost(), 0, 250) . '...';
    }
}