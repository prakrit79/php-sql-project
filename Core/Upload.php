<?php
class Upload{

    private static $_location,$_max_size,$_valid_ext=array();

    private static $upload_error=array(
        1=>	"Larger than upload_max_filesize",
        2=>	"MAX_FILE_SIZE",
        3=>	"Partial Upload",
        4=>	"No file",
        6=>	"No temporary directory",
        7=>	"Can't write to disk",
        8=>	"FILE upload stopped by extension"
    );
    private static $_errors=array();



    public static function initialize($configuration=array()){
        self::$_location=$configuration['upload_dir'];
        self::$_max_size=$configuration['max_size'];
        self::$_valid_ext=explode(',',$configuration['valid_ext']);
    }


    public static function uploadErrors(){
        return self::$_errors;
    }



    public static function doUpload($uploadFile){
        $ext=strtolower(pathinfo($uploadFile['name'],PATHINFO_EXTENSION));
        $newName=md5(rand().time()).".{$ext}";

        if($uploadFile['error']!=0){
            self::$_errors[]=self::$upload_error[$uploadFile['error']];
            return false;
        }else{
            if(self::$_max_size<$uploadFile['size']){
                self::$_errors[]="Larger than allowed size ";
                return false;
            }
            if(!in_array($ext,self::$_valid_ext)){
                self::$_errors[]="Not allowed Type";
                return false;
            }
            move_uploaded_file($uploadFile['tmp_name'],self::$_location.$newName);
            return $newName;

        }

    }


    public static function deleteImage($location){
        return unlink($location);
    }


}

?>