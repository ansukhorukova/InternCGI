<?php

class Spet_Blog_ArticlesController extends Mage_Core_Controller_Front_Action
{
    /**
     * Get all posts.
     */
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }
}
