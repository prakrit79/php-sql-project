<?php
require_once('Init/Initialize.php');

    if(isset($_GET['_uid'])){
        $id=(int)Input::get('_uid');
        $objUser=new User();
        $objUser->deleteUser($id);
    }