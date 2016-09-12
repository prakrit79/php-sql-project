<?php

function printValidationMessage($className=''){
	$output='';
	if(isset($_SESSION['validationErrors'])){
		foreach ($_SESSION['validationErrors'] as $error) {
			$output.="<div class='".$className."''>";
			$output.=$error;
			$output.='</div>';
		}
	unset($_SESSION['validationErrors']);
	}
	return $output;

}

function displayMessage(){
	$msg = "";
	if(isset($_SESSION['messageSuccess'])){
		$msg.= "<div class='alert alert-success'>";
		$msg.= $_SESSION['messageSuccess'];
		$msg.= "</div>";
		unset($_SESSION['messageSuccess']);
	}

	if(isset($_SESSION['messageError'])){
		$msg.= "<div class = 'alert alert-danger'>";
		$msg.= $_SESSION['messageError'];
		$msg.= "</div>";
		unset($_SESSION['messageError']);
	}


	return $msg;

}

function redirectTo($location=""){
    if(!empty($location)){
        header('Location: _main_layout.php?page='.$location);
        exit;
    }
}











?>