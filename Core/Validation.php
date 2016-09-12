<?php

class Validation{

	private $errors = array();
	private $db;

	public function __construct(){
		$this->db = Database::instantiate();

	}

	public function validate($validateRules){

		foreach ($validateRules as $item => $rules) {
			foreach ($rules as $rule => $ruleValue) {
				if(isset($_POST[$item])){
					
					if($rule == 'required' && $_POST[$item]==''){
						$this->setError($rules['label']." can't be empty ");
					}
					elseif($_POST[$item]!= ''){
						switch($rule){

							case "min":{
								if(strlen($_POST[$item]) < $ruleValue){
									$this->setError($rules['label']. " needs to be longer than ".$ruleValue. " characters");
								}
								break;
							}
							

							case "max":{
								if(strlen($_POST[$item]) > $ruleValue){
									$this->setError($rules['label']. " needs to be shorter than ".$ruleValue. " characters");
								}
								break;
							}

							case "validEmail":{
								if(!filter_var($_POST[$item],FILTER_VALIDATE_EMAIL)){
									$this->setError($rules['label']. " must be Valid");
								}
								break;
							}

							case "matches":{
								if($_POST[$item]!= $_POST[$ruleValue]){
									$this->setError($rules['label']." field doesnt not match password");
								}
								break;
							}

							case "unique":{
								$dbValues = explode('.',$ruleValue);
								$users = $this->db->select($dbValues[0],'id',$dbValues[1].'=?',array($_POST[$item]));

								if(count($users)){
									$this->setError($rules['label']. " must be unique");
								}
								break;
							}

						}

					}
				}
						
			}		

		}
	}

	private function setError($error){
		$this->errors[]=$error;
	}

	public function isValid(){
		if(count($this->errors)==0){
			return true;
		}
		return false;
	}

	public function getErrors(){
		return $this->errors;
	}









}






?>