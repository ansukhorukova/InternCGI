<?php

namespace Controllers;

use Core\Controller;

class PanelController extends Controller
{
    public function actionIndex()
    {
        $this->view->generate('PanelView.php', 'TemplateView.php');
    }
}