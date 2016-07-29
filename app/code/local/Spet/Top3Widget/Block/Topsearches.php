<?php

class Spet_Top3Widget_Block_Topsearches extends Mage_Core_Block_Template implements Mage_Widget_Block_Interface
{
    protected function _toHtml()
    {
        $searchCollection = Mage::getModel('catalog/product')
                                ->getCollection()
            ->addFieldToFilter('is_top', 1)
            ->addAttributeToSelect(['is_top',
                'name']);

        var_dump($this->getData());

        foreach ($searchCollection as $product) {
            var_dump($product->getName());
            var_dump($product->getIsTop());
        }



        $html = '<div id="widget-topsearches-container">';
        $html .= '<div class="block-title"><strong>' . $this->getData('widget_title') . '</strong></div>';
        foreach ($searchCollection as $search) {
            $html .= '<div class="widget-topsearches-searchtext">' . $search->query_text . "</div>";
        }
        $html .= '</div>';
        return $html;
    }
}