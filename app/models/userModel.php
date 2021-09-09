<?php

namespace PHPMVC\Models;


class UserModel extends abstractModel
{
    public $UserId;
    public $UserName;
    public $Password;
    public $Email;
    public $PhoneNumber;
    public $SubscriptionDate;
    public $LastLogIn;
    public $GroupId;

    protected static $tableName   ='app_users';
    protected static $tableSchema = array(
         'UserId'               =>self::DATA_TYPE_INT,
         'UserName'             =>self::DATA_TYPE_STR,
         'Password'             =>self::DATA_TYPE_STR,
         'Email'                =>self::DATA_TYPE_STR,
         'PhoneNumber'          =>self::DATA_TYPE_STR,
         'SubscriptionDate'     =>self::DATA_TYPE_DATE,
         'LastLogIn'            =>self::DATA_TYPE_STR,
         'GroupId'              =>self::DATA_TYPE_INT,
    );


    protected static $primaryKey = 'UserId';



    public function setId($id){
        $this->UserId = $id;
    }
    public function getId()
    {
        return $this->UserId;
    }

    public function setName($name){
        $this->UserName = $name;
    }
    public function getName()
    {
        return $this->UserName;
    }

    public function setPassword($Password){
        $this->Password = $Password;
    }
    public function getPassword()
    {
        return $this->Password;
    }

    public function setEmail($email){
        $this->Email = $email;
    }
    public function getEmail()
    {
        return $this->Email;
    }

    public function setPhone($phone){
        $this->PhoneNumber = $phone;
    }
    public function getPhone()
    {
        return $this->PhoneNumber;
    }

    public function setSubscriptionDate($SubscriptionDate)
    {
        $this->SubscriptionDate =$SubscriptionDate;
    }
    public function getSubscriptionDate()
    {
        return $this->SubscriptionDate;
    }

    public function setLastLogIn($LastLogIn){
        $this->LastLogIn = $LastLogIn;
    }
    public function getLastLogIn()
    {
        return $this->LastLogIn;
    }

    public function setGroupId($GroupId)
    {
        $this->GroupId =$GroupId;
    }
    public function getGroupId()
    {
        return $this->GroupId;
    }
}
