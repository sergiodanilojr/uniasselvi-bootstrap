<?php

if(! function_exists('env')){
    function env($key, $default = null){
        if($value = getenv($key)){
            return $value;
        }

        return $default;
    }
}