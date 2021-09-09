<?php

namespace PHPMVC\Models;


class PrivilegeModel extends abstractModel
{
    public $PrivilegeId;
    public $Privilege;
    public $PrivilegeTitle;

    protected static $tableName   ='app_users_privileges';
    protected static $tableSchema = array(
         'PrivilegeId'               =>self::DATA_TYPE_INT,
         'Privilege'                 =>self::DATA_TYPE_STR,
         'PrivilegeTitle'            =>self::DATA_TYPE_STR
    );


    protected static $primaryKey = 'PrivilegeId';



    public function setPrivilegeId($id){
        $this->PrivilegeId = $id;
    }
    public function getPrivilegeId()
    {
        return $this->PrivilegeId;
    }

    public function setPrivilege($privilege){
        $this->Privilege = $privilege;
    }
    public function getPrivilege()
    {
        return $this->Privilege;
    }


    public function setPrivilegeTitle($privilegeTitle){
        $this->PrivilegeTitle = $privilegeTitle;
    }
    public function getPrivilegeTitle()
    {
        return $this->PrivilegeTitle;
    }


}
