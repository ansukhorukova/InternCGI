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
        Mage::register('blog', $data);
        $this->loadLayout();
        $this->_setActiveMenu('spet_blog');
        $this->_addContent($this->getLayout()->createBlock('spet_blog/adminhtml_blog_edit'));
        //$this->_addContent($this->getLayout()->createBlock('spet_blog/adminhtml_blog_edit_form'));
        $this->renderLayout();
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