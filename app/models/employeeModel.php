<?php

namespace PHPMVC\Models;


class EmployeeModel extends abstractModel
{
    public $user_id;
    public $user_name; 
    public $user_age;
    public $user_address;
    public $user_phone;
    public $user_email;
    public $user_password;

    protected static $tableName   ='users';
    protected static $tableSchema = array(

        'user_name'           =>self::DATA_TYPE_STR,
        'user_age'            =>self::DATA_TYPE_INT,
        'user_address'        =>self::DATA_TYPE_STR,
        'user_phone'          =>self::DATA_TYPE_STR,
        'user_email'          =>self::DATA_TYPE_STR,
        'user_password'       =>self::DATA_TYPE_STR
    );


    protected static $primaryKey = 'user_id';


   /*
    *
     public function __construct( $user_name, $user_age, $user_address,$user_phone,$user_email,$user_password)
    {
        global $connect;



//        $this->setId($user_id);
        $this->setName($user_name);
        $this->setAge($user_age);
        $this->setAddress($user_address);
        $this->setPhone($user_phone);
        $this->setEmail($user_email);
        $this->setPassword($user_password);
    }
*/

    public function setId($id){
        $this->user_id = $id;
    }

    public function getId()
    {
        return $this->user_id;
    }

    public function setName($name){
        $this->user_name = $name;
    }

    public function getName()
    {
        return $this->user_name;
    }

    public function setAge($age){
        $this->user_age = $age;
    }

    public function getAge()
    {
        return $this->user_age;
    }

    public function setAddress($address){
        $this->user_address = $address;
    }

    public function getAddress()
    {
        return $this->user_address;
    }

    public function setPhone($phone){
        $this->user_phone = $phone;
    }

    public function getPhone()
    {
        return $this->user_phone;
    }

    public function setEmail($email){
        $this->user_email = $email;
    }

    public function getEmail()
    {
        return $this->user_email;
    }

    public function setPassword($password)
    {
        $this->user_password =$password;
    }

    public function getPassword()
    {
        return $this->user_password;
    }



}
