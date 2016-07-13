<?php

namespace Controllers;

use Core\Controller;

class PanelController extends Controller
{
    protected $_url;
    protected $_page;
    protected $_limit;

    public function actionIndex()
    {
        $this->view->generate('PanelView.php', 'TemplateView.php');
    }

    public function actionGetMageUrl()
    {
        if(isset($_POST['mageUrl'])) {
            $_SESSION['mageUrl'] = $_POST['mageUrl'];
            header("Location: http://interncgi.loc/Panel/GetProducts");
        } else {
            header("Location: http://interncgi.loc/Panel");
        }
    }

    public function actionGetProducts()
    {
        $this->_url = $_SESSION['mageUrl'];
        $this->_page = 1;
        $this->_limit = 0;

        $callbackUrl = "http://interncgi.loc/Panel/GetProducts";
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
                var_dump($productsList);
            }
        } catch (\OAuthException $e) {
            print_r($e);
        }
    }

    public function actionLogOut()
    {
        unset($_SESSION);
        header("Location: http://interncgi.loc/");
    }
}