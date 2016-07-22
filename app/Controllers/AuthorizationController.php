<?php

namespace Controllers;

use Core\Controller;
use Models\AuthorizationModel;

class AuthorizationController extends Controller
{
    protected $verified;
    protected $data = array();


    /**
     * Get authorization page.
     */
    public function actionIndex()
    {

        if (isset($_SESSION['validate']) && $_SESSION['validate'] == 'yes') {
                header("Location: /panel/index");
        } else {
            unset($_SESSION['validate']);
            $this->view->generate('AuthorizationView.php', 'TemplateView.php');
        }
    }

    /**
     * Check users and redirect them to the panel.
     */
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

        $this->model = new AuthorizationModel();
        $this->verified = $this->model->setData($this->data);

        if($this->verified === TRUE) {
            header("Location: /panel/index?page=1&subject=name&method=ASC&onPage=15");
        } else {
            header("Location: /authorization");
        }
    }

}