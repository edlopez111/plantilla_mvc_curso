<?php

class Utils {
    public function render($path){
        require_once "views/$path.php";
    }

    public function controller_list(){
        $path = "controllers/";

        $controllers = [];

        if($filenames = opendir($path)){
            while(false !== ($file = readdir($filenames))){
                if(strlen($file) > 5){
                    $data = explode(".",$file);
                    array_push($controllers,$data[0]);
                }
            }
            closedir($filenames);
        }

        return $controllers;
    } #end of function
}