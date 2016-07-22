<?php

class Spet_TestModule_TestController extends Mage_Core_Controller_Front_Action
{
    public function helloAction() {
        $this->loadLayout();
        //$block = $this->getLayout('default')->createBlock('testmodule/testBlock')->setTemplate('test/test.phtml');

       // $this->getResponse()->setBody($block->toHtml());
        //Zend_Debug::dump($this->getLayout()->getUpdate()->getHandles());
        $this->renderLayout();
    }
}