<?php


$serverName=$_SERVER['SERVER_NAME'];

define('VIRTUALHOST','devenv.com');

if($serverName=="localhost" || $serverName==VIRTUALHOST){
    define('ENVIRONMENT','development');
}else{
    define('ENVIRONMENT','production');
}


switch(ENVIRONMENT){



    case 'development':
        error_reporting(-1);
        ini_set('display_errors','On');

        define('HTTP','http://'.$serverName.'/PHP7/PROJECT/');
        define('ROOT',$_SERVER['DOCUMENT_ROOT'].'/PHP7/PROJECT/');
        break;

    case 'production':
        error_reporting(1);
        ini_set('display_errors','Off');
        define('HTTP','changeme');
        define('ROOT','changeme');
        break;

    default:
        die('Unknown Place');
}

$GLOBALS['config'] = array(

    'mysql' => array(

        'host'   => 'localhost',
        'dbname' => 'db_php7',
        'user'   => 'root',
        'password' => 'password79'
        )

    );
