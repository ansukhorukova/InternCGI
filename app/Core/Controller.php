<?php

namespace Core;

class Controller
{
    public $model;
    public $view;

    public function __construct()
    {
        session_start();
        $this->view = new View();
    }

    public function actionIndex()
    {
        
    }
}