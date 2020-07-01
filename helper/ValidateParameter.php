<?php

class ValidateParameter {
    // Este método puede ser utilizado de dos maneras :
    // 1. Validar el parámetro y a su vez ya tener el parámetro limpio ya que estamos pasandolo por referencia.
    // 2. El método retorna el parámetro limpio y lo podemos asignar a una variable.
    public static function validateCleanParameter(&$parametro){
        $parametro = trim(preg_replace('/\s\s+/', ' ', str_replace("\n", " ", $parametro)));
        if($parametro != false || $parametro!=null || $parametro!="" || !(empty($parametro))){
            return $parametro;
        }else{
            throw new FortException("Se ha detectado un parámetro inválido");
        }
    }

    public static function validateEmailSyntax($email){
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            return $email;
        }else{
            throw new FortException("No se ha detectado un e-mail válido");
        }
    }

    public static function validateNumberPhone($tel){
       if(is_numeric($tel)){
           return $tel;
       }else{
           throw new FortException("Se ha detectado un teléfono válido");
       }
    }
}