<?php

class Spet_Blog_Block_Adminhtml_Blog_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('spet_blog_grid');
        $this->setDefaultSort('blogpost_id');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('blog/articles')->getCollection();
        $collection->getSelect()->join(array('ce' => 'customer_entity'), 'ce.entity_id = author_id');
        $collection->getSelect()->join(array('ce1' => 'customer_entity_varchar'),
            'ce1.entity_id = author_id AND ce1.attribute_id = 5', 'ce1.value as first_name');
        $collection->getSelect()->join(array('ce2' => 'customer_entity_varchar'),
            'ce2.entity_id = author_id AND ce2.attribute_id = 7', 'ce2.value as last_name');

        $this->setCollection($collection);
        parent::_prepareCollection();
        return $this;
    }

    protected function _prepareColumns()
    {
        $helper = Mage::helper('spet_blog');

        $this->addColumn('blogpost_id', array(
            'header' => $helper->__('Post #'),
            'width'        => '10px',
            'align'     => 'center',
            'index'  => 'blogpost_id'
        ));

        $this->addColumn('title', array(
            'header'       => $helper->__('Post title'),
            'width'        => '350px',
            'index'        => 'title',
        ));

        $this->addColumn('post', array(
            'header'       => $helper->__('Post'),
            'type'         => 'text',
            'width'        => '750px',
            'index'        => 'post',
            'renderer'     => 'Spet_Blog_Block_Adminhtml_Renderer_Post'
        ));

        $this->addColumn('fullname', array(
            'header'       => $helper->__('Author'),
            'width'        => '150px',
            'filter_condition_callback' => array($this, '_nameFilter'),
            'renderer'     => 'Spet_Blog_Block_Adminhtml_Renderer_Fullname'
        ));

        $this->addColumn('image', array(
            'header'       => $helper->__('Image'),
            'align'     => 'center',
            'renderer'     => 'Spet_Blog_Block_Adminhtml_Renderer_Image'
        ));


        $this->addColumn('date', array(
            'header' => $helper->__('Created at'),
            'type'   => 'date',
            'align'     => 'center',
            'index'  => 'created_at'
        ));


        $this->addExportType('*/*/exportSpetCsv', $helper->__('CSV'));
        $this->addExportType('*/*/exportSpetExcel', $helper->__('Excel XML'));

        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('blogpost_id'=> $row->getBlogpostId()));
    }

    protected function _nameFilter($collection, $column)
    {
        if (!$value = explode(' ', $column->getFilter()->getValue()))
        {
            return $this;
        }

        for($i = 0; $i < count($value); $i++) {
            $this->getCollection()->getSelect()
                ->where( "ce1.value like ? OR ce2.value like ?"
                    , "%$value[$i]%");
        }

        return $this;
    }
}