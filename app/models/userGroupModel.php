<?php

namespace PHPMVC\Models;


class UserGroupModel extends abstractModel
{
    public $GroupId;
    public $GroupName;

    protected static $tableName   ='app_users_groups';
    protected static $tableSchema = array(
         'GroupId'               =>self::DATA_TYPE_INT,
         'GroupName'             =>self::DATA_TYPE_STR,
    );


    protected static $primaryKey = 'GroupId';



    public function setGroupId($id){
        $this->GroupId = $id;
    }
    public function getGroupId()
    {
        return $this->GroupId;
    }

    public function setGroupName($name){
        $this->GroupName = $name;
    }
    public function getGroupName()
    {
        return $this->GroupName;
    }


}
