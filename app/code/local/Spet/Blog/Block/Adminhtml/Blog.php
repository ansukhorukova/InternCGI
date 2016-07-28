<?php

class Spet_Blog_Block_Adminhtml_Blog extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'spet_blog';
        $this->_controller = 'adminhtml_blog';
        $this->_headerText = Mage::helper('spet_blog')->__('Blog');

        parent::__construct();

//        $this->_addButton('save', array(
//            'label' => Mage::helper('adminhtml')->__('Save Edit'),
//            'onclick'   => 'saveEdit()',
//            'class'     => 'save',
//        ));
    }
}