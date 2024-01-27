<?php

require_once('UserManager.php');

class User extends UserManager{

    // Attribu
    private $_id;
    private $_firstName;
    private $_lastName;
    private $_email;
    private $_pwd;
    private $_admin;


    //Constructor
    public function __construct($id,$firstName,$lastName,$email,$pwd,$admin){
        $this->setId($id);
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
        $this->setEmail($email);
        $this->setPwd($pwd);
        $this->setAdmin($admin);
    }


    //Getters
    public function getId(){
        return $this->_id;
    }

    public function getFirstName(){
        return $this->_firstName;
    }

    public function getLastName(){
        return $this->_lastName;
    }

    public function getEmail(){
        return $this->_email;
    }

    public function getPwd(){
        return $this->_pwd;
    }

    public function getAdmin(){
        return $this->_admin;
    }

    //Setters

    private function setId($newId){
        $this->_id = $newId;
    }

    public function setFirstName($newfirstName){
        $this->_firstName = $newfirstName;
    }

    public function setLastName($newLastName){
        $this->_lastName = $newLastName;
    }

    public function setEmail($newEmail){
        $this->_email = $newEmail;
    }

    public function setPwd($newPwd){
        $this->_pwd = $newPwd;
    }

    public function setAdmin($newAdmin){
        $this->_admin = $newAdmin;
    }

}