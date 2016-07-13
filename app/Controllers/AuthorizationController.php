<?php

namespace Controllers;

use Core\Controller;
use Core\View;
use Models\AuthorizationModel;

class AuthorizationController extends Controller
{
    protected $verified;
    protected $data = array();

    public function __construct()
    {
        $this->model = new AuthorizationModel();

        $this->view = new View();
    }

    public function actionIndex()
    {
        if (isset($_SESSION['validate']) && $_SESSION['validate'] == 'yes') {
            header("Location: http://interncgi.loc/Panel");
        } else {
            unset($_SESSION['validate']);
            $this->view->generate('AuthorizationView.php', 'TemplateView.php');
        }
    }

    public function actionCheckUser()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->data['email'] = $_POST['email'];
            $this->data['password'] = $_POST['password'];
            if(!isset($_POST['remember'])) {
                $this->data['remember'] = 'no';
            } else {
                $this->data['remember'] = 'yes';
            }
        }

        $this->verified = $this->model->setData($this->data);

        if($this->verified === TRUE) {
            header("Location: http://interncgi.loc/Panel");
        } else {
            header("Location: http://interncgi.loc/Authorization");
        }
    }

}