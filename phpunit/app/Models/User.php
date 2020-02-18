<?php
namespace App\Models;
class User{
    private static $user = null;
    public function getinstance(){
        if(self::$user===null){
            self::$user= new User();
        }
        return self::$user;
    }
    function __construct(){

    }

    public function nombre($num, $num2){
        return $num+$num2;
    }
}
?>