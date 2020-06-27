<?php
// Clase para subir imagenes
class UploadImage{

    // Esta función estática retorna el nombre de la imágen cargada sino lanza una excepción
     public static function subirFoto($file, $imagesSubdir){
         $fileTmpPath = $file['tmp_name'];
         $fileName = $file['name'];
         $fileSize = $file['size'];
         $fileType = $file['type'];
         $error = $file['error'];
         $allowedfileExtensions = array('jpg','jpeg', 'gif', 'png');

         if($error === UPLOAD_ERR_OK){
             $fileNameCmps = explode(".", $fileName);
             $fileExtension = strtolower(end($fileNameCmps));
             $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
             if (in_array($fileExtension, $allowedfileExtensions)) {

                 // directory in which the uploaded file will be moved
                 $uploadFileDir = './images/'.$imagesSubdir.'/';

                 $dest_path = $uploadFileDir . $newFileName;

                 // Si la imagen se cargo correctamente
                 if(move_uploaded_file($fileTmpPath, $dest_path)) {
                     return $newFileName;
                 }else{
                     throw new Exception ("Error en la carga de la imágen");
                 }
             }
         }
     }

}



