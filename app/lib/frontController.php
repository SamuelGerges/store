<?php



namespace PHPMVC\LIB;



use PHPMVC\LIB\Template\Template;

class frontController
{
    const Not_Found_Action     = 'NotFoundAction';
    const Not_Found_Controller = 'PHPMVC\Controllers\\NotFoundController' ;
    private $_controller = 'index';
    private $_action = 'default';
    private $_params = array();

    private $_template ;
    private $_language ;

    public function __construct(Template $template , Language $language)
    {
        $this->_template = $template;
        $this->_language = $language;
        $this->_parseUrl();
    }

    private function _parseUrl()
    {
        $url = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'), 3);
        if (isset($url[0]) && $url[0] != '') {
            $this->_controller = $url[0];
        }

        if (isset($url[1]) && $url[1] != '') {
            $this->_action = $url[1];
        }

        if (isset($url[2]) && $url[2] != '') {
            $this->_params = explode('/', $url[2]);
        }
    }

    public function dispatch()
    {
        $controllerClassName ='PHPMVC\Controllers\\'.ucfirst($this->_controller) .'Controller';
        $actionName = $this->_action . 'Action';
        if(!class_exists($controllerClassName) || !method_exists($controllerClassName ,$actionName))
        {
            $controllerClassName =  self::Not_Found_Controller;
            $this->_action = $actionName = self::Not_Found_Action;
        }

        $controller = new $controllerClassName();               // Create Object
        $controller->setController($this->_controller);
        $controller->setAction($this->_action);
        $controller->setParams($this->_params);
        $controller->setTemplate($this->_template);
        $controller->setLanguage($this->_language);
        $controller->$actionName();
    }
}
