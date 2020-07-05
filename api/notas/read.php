<?php

include_once("../../helper/Database.php");
include_once('../../model/notaModel.php');

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$database = new Database("localhost", "root", "", "pw2");
$notaModel = new NotaModel($database);

// $result = $notaModel->obtenerNotasAprobadas();
$result = $notaModel->notasPermitidas($_GET['id']); 


  $notas_arr = array();
    foreach ($result as $row ) {
      extract($row);

      $nota = array(
        'id' => $id,
        'titulo' => $titulo,
        'copete' => $copete,
        'posicion' => [
          'lat' => (float)$ubicacion_lat,
          'lng' => (float)$ubicacion_lng
        ],
        'cuerpo' => html_entity_decode($cuerpo)
      );

      array_push($notas_arr, $nota);
      
    }
    
    echo json_encode($notas_arr);

