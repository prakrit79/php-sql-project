<?php

class User extends Model{

	public $pagination="";

	private $validation;
	private $config = array();

	protected $tableName = "users";
	protected $_primary_key="id";
	protected $_limit = "";
	protected $_offset ="";
	protected $_collumnName = "*";



	private $rules = array(
		'txtusername' => array('label'=>'User Name', 'required'=>true,'min'=>3,'max'=>20),
		'txtemail' => array('label'=>'Email', 'required' =>true, 'validEmail' => true, 'unique'=>'users.email'),
		'txtpassword' => array('label'=> 'Password', 'required' => true, 'min' => 6),
		'txtconpas' => array('label'=>'Confirm Password', 'required' => true, 'matches' => 'txtpassword'),
		'txtprev' => array('label'=>'Privilige', 'required' => true)
		);

	public function __construct(){
		parent::__construct();
		$this->validation = new Validation();
	}

	public function insertUser(){

		$this->validation->validate($this->rules);

		if($this->validation->isValid()){

			$config['max_size']="100000000";
			$config['upload_dir'] = ROOT.'public_html/Assets/';
			$config['valid_ext'] = "png,gif,jpeg,jpg";

			Upload::initialize($config);

			$fileName=Upload::doUpload($_FILES['upload']);
            if($fileName){
                $userData=array(
                    'username'=>Input::post('txtusername'),
                    'email'=>Input::post('txtemail'),
                    'password'=>Hash::encrypt(Input::post('txtpassword')),
                    'privilige'=>Input::post('txtprev'),
                    'userPic'=>$fileName
                );
				if($this->save($userData)){
					Session::put('messageSuccess','User was created successfully');
					redirectTo('users');
				}
			}
			else{
				print_r(Upload::uploadErrors());
			}
		}
		else{
			Session::put('validationErrors',$this->validation->getErrors());
			return false;
		}
	}

	public function selectUser($id=NULL){
		if(isset($id)){
			$users = $this->select($id);
			if(count($users)){
                return $users[0];
            }
		}

		$this->_limit = 2;
		$config['limit'] = 2;
		$config['totalRow']=$this->countRow();

		$this->_offset = Pagination::initialize($config);
		$this->pagination = Pagination::createLinks();
		
		
		return $this->select();

	}

	public function deleteUser($id){
        $this->_columnName='userPic';
        $imageName=$this->selectUser($id);

        if($this->delete($id) && Upload::deleteImage(ROOT.'public_html/Assets/'.$imageName->userPic)){
            Session::put('messageSuccess','User Was Deleted Successfully');
            redirectTo('users');
        }else{
            Session::put('messageError','There was a problem..');
            redirectTo('users');
        }
    }

    public function login(){
    	unset($this->rules['txtemail']['unique']);
    	$this->validation->validate($this->rules);
    	if($this->validation->isValid()){
    		$privilage = $this->selectBy('email = ?',array(Input::post('txtemail')));

    		if(count($privilage)){
    			if(Hash::decrypt(Input::post('txtpassword'),$privilage[0]->password)){
                    $data=array(
                        'username_logged_in'=>$privilage[0]->username,
                        'email_logged_in'=>$privilage[0]->email,
                        'image_logged_in'=>$privilage[0]->userPic,
                        'privilige_logged_in'=>$privilage[0]->privilige
                    );
                    Session::userData($data);
                    redirectTo('dashboard');
                }

    		}
    		else{
    			Session::put('messageError','Invalid Credentials');
    		}
    	}
    	else{
    		Session::put('validationErrors',$this->validation->getErrors());
    	}
    }



}





?>