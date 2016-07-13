<?php

namespace Controllers;

use Core\Controller;

class PanelController extends Controller
{
    public function actionIndex()
    {
        $callbackUrl = "http://interncgi.loc/Panel";
        $temporaryCredentialsRequestUrl = "http://magento1.loc/oauth/initiate?oauth_callback=" . urlencode
            ($callbackUrl);
        $adminAuthorizationUrl = 'http://magento1.loc/oauth/authorize';
        $accessTokenRequestUrl = 'http://magento1.loc/oauth/token';
        $apiUrl = 'http://magento1.loc/api/rest';
        $consumerKey = '287da3f611821e7c523fbfa56045e0f3';
        $consumerSecret = '913cc4a692ed337bd93ce94e554f8837';

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
                $resourceUrl = "$apiUrl/products";
                $oauthClient->fetch($resourceUrl, array(), 'GET',
                                        array("Content-Type" => "application/json","Accept" => "*/*"));
                //$oauthClient->fetch($resourceUrl);
                $productsList = json_decode($oauthClient->getLastResponse());
                var_dump($productsList);
            }
        } catch (\OAuthException $e) {
            print_r($e);
        }

        $this->view->generate('PanelView.php', 'TemplateView.php');
    }

    public function actionLogOut()
    {
        unset($_SESSION['validate']);
        header("Location: http://interncgi.loc/");
    }
}