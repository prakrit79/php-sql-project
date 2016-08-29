<?php

require_once('init/initialize.php');

$db = Database::instantiate();

$db->insert('register_info',array('name'=>'pushkar','email'=>'pushkar@gmail.com'));


?>