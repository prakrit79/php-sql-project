<?php

require_once('../config/config.php');
require_once('../Helper/functions.php');

function autoload($className){

	$libPath = 'lib/'.$className.'.php';
	$corePath = ROOT.'Core/'.$className.'.php';
	$modelPath = ROOT.'Core/Model/'.$className.'.php';

	if(file_exists($libPath)){
		require_once($libPath);
	}
	elseif(file_exists($corePath)){
		require_once($corePath);
	}
	elseif(file_exists($modelPath)){
		require_once($modelPath);
	}
	else{
		die('No such file exists '.$className);
	}
} 

spl_autoload_register('autoload');


?>