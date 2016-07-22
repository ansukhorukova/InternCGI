<?php

namespace Controllers;

use Core\Controller;

class MainController extends Controller
{
    /**
     * Generate main page of app.
     */
    public function actionIndex()
    {
        $this->view->generate('MainView.php', 'TemplateView.php');
    }
}