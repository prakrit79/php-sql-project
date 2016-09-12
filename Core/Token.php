<?php

class Token{

	public static function generate(){

		 return Session::put(Config::get('session/tokenName'),md5(uniqid()));
	}

	public static function input(){
		return '<input type = "hidden" name = "_token" value =" '.self::generate().'">';
	}

	public static function check($token){
        $tokenName=Config::get('session/tokenName');    

        if(Session::keyExists($tokenName)){
            Session::delete($tokenName);
            return true;
        }
        return false;
    }

}













?>