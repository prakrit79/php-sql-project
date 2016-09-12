<?php

class Session{

	public static function put($key = NULL,$value=''){
		if(!isset($key)){
			return false;
		}
		return $_SESSION[$key] = $value;
	}

	public static function keyExists($key){
		return isset($_SESSION[$key]);
	}

	public static function delete($key){
		if(self::keyExists($key)){
			unset($_SESSION[$key]);
			return true;
		}
		return false;
	}

	public static function get($key){
		if(self::keyExists($key)){
			return $_SESSION[$key];
		}
		return '';
	}

	public static function userData($data=array()) {
		if(!empty($data)){
			foreach ($data as $key => $value) {
				$_SESSION[$key]=$value;		
			}
		}
	}

	public static function isLoggedIn(){
		if((!self::keyExists('username_logged_in'))&&(!self::keyExists('email_logged_in'))) {
			header('location: login.php');
		}
	}

	public static function isAdmin(){
		if(self::get('privilige_logged_in')!= 'admin'){
			header('location: _main_layout.php?page=dashboard');
		}
	}















}







?>