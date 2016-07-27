<?php

class Spet_Blog_Model_Articles extends Mage_Core_Model_Abstract
{
    /**
     * Resource initialization.
     */
    protected function _construct()
    {
        $this->_init('blog/articles');
    }

    /**
     * Get all posts from database.
     *
     * @return object $posts
     */
    public function getAllPosts($orderBy = null)
    {
        $posts = Mage::getModel('blog/articles')->getCollection()->setOrder($orderBy['subject'], $orderBy['method']);
        $posts->getSelect()->join(array('ce' => 'customer_entity'), 'ce.entity_id = author_id');
        $posts->getSelect()->join(array('ce1' => 'customer_entity_varchar'),
                             'ce1.entity_id = author_id AND ce1.attribute_id = 5', 'ce1.value as name');
        $posts->getSelect()->join(array('ce2' => 'customer_entity_varchar'),
                             'ce2.entity_id = author_id AND ce2.attribute_id = 7', 'ce2.value as lname');
        return $posts;
    }

    /**
     * Get all posts from database.
     *
     * @return object $posts
     */
    public function getProducts($id)
    {
        $entityId = Mage::getModel('blog/articles')->getCollection()->addFieldToFilter('blogpost_id', $id);
        $entityId->getSelect()->join(array('pap' => 'products_and_posts'), "pap.post_id = $id");
        $dataArray = $entityId->getData();
        for($i = 0; $i < count($dataArray); $i++) {
            $arrayEntityId[] = $dataArray[$i]['product_id'];
        }
        $products = Mage::getModel('catalog/product')->getCollection()
            ->addFieldToFilter('entity_id', $arrayEntityId)
            ->addAttributeToSelect(['id',
                                    'name',
                                    'short_description',
                                    'product_url',
                                    'image',
                                    'price',
                                    'url_id',
                                    'special_price']);
        return $products;
    }

    /**
     * Get single post from database.
     *
     * @param array $params
     * @return mixed $blogpost
     */
    public function getSinglePost($params)
    {
        if(!empty($params['id'])) {
            $blogpost = Mage::getModel('blog/articles');
            $blogpost->load($params['id']);
            return $blogpost->getData();
        } else {
            return false;
        }
    }

    /**
     * Save post in database.
     *
     * @param array $data
     */
    public function savePost($data)
    {
        $userId = Mage::getModel('customer/session')->getId();

        if(empty($data['blogpost_id'])) {
            $data['author_id'] = $userId;
            $this->_savePostInDataBase($data);
        } else {
            $authorId = $this->load($data['blogpost_id'])->getAuthorId();
            if($authorId == $userId) {
                $data['author_id'] = $userId;
                $this->_savePostInDataBase($data);
            }
        }
        $this->redirectToAllPosts();
    }

    /**
     * Delete post from database.
     *
     * @param $id
     */
    public function deletePost($id)
    {
        $this->load($id);
        $this->deletePhoto($this->getImage());
        $this->delete();
        $this->redirectToAllPosts();
    }

    /**
     * Redirect to main posts page.
     */
    public function redirectToAllPosts()
    {
        $url = '/blog/articles';
        Mage::app()->getFrontController()->getResponse()->setRedirect($url);
    }

    /**
     *
     * Check users authorization,
     * if 'true' show 'Edit post' and 'Delete' buttons
     * only if this user is author this post.
     *
     * @param array $params
     * @return bool
     */
    public function checkUserAuthorization($params)
    {
        $user = Mage::getSingleton('customer/session');
        if(!isset($params['id'])) {
            return $user->isLoggedIn() ? true : false;
        } elseif($user->isLoggedIn()) {
            if($this->load($params['id'])->getAuthorId() == Mage::getModel('customer/session')->getId()) {
                return true;
            } else {
                return false;
            }
        }
    }

    /**
     * Delete photo if checked it in edit form.
     *
     * @param mixed $file
     */
    public function deletePhoto($file)
    {
        if(is_array($file)) {
            $fileFromDataBase = $this->load($file['blogpost_id'])->getImage();
            $this->load($file['blogpost_id'])->setImage(null);
            $this->save();
            $file = $fileFromDataBase;
        }
        $path = Mage::getBaseDir('media') . DS . 'blog/' . $file;
        if(!is_dir($path) && file_exists($path)) {
            unlink($path);
        }
    }

    /**
     * Set data from form and save it in database.
     *
     * @param array $data
     */
    private function _savePostInDataBase($data)
    {
        $this->setAuthorId($data['author_id']);
        $this->setDate(date('Y-m-d H:i:s', time()));
        $this->setTitle($data['title']);
        $this->setPost(trim($data['post']));
        if(isset($data['imageName'])) {
            $this->setImage($data['imageName']);
        }
        $this->save();
    }
}