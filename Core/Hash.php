<?php

class Hash{

	public static function encrypt($password){
		return password_hash($password,PASSWORD_DEFAULT);
	}

	public static function decrypt($password,$hash){
		return password_verify($password,$hash);
	}











}










?>