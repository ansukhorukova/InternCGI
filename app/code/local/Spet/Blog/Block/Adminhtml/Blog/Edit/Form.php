<?php

class Spet_Blog_Block_Adminhtml_Blog_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        if (Mage::getSingleton('adminhtml/session')->getExempleData()) {
            $data = Mage::getSingleton('adminhtml/session')->getExempleData();
            Mage::getSingleton('adminhtml/session')->getExempleData(null);
        } elseif (Mage::registry('blog') && Mage::registry('products')) {
            $data = Mage::registry('blog')->getData();
            $products = Mage::registry('products');
        } else {
            $data = array();
        }

        $form = new Varien_Data_Form(array(
            'id' => 'edit_form',
            'action' => $this->getUrl('*/*/save', array('blogpost_id' => $this->getRequest()->getParam('blogpost_id'))),
            'method' => 'post',
            'enctype' => 'multipart/form-data',
        ));

        $form->setUseContainer(true);

        $this->setForm($form);

        $fieldset = $form->addFieldset('edit_form', array(
            'legend' => Mage::helper('spet_blog')->__('Edit post')
        ));

//        $fieldset->addField('name', 'text', array(
//            'label' 	=> Mage::helper('spet_blog')->__('Name'),
//            'class' 	=> 'required-entry',
//             'required'  => true,
//             'name'  	=> 'name',
//        ));
//
//       $fieldset->addField('lname', 'text', array(
//           'label' 	=> Mage::helper('spet_blog')->__('Last Name'),
//           'class' 	=> 'required-entry',
//           'required'  => true,
//           'name'  	=> 'lname',
//       ));

        $fieldset->addField('title', 'text', array(
           'label' 	=> Mage::helper('spet_blog')->__('Title'),
           'class' 	=> 'required-entry',
           'required'  => true,
           'name'  	=> 'title',
       ));

        $fieldset->addField('post', 'textarea', array(
           'label' 	=> Mage::helper('spet_blog')->__('Post'),
           'class' 	=> 'required-entry',
           'style' 	=> 'width: 850px; height: 500px; overflow: scroll',
           'required'  => true,
           'name'  	=> 'post',
       ));

        $fieldset->addField('image', 'image', array(
            'label' 	=> Mage::helper('spet_blog')->__('Image'),
            //'value'  	=> '<img src="' . Mage::getBaseUrl('media') . 'image">',
            'name'      => 'image'
        ));

        $fieldset->addField('products', 'multiselect', array(
            'label' 	=> Mage::helper('spet_blog')->__('Products'),
            //'required'  => true,
            'values'  	=> $this->_toOptionArray($products),
            'name'      => 'products'
        ));

        $form->setValues($data);

        return parent::_prepareForm();
    }

    protected function _toOptionArray($products)
    {
        foreach ($products as $product) {
            $productsArray[] = [
                'value' => $product->getEntityId(),
                'label' => $product->getName()
                ];
        }

        return $productsArray;
    }
}
