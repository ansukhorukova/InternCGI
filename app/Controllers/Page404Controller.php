<?php

namespace Controllers;

use Core\Controller;
use Core\View;

class Page404Controller extends Controller
{
    /**
     * Generate 404 page.
     */
    public function actionIndex()
    {
        $this->view->generate('Page404View.php', 'TemplateView.php');
    }
}