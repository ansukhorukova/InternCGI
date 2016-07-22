<?php

class Spet_Blog_Block_Articles extends Mage_Core_Block_Template
{
    /**
     * Get all posts and show them.
     */
    public function getAllPosts()
    {
        $orderBy = $this->getRequest()->getParams();
        if(empty($orderBy)) {
            $orderBy['subject'] = 'lname';
            $orderBy['method'] = 'ASC';
        }
        $posts = Mage::getModel('blog/articles')->getAllPosts($orderBy);
        return $posts;
    }

    /**
     * Get single post and show it.
     */
    public function getSinglePost()
    {
        $params = $this->getRequest()->getParams();
        $post = Mage::getModel('blog/articles')->getSinglePost($params);
        return $post;
    }

    /**
     * Check users authorization,
     * if 'true' show 'Edit post' and 'Delete' buttons
     * only if this user is author this post.
     */
    public function checkUserAuthorization()
    {
        $params = $this->getRequest()->getParams();
        return Mage::getModel('blog/articles')->checkUserAuthorization($params);
    }

    public function getPathToImage()
    {
        return '/media/blog/';
    }

    /**
     *
     *
     * @return
     */
    public function getProducts()
    {
        return Mage::getModel('blog/articles')->getProducts();
    }

   /* public function getPriceHtml($product, $displayMinimalPrice = false, $idSuffix = '', $showStuff = true)
    {
        $type_id = $product->getTypeId();
        if (Mage::helper('catalog')->canApplyMsrp($product)) {
            $realPriceHtml = $this->_preparePriceRenderer($type_id)
                ->setProduct($product)
                ->setDisplayMinimalPrice($displayMinimalPrice)
                ->setIdSuffix($idSuffix)
                ->setShowStuff($showStuff) //add this line
                ->toHtml();
            $product->setAddToCartUrl($this->getAddToCartUrl($product));
            $product->setRealPriceHtml($realPriceHtml);
            $type_id = $this->_mapRenderer;
        }
        return $this->_preparePriceRenderer($type_id)
            ->setProduct($product)
            ->setDisplayMinimalPrice($displayMinimalPrice)
            ->setIdSuffix($idSuffix)
            ->setShowStuff($showStuff) //add this line
            ->toHtml();
    }*/

}