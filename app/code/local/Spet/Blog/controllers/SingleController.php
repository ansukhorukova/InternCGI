<?php

class Spet_Blog_SingleController extends Mage_Core_Controller_Front_Action
{
    /**
     * Get single post.
     */
    public function singleAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }


    /**
     * Get 'edit' post page
     */
    public function postAction()
    {
        $this->checkAuthorization();
    }

    /**
     * Save post
     */
    public function saveAction()
    {
        $dataToSavePost = $this->getRequest()->getPost();

        if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {
            $dataToSavePost = Mage::getModel('blog/articles')->savePhotoFileInDataBase($dataToSavePost, $_FILES);
        }

        if(!isset($dataToSavePost['author_id']) && !isset($dataToSavePost['blogpost_id'])) {
            $dataToSavePost['author_id'] = Mage::getModel('customer/session')->getId();
        }

        Mage::getModel('blog/articles')->savePost($dataToSavePost);
    }

    /**
     * Delete post
     */
    public function deleteAction()
    {
        $id = $this->getRequest()->getPost();
        if(Mage::getModel('blog/articles')->checkUserAuthorization(array('id' => $id))) {
            Mage::getModel('blog/articles')->deletePost($id);
        } else {
            Mage::getModel('blog/articles')->redirectToAllPosts();
        }
    }

    /**
     * Check users authorization
     */
    public function checkAuthorization()
    {
        if(Mage::getSingleton('customer/session')->isLoggedIn()) {
            $this->loadLayout();
            $this->renderLayout();
        } else {
            Mage::getModel('blog/articles')->redirectToAllPosts();
        }
    }
}
