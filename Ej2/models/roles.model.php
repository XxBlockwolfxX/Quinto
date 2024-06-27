<?php
require_once('../config/conexion.php');
class Clase_Roles
{

    public function todos()  // select * from roles;
    {
        $con = new Clase_Conectar();
        $con = $con->Procedimiento_Conectar();
        $cadena = "SELECT * FROM `roles`";
        $todos = mysqli_query($con, $cadena);
        $con->close();
        return $todos;
    }

    public function uno($ID_Roles) // select * from roles where ID_Roles=$ID_Roles;
    {
        $con = new Clase_Conectar();
        $con = $con->Procedimiento_Conectar();
        $cadena = "SELECT * FROM `roles` WHERE ID_Roles=$ID_Roles";
        $todos = mysqli_query($con, $cadena);
        $con->close();
        return $todos;
    }

    public function insertar($Roles)
    {
        $con = new Clase_Conectar();
        $con = $con->Procedimiento_Conectar();
        $cadena = "INSERT INTO `roles`(`Roles`) VALUES ('$Roles')";
        $todos = mysqli_query($con, $cadena);
        $con->close();
        return $todos;
    }

    public function actualizar($ID_Roles, $Roles)
    {
        $con = new Clase_Conectar();
        $con = $con->Procedimiento_Conectar();
        $cadena = "UPDATE `roles` SET `Roles`='$Roles' WHERE ID_Roles=$ID_Roles";
        $todos = mysqli_query($con, $cadena);
        $con->close();
        return $todos;
    }

    public function eliminar($ID_Roles)
    {
        $con = new Clase_Conectar();
        $con = $con->Procedimiento_Conectar();
        $cadena = "DELETE FROM `roles` WHERE ID_Roles=$ID_Roles";
        $todos = mysqli_query($con, $cadena);
        $con->close();
        return $todos;
    }
}
?>
