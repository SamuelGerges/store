<?php

namespace PHPMVC\Controllers;

class NotFoundController extends AbstractController
{
    public function notFoundAction()
    {
        $this->_language->load('template.common');
        $this->__view();

    }
}