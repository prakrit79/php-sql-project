<?php

class Pagination{

	private static $limit,$totalRow,$currentPage;

	public static function initialize($config=array()){
		self::$limit = $config['limit'];
		self::$totalRow = $config['totalRow'];

		self::$currentPage = isset($_GET['_p']) ? $_GET['_p']:1;
		
		return (self::$currentPage - 1)* self::$limit;
	}

	public static function createLinks(){
        $numOfPages=ceil(self::$totalRow/self::$limit);
        $output="";

        $url=$_SERVER['REQUEST_URI'];
        $url=preg_replace('/&_p=./','',$url);



        if($numOfPages>1){

            $next=self::$currentPage+1;
            $prev=self::$currentPage-1;

            $output.="<ul class='pagination'>";

            if(self::$currentPage>1){
                $output.="<li><a href='".$url.'&_p='.$prev."'>Prev</a></li>";
            }

            for($i=1;$i<=$numOfPages;$i++){
                if(self::$currentPage==$i){
                    $output.="<li class='active'><a href='".$url.'&_p='.$i."'>{$i}</a></li>";
                }else{
                    $output.="<li><a href='".$url.'&_p='.$i."'>{$i}</a></li>";
                }

            }

            if(self::$currentPage<$numOfPages){
                $output.="<li><a href='".$url.'&_p='.$next."'>Next</a></li>";
            }
            $output.="</ul>";
        }
        return $output;
    }













}












?>