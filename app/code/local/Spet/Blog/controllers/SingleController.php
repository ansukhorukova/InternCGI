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

        if(isset($dataToSavePost['delete_photo']) && $dataToSavePost['delete_photo'] == 'on') {
            Mage::getModel('blog/articles')->deletePhoto($dataToSavePost);
        }

        if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {
            try {
                $fileName = $_FILES['image']['name'];
                $fileExt = strtolower(substr(strrchr($fileName, ".") ,1));
                $fileNameWithOutExtension = rtrim($fileName, $fileExt);
                $fileName = $fileNameWithOutExtension . time() . '.' . $fileExt;
                $dataToSavePost['imageName'] = $fileName;

                $uploader = new Varien_File_Uploader('image');
                //add more file types you want to allow
                $uploader->setAllowedExtensions(array('jpg', 'png', 'gif'));
                $uploader->setAllowRenameFiles(false);
                $uploader->setFilesDispersion(false);
                $path = Mage::getBaseDir('media') . DS . 'blog';
                if(!is_dir($path)){
                    mkdir($path, 0777, true);
                }
                $uploader->save($path . DS, $fileName );

            } catch (Exception $e) {
                Mage::getSingleton('customer/session')->addError($e->getMessage());
                $error = true;
            }
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
