<?php

namespace App\Core;

class Model {
    
    public static $instance;
    
    public static function getConn(){
        
        if(!isset(self::$instance)):
            self::$instance =new \PDO ('mysql:host=localhost;dbname=mvc;charset=utf8','root','');
        endif;
         return self::$instance;
       
    }
}