<?php

class Spet_Blog_Model_BlogConfig
{
    public function toOptionArray()
    {
        return array(
            array('value'=>1, 'label'=>Mage::helper('spet_blog')->__('Hello')),
            array('value'=>2, 'label'=>Mage::helper('spet_blog')->__('Goodbye')),
            array('value'=>3, 'label'=>Mage::helper('spet_blog')->__('Yes')),
            array('value'=>4, 'label'=>Mage::helper('spet_blog')->__('No')),
        );
    }
}