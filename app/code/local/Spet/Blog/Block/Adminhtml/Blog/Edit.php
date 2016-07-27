<?php
class Spet_Blog_Block_Adminhtml_Blog_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
        $this->_objectId = 'blockpost_id';
        $this->_blockGroup = 'spet_blog';
        $this->_controller = 'adminhtml_blog';
        $this->_mode = 'edit';

        $this->_addButton('save_and_continue', array(
            'label' => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick' => 'saveAndContinueEdit()',
            'class' => 'save',
        ), -100);
        $this->_updateButton('save', 'label', Mage::helper('spet_blog')->__('Save Example'));

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('form_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'edit_form');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'edit_form');
                }
            }
 
            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";



    }
    public function getHeaderText()
    {
        if (Mage::registry('blog') && Mage::registry('blog')->getBlogpostId())
        {
            return Mage::helper('spet_blog')->__('Edit post: "%s"', $this->htmlEscape(Mage::registry('blog')->getTitle()));
        } else {
            return Mage::helper('spet_blog')->__('New Example');
        }
    }

}
