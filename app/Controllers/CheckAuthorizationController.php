<?php

namespace Controllers;

use Core\Controller;
use Core\View;
use Models\AuthorizationModel;

class CheckAuthorizationController extends Controller
{
    protected $verified;
    protected $data = array();
    
    public function __construct()
    {
        $this->model = new AuthorizationModel();

        $this->view = new View();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->data['email'] = $_POST['email'];
            $this->data['password'] = $_POST['password'];
            if(!isset($_POST['remember'])) {
                $this->data['remember'] = null;
            } else {
                $this->data['remember'] = true;
            }
        }
    }

    public function actionIndex()
    {
        $this->verified = $this->model->setData($this->data);

        if($this->verified === TRUE) {
            header("Location: Panel");
        } else {
            header("Location: Authorization");
        }
    }
}