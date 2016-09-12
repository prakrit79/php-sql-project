<?php

class Model{

	private $db;
	protected $tableName = "";
	protected $_primary_key="";
	protected $_limit = "";
	protected $_offset ="";
	protected $_collumnName = "";

	public function __construct(){
		$this->db = Database::instantiate();
	}

	public function save($userData = array(), $id = null){
		if(isset($id)){
			
		}
		return $this->db->insert($this->tableName,$userData);
	}

	protected function select($id=NULL,$clause=""){
        if(isset($id))
        {
            return $this->db->select($this->tableName,$this->_collumnName,$this->_primary_key.'=?',array($id),$clause);
        }
        else if(isset($this->_limit) && is_numeric($this->_limit))
        {
           $limit=(int)$this->_limit;
           $offset=(int)$this->_offset;
           return $this->db->select($this->tableName,$this->_collumnName,'',array()," LIMIT {$limit} OFFSET {$offset}");
        }
        return $this->db->select($this->table_name,$this->_collumnName);
    }


	public function delete($id=NULL){
		if(!isset($id)){
			return false;
		}
		return $this->db->delete($this->tableName,$this->_primary_key.'=?',array($id));
	}

	public function countRow(){
		return $this->db->countRow($this->tableName);
	}

	public function selectBy($criteria="",$bindValue=array()){
		if(!empty($criteria)&& !empty($bindValue)){
			return $this->db->select($this->tableName,$this->_collumnName,$criteria,$bindValue);
		}
		return false;


	}




}





?>