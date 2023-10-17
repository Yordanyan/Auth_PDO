<?php

namespace App;

session_start();
class Authentication
{
    static public function Auth(){
        if(isset($_SESSION['user']) && $_SESSION['user']){
            return true;
        }
        return false;
    }
}