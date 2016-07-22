<?php

namespace Core;

class View
{
    /**
     * Generate page view.
     *
     * @param $contentView
     * @param $templateView
     * @param null $data
     */
    public function generate($contentView, $templateView, $data = null)
    {
       include 'app/Views/' . $templateView;
    }
}