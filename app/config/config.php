<?php

namespace PHPMVC\lib;


if(!defined('DS'))
{
    define('DS',DIRECTORY_SEPARATOR);
}


define('APP_PATH',realpath(dirname(__FILE__)) .DS. '..'.DS);

define('VIEWS_PATH',APP_PATH . 'views' .DS);
define('TEMPLATE_PATH',APP_PATH . 'template' .DS);
define('LANGUAGE_PATH',APP_PATH . 'languages' .DS);
define('JS' ,'/js/');
define('CSS','/css/');

defined('DATABASE_HOST_NAME')    ?  null : define('DATABASE_HOST_NAME','localhost');
defined('DATABASE_USER_NAME')    ?  null : define('DATABASE_USER_NAME' ,'root');
defined('DATABASE_PASSWORD')     ?  null : define('DATABASE_PASSWORD' ,'root');
defined('DATABASE_DB_NAME')      ?  null : define('DATABASE_DB_NAME' ,'store_db');
defined('DATABASE_PORT_NUMBER')  ?  null : define('DATABASE_PORT_NUMBER' ,3306);
defined('DATABASE_CONN_DRIVEN')  ?  null : define('DATABASE_CONN_DRIVEN' ,1);


// defined application Language
defined('APP_DEFAULT_LANGUAGE')  ?  null : define('APP_DEFAULT_LANGUAGE' ,'arabic');

// defined Session Configuration
defined('SESSION_NAME')         ?  null : define('SESSION_NAME' ,'ESTORE_SESSION');
defined('SESSION_LIFE_TIME')    ?  null : define('SESSION_LIFE_TIME' ,0);
defined('SESSION_SAVE_PATH')    ?  null : define('SESSION_SAVE_PATH' , APP_PATH . '..' .DS .'sessions');

