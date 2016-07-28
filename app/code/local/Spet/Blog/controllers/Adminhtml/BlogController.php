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
        if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {
            $dataToSave = Mage::getModel('blog/articles')->savePhotoFileInDataBase($dataToSave, $_FILES);
        }

        $model = Mage::getModel('blog/articles')->load($dataToSave['blogpost_id']);
        $model->setDate(date('Y-m-d H:i:s', time()));
        $model->setTitle($dataToSave['title']);
        $model->setPost(trim($dataToSave['post']));
        if(isset($dataToSave['imageName'])) {
            $model->setImage($dataToSave['imageName']);
        }
        $model->save();

        if(!empty($dataToSave['back'])) {
            $this->_forward($dataToSave['back']);
        } else {
            $this->_forward('index');
        }
    }

    public function statusAction()
    {
        $status = $this->getRequest()->getParams();
        //var_dump($status);exit;
        $rateModel = Mage::getModel('blog/articles');
        foreach ($status['blogpost_id'] as $post) {
            $rateModel->load($post)->setStatus($status['status'])->save();
        }
        $this->_redirect('*/*/index');
    }

    public function deleteAction()
    {
        $blogpost_ids = $this->getRequest()->getParam('blogpost_id');      // $this->getMassactionBlock()->setFormFieldName('tax_id'); from Mage_Adminhtml_Block_Tax_Rate_Grid
        if(!is_array($blogpost_ids)) {
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('spet_blog')->__('Please select posts.'));
        } else {
            try {
                $rateModel = Mage::getModel('blog/articles');
                foreach ($blogpost_ids as $blogpost_id) {
                    $rateModel->load($blogpost_id)->delete();
                }
                Mage::getSingleton('adminhtml/session')->addSuccess(
                    Mage::helper('spet_blog')->__(
                        'Total of %d record(s) were deleted.', count($blogpost_ids)
                    )
                );
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
        }

        $this->_redirect('*/*/index');
    }

    public function gridAction()
    {
        $this->loadLayout();
        $this->getResponse()->setBody(
            $this->getLayout()->createBlock('spet_blog/adminhtml_blog_grid')->toHtml()
        );
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