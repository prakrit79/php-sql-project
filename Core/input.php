<?php

class Input{

	public static function request($method="post"){
        switch($method){
            case "post":{
                return (!empty($_POST) && $_SERVER['REQUEST_METHOD']=="POST");
                break;
            }
            case "get":{
                return (!empty($_GET) && $_SERVER['REQUEST_METHOD']=="GET");
                break;
            }
        }
    }

    public static function post($item){
        if(isset($_POST[$item])){
            return $_POST[$item];
        }
        return '';
    }


    public static function get($item){
        if(isset($_GET[$item])){
            return $_GET[$item];
        }
        return '';
    }

}


?>