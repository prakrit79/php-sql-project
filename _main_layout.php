
<?php

    require_once('Config/config.php');

    $page="home";
    if(isset($_GET['page']) && !empty($_GET['page'])){
        $page=$_GET['page'];
    }
    $page.='.php';

?>


<?php require_once('Pages/layouts/header.php'); ?>

<?php
    $file="Pages/".$page;
    if(file_exists($file)){
        require_once($file);
    }else{
        echo "No such file exists \"{$file}\" ";
    }

?>

<?php require_once('Pages/layouts/footer.php'); ?>