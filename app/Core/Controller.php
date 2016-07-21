<?php

namespace Core;

abstract class Controller
{
    public $model;
    public $view;

    public function __construct()
    {
        session_start();
        $this->view = new View();
    }

    abstract  public function actionIndex();
}