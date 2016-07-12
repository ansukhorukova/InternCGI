<?php

namespace Controllers;

use Core\Controller;

class MainController extends Controller
{
    public function actionIndex()
    {
        $this->view->generate('MainView.php', 'TemplateView.php');
    }
}