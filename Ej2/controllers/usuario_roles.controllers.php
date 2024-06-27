<?php
error_reporting(0);
require_once('../config/cors.php');
require_once('../models/usuarios_roles.model.php');

$usuarios_roles = new Clase_UsuariosRoles();
$metodo = $_SERVER['REQUEST_METHOD'];

//$_POST   insertar
//$_GET    select 
// $_PUT   actualizar
//$_DELETE   eliminar

switch ($metodo) {
    case "GET":
        if (isset($_GET["ID_usuarios_roles"])) {
            $uno = $usuarios_roles->uno($_GET["ID_usuarios_roles"]);
            echo json_encode(mysqli_fetch_assoc($uno));
        } else {
            $datos = $usuarios_roles->todos();
            $todos = array();
            while ($fila = mysqli_fetch_assoc($datos)) {
                array_push($todos, $fila);
            }
            echo json_encode($todos);
        }
        break;
    case "POST":
        $datos = json_decode(file_get_contents('php://input'));
        if (!empty($datos->ID_Roles) && !empty($datos->Usuarioid)) {
            $insertar = $usuarios_roles->insertar($datos->ID_Roles, $datos->Usuarioid);
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
        if (!empty($datos->ID_usuarios_roles) && !empty($datos->ID_Roles) && !empty($datos->Usuarioid)) {
            $actualizar = $usuarios_roles->actualizar($datos->ID_usuarios_roles, $datos->ID_Roles, $datos->Usuarioid);
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
        if (!empty($datos->ID_usuarios_roles)) {
            try {
                $eliminar = $usuarios_roles->eliminar($datos->ID_usuarios_roles);
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
