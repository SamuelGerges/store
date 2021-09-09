<?php

namespace PHPMVC\Models;



use PHPMVC\Lib\Database\DatabaseHandler;

class abstractModel
{
    const DATA_TYPE_BOOL = \PDO::PARAM_BOOL;
    const DATA_TYPE_STR  = \PDO::PARAM_STR;
    const DATA_TYPE_INT  = \PDO::PARAM_INT;
    const DATA_TYPE_DECIMAL =4;
    const DATA_TYPE_DATE =5;



    private static $db;
    public function __construct(){}


    public function prepareValue(\PDOStatement &$stmt)
    {
        foreach (static::$tableSchema as $columnName =>$type)
        {
            if($type !==4)
            {
                $stmt->bindValue(":{$columnName}" , $this->$columnName, $type);

            }else
            {

                $sanitizedValue =filter_var($this->$columnName,FILTER_SANITIZE_NUMBER_FLOAT ,
                    FILTER_FLAG_ALLOW_FRACTION);
                $stmt->bindValue(":{$columnName}", $sanitizedValue );
            }
        }
    }

     private static function buildNameParametersSQl()
     {
         $namedParams = '';
         foreach (static::$tableSchema as $columnName => $type){

             $namedParams   .= $columnName . ' = :' . $columnName . ', ' ;

         }
         return trim($namedParams ,', ');

     }
     public function create()
     {
         global  $connect ;
         $sql = 'INSERT INTO '. static::$tableName .' SET ' . self::buildNameParametersSQl();
         $stmt = DatabaseHandler::factory()->prepare($sql);
         $this->prepareValue($stmt);
        if($stmt->execute())
        {
            $this->{static::$primaryKey} = DatabaseHandler::factory()->lastInsertId();
            return true;
        }
         return false ;
    }
    public function update()
    {
        global  $connect ;
        $sql = 'UPDATE '. static::$tableName .' SET ' . self::buildNameParametersSQl() . ' WHERE ' . static::$primaryKey . ' = ' . $this->{static::$primaryKey};
        $stmt =  DatabaseHandler::factory()->prepare($sql);
        $this->prepareValue($stmt);
        $stmt->execute();



    }
    public function save()
    {
        return $this->{static::$primaryKey} === null ? $this->create() : $this->update();
    }
    public function delete()
    {
        global  $connect ;
        $sql = 'Delete FROM ' . static::$tableName . ' WHERE '. static::$primaryKey .' = ' . $this->{static::$primaryKey};
        $stmt = DatabaseHandler::factory() ->prepare($sql);
        return $stmt->execute();
    }

    public static function getALL()
    {

        global $connect;
        $sql = 'SELECT * FROM ' . static::$tableName;

        $stmt = DatabaseHandler::factory()->prepare($sql);
        $stmt->execute() ;
        $result =  $stmt->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE,get_called_class(),array_keys(static::$tableSchema ));
        return (is_array( $result) && !empty( $result)) ?  $result : false;


    }
    public static function getBYPk($pk)
    {
        global $connect;
        $sql = 'SELECT * FROM ' . static ::$tableName . ' WHERE '. static::$primaryKey .' = "' . $pk .'"';
        $stmt =  DatabaseHandler::factory() ->prepare($sql);
        if($stmt->execute() === true)
        {
            if(method_exists(get_called_class(),'__construct'))
            {
                $obj = $stmt->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, get_called_class(), array_keys(static::$tableSchema));
            }else{
                $obj = $stmt->fetchAll(\PDO::FETCH_CLASS ,get_called_class());
            }
           return !empty($obj) ?  array_shift($obj) : false ;
        }
        return false;
    }

    public static function getBy($columns, $options = array())
    {
        $whereClauseColumns = array_keys($columns);
        $whereClauseValues = array_values($columns);

        $whereClause = [];
        for ( $i = 0, $ii = count($whereClauseColumns); $i < $ii; $i++ ) {
            $whereClause[] = $whereClauseColumns[$i] . ' = "' . $whereClauseValues[$i] . '"';
        }
        $whereClause = implode(' AND ', $whereClause);
        $sql = 'SELECT * FROM ' . static::$tableName . '  WHERE ' . $whereClause;
        return static::get($sql, $options);
    }

    public static function get($sql,$option = array())
    {
        global $connect;
        $stmt =  DatabaseHandler::factory() ->prepare($sql);
        if(!empty($option))
        {
            foreach ($option as $columnName =>$type)
            {
                if($type[0] ==4)
                {
                    $sanitizedValue =filter_var($type[1],FILTER_SANITIZE_NUMBER_FLOAT ,
                        FILTER_FLAG_ALLOW_FRACTION);
                    $stmt->bindValue(":{$columnName}", $sanitizedValue );
                }else
                {

                    $stmt->bindValue(":{$columnName}" , $type[1],$type[0]);
                }
            }
        }
        $stmt->execute() ;
        if(method_exists(get_called_class(),'__construct'))
        {
            $result = $stmt->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, get_called_class(), array_keys(static::$tableSchema));
        }else{
            $result = $stmt->fetchAll(\PDO::FETCH_CLASS ,get_called_class());
        }
       if (is_array( $result) && !empty( $result))
       {
          $generator = function () use ($result) {};
          return $generator;
       };
       return false;

    }

    public static function getOne($sql, $options = array())
    {
        $result = static::get($sql, $options);
        return $result === false ? false : $result->current();
    }

    public static function getModelTableName()
    {
        return static::$tableName;
    }
}