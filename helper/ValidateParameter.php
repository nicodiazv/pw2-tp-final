<?php


class ValidateParameter {

    public static function validateParam($parametro){
        if(isset($parametro) && $parametro!=null){
            return $parametro;
        }else{
            throw new FortException();
        }
    }
}