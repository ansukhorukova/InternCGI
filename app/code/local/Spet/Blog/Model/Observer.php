<?php

class Spet_Blog_Model_Observer
{
    public function showStatus(Varien_Event_Observer $observer)
    {
        $status = $observer->getEvent()->getOrder();

        Mage::getModel('blog/options')->getOptions($status);

    }
}