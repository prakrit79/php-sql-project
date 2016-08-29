<?php

require_once('../config/config.php');

function autoload($className){

	$libPath = 'lib/'.$className.'.php';
	$corePath = ROOT.'Core/'.$className.'.php';
	
	if(file_exists($libPath)){
		require_once($libPath);
	}
	elseif(file_exists($corePath)){
		require_once($corePath);
	}
	else{
		die('No such file exists '.$className);
	}
} 

spl_autoload_register('autoload');


?>