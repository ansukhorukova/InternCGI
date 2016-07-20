<?php

namespace Controllers;

use Core\Controller;
use Models\PanelModel;

class PanelController extends Controller
{
    protected $_model;

    /**
     * Main action, implements render main page.
     */
    public function actionIndex()
    {

        if(empty($_GET['subject']) && empty($_GET['method'])) {
            $orderBy['subject'] = 'name';
            $orderBy['method'] = 'ASC';
        } else {
            $orderBy['subject'] = htmlspecialchars($_GET['subject']);
            $orderBy['method'] = htmlspecialchars($_GET['method']);
        }
        $this->_model = new PanelModel();
        $data = $this->_model->getDataFromDataBase(null, 15, $orderBy);
        $this->view->generate('PanelView.php', 'TemplateView.php', $data);
    }

    /**
     * Get remote magento url
     */
    public function actionGetMageUrl()
    {
        if(isset($_POST['mageUrl'])) {
            $_SESSION['mageUrl'] = $_POST['mageUrl'];
            header("Location: http://interncgi.loc/panel/getProducts");
        } else {
            header("Location: http://interncgi.loc/panel");
        }
    }

    /**
     * Get product edit page
     */
    public function actionEdit()
    {
        if(isset($_GET['id'])) {
            $id = abs($_GET['id']);
            $this->_model = new PanelModel();
            $data = $this->_model->getLineFromDataBase($id);
            $this->view->generate('PanelEditView.php', 'TemplateView.php', $data);
        }
    }

    /**
     * Get data from panel after editing and save it in database.
     */
    public function actionSave()
    {
        if(isset($_GET['id']) && isset($_GET['save'])) {
            $id = abs($_GET['id']);
            $data['sku'] = $_POST['sku'];
            $data['description'] = $_POST['description'];
            $data['name'] = $_POST['name'];
            $data['final_price_with_tax'] = $_POST['final_price_with_tax'];
            $data['is_saleable'] = $_POST['is_saleable'];
            $this->_model = new PanelModel();
            $this->_model->updateProduct($id, $data);
            header("Location: http://interncgi.loc/panel");
        }
    }

    /**
     * Get products from magento Rest API
     */
    public function actionGetProducts()
    {
        $this->_url = $_SESSION['mageUrl'];
        $this->_page = 1;
        $this->_limit = 0;

        $callbackUrl = "http://interncgi.loc/panel/getProducts";
        $temporaryCredentialsRequestUrl = "http://{$this->_url}/oauth/initiate?oauth_callback=" . urlencode
            ($callbackUrl);
        $adminAuthorizationUrl = "http://{$this->_url}/oauth/authorize";
        $accessTokenRequestUrl = "http://{$this->_url}/oauth/token";
        $apiUrl = "http://{$this->_url}/api/rest";
        $consumerKey = '2ca734828a4a6ddfa1e324aa946d6944';
        $consumerSecret = '2db53b6ba7c39778cc7630b9cf68539d';

        if (!isset($_GET['oauth_token']) && isset($_SESSION['state']) && $_SESSION['state'] == 1) {
            $_SESSION['state'] = 0;
        }
        try {
            $authType = ($_SESSION['state'] == 2) ? OAUTH_AUTH_TYPE_AUTHORIZATION : OAUTH_AUTH_TYPE_URI;
            $oauthClient = new \OAuth($consumerKey, $consumerSecret, OAUTH_SIG_METHOD_HMACSHA1, $authType);
            $oauthClient->enableDebug();

            if (!isset($_GET['oauth_token']) && !$_SESSION['state']) {
                $requestToken = $oauthClient->getRequestToken($temporaryCredentialsRequestUrl);
                $_SESSION['secret'] = $requestToken['oauth_token_secret'];
                $_SESSION['state'] = 1;
                header('Location: ' . $adminAuthorizationUrl . '?oauth_token=' . $requestToken['oauth_token']);
                exit;
            } else if ($_SESSION['state'] == 1) {
                $oauthClient->setToken($_GET['oauth_token'], $_SESSION['secret']);
                $accessToken = $oauthClient->getAccessToken($accessTokenRequestUrl);
                $_SESSION['state'] = 2;
                $_SESSION['token'] = $accessToken['oauth_token'];
                $_SESSION['secret'] = $accessToken['oauth_token_secret'];
                header('Location: ' . $callbackUrl);
                exit;
            } else {
                $oauthClient->setToken($_SESSION['token'], $_SESSION['secret']);
                $resourceUrl = "$apiUrl/products?page=$this->_page&limit=$this->_limit";
                //$resourceUrl = "$apiUrl/products";
                $oauthClient->fetch($resourceUrl, array(), 'GET',
                    array("Content-Type" => "application/json","Accept" => "*/*"));
                //$oauthClient->fetch($resourceUrl);

                $productsList = json_decode($oauthClient->getLastResponse());
                $this->_model = new PanelModel();
                $this->_model->workWithDataInDataBase($productsList, $this->_page, $this->_limit);
                header("Location: http://interncgi.loc/panel");
            }
        } catch (\OAuthException $e) {
            print_r($e);
        }
    }

    public function actionLogOut()
    {
        unset($_SESSION['validate']);

        header("Location: http://interncgi.loc/");
    }
}