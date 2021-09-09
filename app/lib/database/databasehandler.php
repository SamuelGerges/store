<?php

namespace PHPMVC\Lib\Database;

use PHPMVC\Models\abstractClass;

abstract class DatabaseHandler
{
    const DATABASE_DRIVEN_PDO =1;
    const DATABASE_DRIVEN_MYSQLi =2;


    private function __construct(){}

    abstract protected static function init();

    abstract protected static function getInstance();

    public static function factory()
    {
        $driver = DATABASE_CONN_DRIVEN ;

        if($driver == self::DATABASE_DRIVEN_PDO)
        {

            return PdoDatabaseHandler::getInstance();
        }elseif ($driver == self::DATABASE_DRIVEN_MYSQLi)
        {
            return MysqliDatabaseHandler::getInstance();
        }
    }

}
