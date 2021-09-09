<?php

namespace PHPMVC\Models;


class UserGroupPrivilegeModel extends abstractModel
{
    public $Id ;
    public $GroupId;
    public $PrivilegeId;

    protected static $tableName   ='app_users_groups_privileges';
    protected static $tableSchema = array(

         'GroupId'               =>self::DATA_TYPE_INT,
         'PrivilegeId'           =>self::DATA_TYPE_INT
    );


    protected static $primaryKey = 'Id';


    public function setId($id)
    {
        $this->Id =$id;
    }
    public function getId()
    {
        return $this->Id;
    }
    public function setGroupId($groupId){
        $this->GroupId = $groupId;
    }
    public function getGroupId()
    {
        return $this->GroupId;
    }
    public function setPrivilegeId($privilegeId){
        $this->PrivilegeId = $privilegeId;
    }
    public function getPrivilegeId()
    {
        return $this->PrivilegeId;
    }


}
