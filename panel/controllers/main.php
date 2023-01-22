<?php

    function getparam($param_name){
        if(!empty($_GET["$param_name"])){
            $value = $_GET["$param_name"];
            return $value;
        }
        else{
            return null;
        }
    }
    function postparam($param_name){
    if(!empty( $_POST["$param_name"])){
        $value = $_POST["$param_name"];
        return $value;
    }
    else{
        return null;
    }
}
    function getcurrentmodule(){
        $module = getparam('moudal');
        if($module != null){
            return $module;
        }
        else{
            return '';
        }

    }
    function includebycheak($path){
        if(file_exists($path)) {
            include_once "$path";
        }
    }
?>