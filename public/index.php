<?php


namespace PHPMVC\lib;

use PHPMVC\lib\frontController;
use PHPMVC\lib\Language;
use PHPMVC\lib\SessionManager;
use PHPMVC\LIB\TEMPLATE\Template;


if(!defined('DS'))
{
    define('DS',DIRECTORY_SEPARATOR);
}
require_once '..' . DS . 'app' . DS .'config'.DS . 'config.php';
$templateParts=require_once '..' . DS . 'app' . DS .'config'.DS . 'templateconfig.php';

require_once APP_PATH . DS . 'lib' . DS . 'Autoload.php';

$session = new SessionManager();
$session->start();
if(!isset($_SESSION['language'] ))
{
    $_SESSION['language'] = APP_DEFAULT_LANGUAGE;
}

$template = new Template($templateParts);
$language = new Language();
$front_controller = new frontController($template,$language);
$front_controller->dispatch();





