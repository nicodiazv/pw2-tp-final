<?php

class UploadImage{

     private $fileTmpPath;
     private $fileName;
     private $fileSize;
     private $fileType;
     private $error;
     private $allowedfileExtensions = array('jpg','jpeg', 'gif', 'png');

     public function __construct($file)
     {
         $this->fileTmpPath = $file['tmp_name'];
         $this->fileName = $file['name'];
         $this->fileSize = $file['size'];
         $this->fileType = $file['type'];
         $this->error = $file['error'];

     }

     public function subirFoto(){
         if($this->error === UPLOAD_ERR_OK){
             $fileNameCmps = explode(".", $this->fileName);
             $fileExtension = strtolower(end($fileNameCmps));
             $newFileName = md5(time() . $this->fileName) . '.' . $fileExtension;
             if (in_array($fileExtension, $this->allowedfileExtensions)) {

                 // directory in which the uploaded file will be moved
                 $uploadFileDir = './images/notas/';

                 $dest_path = $uploadFileDir . $newFileName;

                 if(move_uploaded_file('as', $dest_path))
                 {
                     $message ='File is successfully uploaded.';
                     return $newFileName;
                 }
                 else
                 {
                     throw new Exception ("Error en la carga");
                 }

             }
         }
     }

}



