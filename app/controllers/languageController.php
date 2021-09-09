<?php

namespace PHPMVC\Controllers;

use PHPMVC\LIB\Helper;

class languageController extends AbstractController
{
    use Helper;

    public function defaultAction()
    {
        if($_SESSION['language'] == 'arabic')
        {
            $_SESSION['language'] = 'english';
        }
        else
        {
            $_SESSION['language'] = 'arabic';
        }
        $this->redirect($_SERVER['HTTP_REFERER']);
    }
}