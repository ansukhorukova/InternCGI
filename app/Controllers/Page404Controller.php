<?php

namespace Controllers;

use Core\Controller;
use Core\View;

class Page404Controller extends Controller
{
    public function __construct()
    {
        $this->view = new View();
    }

    public function actionIndex()
    {
        $this->view->generate('Page404View.php', 'TemplateView.php');
    }

}