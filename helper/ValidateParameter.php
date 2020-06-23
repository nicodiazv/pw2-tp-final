<?php


class ValidateParameter {

    public static function validateParam($parametro){
        if(isset($parametro) && $parametro!=null && $parametro!=""){
            return trim($parametro);
        }else{
            throw new FortException("Se ha detectado un parámetro inválido");
        }
    }

    public static function validateEmailSyntax($email){
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            return $email;
        }else{
            throw new FortException("Debe ingresar un e-mail válido");
        }
    }

    public static function validateNumberPhone($tel){
       if(is_numeric($tel)){
           return $tel;
       }else{
           throw new FortException("Debe ingresar un teléfono válido");
       }
    }
}