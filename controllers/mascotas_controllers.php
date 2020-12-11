<?php
require_once("../helper/conexion.php");
require_once("../Model/Mascotas_class.php");
header('Content-Type: application/json');


$v_action = $_POST["action"];


switch ($v_action) {

  case 1:
    try {
      $results=Mascotas_class::consultarCategoria();
      echo json_encode($results);
    } catch (Exception $e) {
      echo $e;
    } 
  break;

  case 2:
    try {
        $results=Mascotas_class::consultarMascotas();
        echo json_encode($results);
      } catch (Exception $e) {
        echo $e;
      }
    break;
    
  case 3:
    $nombre = $_POST["nombre"];
    $estado = $_POST["estado"];
    $id = $_POST["id"];
      try {
        $results=Mascotas_class::modificarMascotas($nombre,$estado,$id);
        $datos = array(
          'tipo' => 'success',
          'titulo' => 'Enhorabuena',
					'estado' => '200',
					'message' => "Se modifico correctamente"
				);
				echo json_encode($datos);
      } catch (Exception $e) {
      echo $e;
      }
      
	break;
	
  case 4:
    $id = $_POST["id"];
    try {
      $results=Mascotas_class::EliminarMascota($id);
      echo json_encode($results);
    } catch (Exception $e) {
      echo $e;
    } 
  break;

  case 5:
    $idCategoria = $_POST["idCategoria"];
    $identificacion = $_POST["identificacion"];
    $nombre = $_POST["nombre"];
    $urlFoto = $_POST["urlFoto"];
    $estado = $_POST["estado"];
    try {
      $results=Mascotas_class::AgregarMascota($idCategoria,$identificacion,$nombre,$urlFoto,$estado);
      echo json_encode($results);
    } catch (Exception $e) {
      echo $e;
    } 
  break;

  case 6:
    $id = $_POST["id"];
    try {
      $results=Mascotas_class::consultarId($id);
      echo json_encode($results);
    } catch (Exception $e) {
      echo $e;
    } 
  break;

}

 ?>