<?php

class Spet_Blog_Adminhtml_BlogController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->_title($this->__('Blog'));
        $this->loadLayout();
        $this->_setActiveMenu('spet_blog');
        $this->_addContent($this->getLayout()->createBlock('spet_blog/adminhtml_blog'));
        $this->renderLayout();
    }

    public function editAction()
    {
        $this->_title($this->__('Edit'));
        $params = $this->getRequest()->getParams();
        $data = Mage::getModel('blog/articles')->load($params['blogpost_id']);
        $products = Mage::getModel('blog/articles')->getProductsToAdmin();
        Mage::register('blog', $data);
        Mage::register('products', $products);
        $this->loadLayout();
        $this->_setActiveMenu('spet_blog');
        $this->_addContent($this->getLayout()->createBlock('spet_blog/adminhtml_blog_edit'));
        $this->renderLayout();
    }

    public function saveAction()
    {
        $dataToSave = $this->getRequest()->getParams();
        $dataToSave['blogpost_id'] = $dataToSave['id'];
        unset ($dataToSave['id']);
        if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {
            $dataToSave = Mage::getModel('blog/articles')->savePhotoFileInDataBase($dataToSave, $_FILES);
        }
//        var_dump($dataToSave);
//        var_dump($_FILES);exit;

        $model = Mage::getModel('blog/articles')->load($dataToSave['blogpost_id']);
        $model->setDate(date('Y-m-d H:i:s', time()));
        $model->setTitle($dataToSave['title']);
        $model->setPost(trim($dataToSave['post']));
        if(isset($dataToSave['imageName'])) {
            $model->setImage($dataToSave['imageName']);
        }
        $model->save();
        $this->_forward('index');


    }

    public function exportSpetCsvAction()
    {
        $fileName = 'blog_spet.csv';
        $grid = $this->getLayout()->createBlock('spet_blog/adminhtml_blog_grid');
        $this->_prepareDownloadResponse($fileName, $grid->getCsvFile());
    }

    public function exportSpetExcelAction()
    {
        $fileName = 'blog_spet.xml';
        $grid = $this->getLayout()->createBlock('spet_blog/adminhtml_blog_grid');
        $this->_prepareDownloadResponse($fileName, $grid->getExcelFile($fileName));
    }
}