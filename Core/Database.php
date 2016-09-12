<?php


class Database
{

    private $_connect=null;//connection resource
    private static $_instance=null;//to implement singleton



    /**
     * Database constructor.
     * Connect to DB when class instantiated
     */
    public function __construct(){
        $this->connectDB($host='',$dbname='',$user='',$password='');
    }



    /**
     * Connects to the Database Uses PDO connection method
     */
    private function connectDB($host,$dbname,$user,$password){
        $host = $GLOBALS['config']['mysql']['host'];
        $dbname = $GLOBALS['config']['mysql']['dbname'];
        $user = $GLOBALS['config']['mysql']['user'];
        $password = $GLOBALS['config']['mysql']['password'];

        try{
            $this->_connect=new PDO('mysql:host='.$host.';dbname='.$dbname,$user,$password);
            $this->_connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $ex){
            die($ex->getMessage());
        }
    }


    /**
     * Singleton pattern implementation to connect
     * @return object
     */

    public static function instantiate(){
        if(!(isset(self::$_instance))){
            self::$_instance=new Database();
        }
        return self::$_instance;
    }






    /**
     * Insert Data to the table provided as @arg after prepare statement
     * @param string $tableName
     * @param array $data do be inserted
     * @return int last inserted id
     */
    public function insert($tableName="",$data=array()){
        if(empty($tableName) || empty($data))
            return false;

        $sql="INSERT INTO ".$tableName." (";
        $sql.=implode(',',array_keys($data)).") VALUES (?";

        for($i=1;$i<count($data);$i++){
            $sql.=",?";
        }
        $sql.=")";

        $stmt=$this->_connect->prepare($sql);
        try{
            $stmt->execute(array_values($data));
            return $this->_connect->lastInsertId();
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }




    public function update($table="",$data=array(),$criteria="",$bindValue=array()){
        $sql="UPDATE ".$table." SET ";

        $sql.=implode('=?,',array_keys($data));
        $sql.="=?";

        $sql.=" WHERE ".$criteria;

        $stmt=$this->_connect->prepare($sql);

        $exec=array_merge(array_values($data),$bindValue);

        try{
            $stmt->execute($exec);
            return true;
        }catch(PDOException $e){
            die($e->getMessage());
        }

    }




    public function select($tableName="",$columnName="*",$criteria="",$bindValue=array(),$clause=""){
        $sql="SELECT ".$columnName." FROM ".$tableName;

        if(!empty($criteria)){
            $sql.=" WHERE ".$criteria;
        }
        if(!empty($clause)){
            $sql.=" ".$clause;
        }

        $stmt = $this->_connect->prepare($sql);
        try{
            $stmt->execute($bindValue);
            return $stmt->fetchAll(PDO::FETCH_CLASS);
        }catch(PDOException $e){
            die($e->getMessage());
        }

    }


    public function countRow($tableName="",$criteria="",$bindValue=array()){
        $sql="SELECT count(*) as total FROM ".$tableName;

        if(!empty($criteria)){
            $sql.=" WHERE ".$criteria;
        }

        $stmt=$this->_connect->prepare($sql);
        try{
            $stmt->execute($bindValue);
            $count=$stmt->fetchAll(PDO::FETCH_COLUMN);
            return $count[0];
        }catch (PDOException $e){
            die($e->getMessage());
        }

    }



    public function delete($tableName="",$criteria="",$bindValue=array()){
        $sql="DELETE FROM ".$tableName." WHERE ".$criteria;
        $stmt=$this->_connect->prepare($sql);
        try{
            $stmt->execute($bindValue);
            return true;
        }catch(PDOException $e){
            die($e->getMessage());
        }

    }

}


