<?php

namespace Controllers;

use Core\Controller;
use Lib\SortBy;
use Models\ProductModel;
use Models\ConnectToDataBaseModel as connect;
use Lib\Validate;

class PanelController extends Controller
{
    protected $_model;

    /**
     * Main action, implements render main page.
     */
    public function actionIndex()
    {
        if(($_SESSION['validate'] == 'no') || empty($_SESSION['validate'])) {
            header("Location: http://interncgi.loc/");
        } else {
            $sort = new SortBy();
            $orderBy = $sort->sortBy($_GET);

            $this->_getNumberPagesToPaginator();
            $this->_model = new ProductModel($this->_connectToDataBase());
            $data = $this->_model->getDataFromDataBase($_SESSION['page'], $_SESSION['onPage'], $orderBy);
            $this->view->generate('PanelView.php', 'TemplateView.php', $data);
        }
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
            $this->_model = new ProductModel($this->_connectToDataBase());
            $data = $this->_model->getRowData($id);
            $this->view->generate('PanelEditView.php', 'TemplateView.php', $data);
        }
    }

    /**
     * Get data from panel after editing and save it in database.
     */
    public function actionSave()
    {
        $validate = new Validate();

        if(isset($_GET['id']) && isset($_GET['save'])) {
            $id = abs($validate->validateClear($_GET['id']));
            $data['sku'] = $validate->validateSku($validate->validateClear($_POST['sku']));
            $data['description'] = $validate
                                   ->validateLength($validate
                                   ->validateClear($_POST['description']));
            $data['name'] = $validate->validateLength($validate->validateClear($_POST['name']));
            $data['final_price_with_tax'] = $validate
                                            ->validatePrice($validate
                                            ->validateClear($_POST['final_price_with_tax']));
            if(empty($_POST['is_saleable'])) {
                $data['is_saleable'] = false;
            } else {
                $data['is_saleable'] = $validate->validateIsSaleable($_POST['is_saleable']);
            }

            if(true === ($validation = $validate->validateAll($data))) {
                $this->_model = new ProductModel($this->_connectToDataBase());
                $this->_model->updateProduct($id, $data);

                header("Location: http://interncgi.loc/panel/index");
            } else {
                $this->view->generate('PanelEditView.php', 'TemplateView.php', $validation);
            }

        }
    }

    /**
     * Get products from magento Rest API
     */
    public function actionGetProducts()
    {
        $url = $_SESSION['mageUrl'];
        $page = 1;
        $limit = 0;

        $callbackUrl = "http://interncgi.loc/panel/getProducts";
        $temporaryCredentialsRequestUrl = "http://{$url}/oauth/initiate?oauth_callback=" . urlencode
            ($callbackUrl);
        $adminAuthorizationUrl = "http://{$url}/oauth/authorize";
        $accessTokenRequestUrl = "http://{$url}/oauth/token";
        $apiUrl = "http://{$url}/api/rest";
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
                $resourceUrl = "$apiUrl/products?page=$page&limit=$limit";
                //$resourceUrl = "$apiUrl/products";
                $oauthClient->fetch($resourceUrl, array(), 'GET',
                    array("Content-Type" => "application/json","Accept" => "*/*"));
                //$oauthClient->fetch($resourceUrl);

                $productsList = json_decode($oauthClient->getLastResponse());
                $this->_model = new ProductModel($this->_connectToDataBase());
                $productsList = array_values($this->_objectToArray($productsList));
                if(true == $this->_model->setDataInDataBase($productsList)) {
                    $this->_model->getDataFromDataBase();
                }
                header("Location: http://interncgi.loc/panel");
            }
        } catch (\OAuthException $e) {
            print_r($e);
        }
    }

    /**
     * Log out from panel.
     */
    public function actionLogOut()
    {
        unset($_SESSION['validate']);
        session_destroy();
        setcookie('PHPSESSID', '');

        header("Location: http://interncgi.loc/");
    }

    /**
     * Get connect to database.
     *
     * @return object $dbh
     */
    private function _connectToDataBase()
    {
        $connect = connect::getInstance();
        $dbh = $connect->getConnectToDataBase();
        return $dbh;
    }

    /**
     * Convert object from magento REST API to array.
     *
     * @param $obj
     * @return array
     */
    private function _objectToArray($obj) {
        if(is_object($obj)) $obj = (array) $obj;
        if(is_array($obj)) {
            $new = array();
            foreach($obj as $key => $val) {
                $new[$key] = $this->_objectToArray($val);
            }
        }
        else $new = $obj;
        return $new;
    }

    /**
     * Get number of page for pagination.
     */
    private function _getNumberPagesToPaginator()
    {
        $numberRowsInDataBase = $this->_countRowsInDataBase();
        $_SESSION['numberPages'] = round($numberRowsInDataBase/$_SESSION['onPage'], 0, PHP_ROUND_HALF_UP);
    }

    /**
     * Count all rows in database.
     *
     * @return int $count.
     */
    private function _countRowsInDataBase()
    {
        $this->_model = new ProductModel($this->_connectToDataBase());
        $data = $this->_model->getDataFromDataBase();
        $count = count($data);
        return $count;
    }
}
