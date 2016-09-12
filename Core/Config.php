<?php

class Config
{
    public static function get($getConfig=NULL){
        if(!isset($getConfig)){
            return false;
        }
        $config=$GLOBALS['config'];

        $getConfig=explode('/',$getConfig);

        foreach($getConfig as $item){
            if(isset($config[$item])){
                $config=$config[$item];
            }
        }
        return $config;
    }
}