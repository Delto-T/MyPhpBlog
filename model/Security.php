<?php

require_once('Manager.php');
 
class Security{

    public static function encryptPassword($pwd){
         return "pzhx".sha1($pwd."835")."9a";
    }

    public static function checkPassword($userPwd,$inputPwd){
        if($userPwd == $inputPwd){
            return true;
        }else{
            return false;
        }
    }

}