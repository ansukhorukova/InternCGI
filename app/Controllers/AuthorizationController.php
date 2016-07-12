<?php

namespace Controllers;

use Core\Controller;
use Core\View;

class AuthorizationController extends Controller
{
    public function __construct()
    {
        $this->view = new View();
    }

    public function actionIndex()
    {
        $this->view->generate('AuthorizationView.php', 'TemplateView.php');
    }

}