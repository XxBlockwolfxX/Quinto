<?php
error_reporting(0);
require_once('../config/cors.php');
require_once('../models/roles.model.php');

$rol = new Clase_Roles();
$metodo = $_SERVER['REQUEST_METHOD'];

//$_POST   insertar
//$_GET    select 
// $_PUT   actualizar
//$_DELETE   eliminar

switch ($metodo) {
    case "GET":
        if (isset($_GET["ID_Roles"])) {
            $uno = $rol->uno($_GET["ID_Roles"]);
            echo json_encode(mysqli_fetch_assoc($uno));
        } else {
            $datos = $rol->todos();
            $todos = array();
            while ($fila = mysqli_fetch_assoc($datos)) {
                array_push($todos, $fila);
            }
            echo json_encode($todos);
        }
        break;
    case "POST":
        $datos = json_decode(file_get_contents('php://input'));
        if (!empty($datos->Roles)) {
            $insertar = $rol->insertar($datos->Roles);
            if ($insertar) {
                echo json_encode(array("message" => "Se inserto correctamente"));
            } else {
                echo json_encode(array("message" => "Error, no se inserto"));
            }
        } else {
            echo json_encode(array("message" => "Error, faltan datos"));
        }
        break;
    case "PUT":
        $datos = json_decode(file_get_contents('php://input'));
        if (!empty($datos->ID_Roles) && !empty($datos->Roles)) {
            $actualizar = $rol->actualizar($datos->ID_Roles, $datos->Roles);
            if ($actualizar) {
                echo json_encode(array("message" => "Se actualizo correctamente"));
            } else {
                echo json_encode(array("message" => "Error, no se actualizo"));
            }
        } else {
            echo json_encode(array("message" => "Error, faltan datos"));
        }
        break;
    case "DELETE":
        $datos = json_decode(file_get_contents('php://input'));
        if (!empty($datos->ID_Roles)) {
            try {
                $eliminar = $rol->eliminar($datos->ID_Roles);
                echo json_encode(array("message" => "Se elimino correctamente"));
            } catch (Exception $th) {
                echo json_encode(array("message" => "Error, no se elimino"));
            }
        } else {
            echo json_encode(array("message" => "Error, no se envio el id"));
        }
        break;
}
?>
