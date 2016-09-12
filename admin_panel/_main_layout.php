<?php require_once('init/initialize.php'); ?>

<?php 
    Session::isLoggedIn(); 
    //Session::isAdmin();
?>

<?php
    if(isset($_GET['page']) && !empty($_GET['page'])){
        $page=$_GET['page'];
    }
    else{
    	$page = 'dashboard';
    }
    $title = ucfirst($page);
    $page.='.php';
?>


<?php 
//Header of the html page
require_once('Pages/layouts/header.php'); 
?>


<?php
//Body of the html page
    $file="Pages/".$page;
    if(file_exists($file)){
       require_once('Pages/layouts/nav.php');
        require_once('Pages/layouts/top.php');
        require_once($file);
    }else{
        echo "No such file exists \"{$file}\" ";
    }
?>

<?php 

//Footer of the html page
require_once('Pages/layouts/footer.php'); 
?>