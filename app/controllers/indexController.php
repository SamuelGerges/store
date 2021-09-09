<?php
namespace PHPMVC\Controllers;


class IndexController extends AbstractController
{
    public function defaultAction()
    {
        $this->_language->load('template.common');
        $this->_language->load('index.default');
        $this->__view();

    }

    public function addAction ()
    {
        $this->__view();
    }

}
