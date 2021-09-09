<?php

namespace PHPMVC\Controllers;

use PHPMVC\LIB\frontController;

class AbstractController
{
    protected $_controller;
    protected $_action;
    protected $_params;


    protected $_data= [];

    protected $_template;
    protected $_language;

    public function notFoundAction()
    {
        $this->__view();
    }

    public function setController($controllerName)
    {
        $this->_controller = $controllerName;
    }

    public function setAction($actionName)
    {
        $this->_action = $actionName;
    }

    public function setParams($params)
    {
        $this->_params = $params;
    }
    public function setLanguage($language)
    {
       $this->_language = $language;
    }
    public function setTemplate($template)
    {
        $this->_template = $template;
    }
    protected function __view()
    {
        $view = VIEWS_PATH . $this->_controller . DS . $this->_action . '.view.php';

        if ($this->_action == frontController::Not_Found_Action || !file_exists($view)) {
            $view = VIEWS_PATH . 'Notfound' . DS . 'notfound.view.php';
        }
        $this->_data = array_merge($this->_data , $this->_language->getDictionary());
        $this->_template->setActionViewFile($view);
        $this->_template->setAppData($this->_data);
        $this->_template->renderApp();



    }
}
