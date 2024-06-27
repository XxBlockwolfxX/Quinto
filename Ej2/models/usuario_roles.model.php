<?php
require_once('../config/conexion.php');
class Clase_UsuariosRoles
{

    public function todos()  // select * from usuarios_roles;
    {
        $con = new Clase_Conectar();
        $con = $con->Procedimiento_Conectar();
        $cadena = "SELECT * FROM `usuarios_roles`";
        $todos = mysqli_query($con, $cadena);
        $con->close();
        return $todos;
    }

    public function uno($ID_usuarios_roles) // select * from usuarios_roles where ID_usuarios_roles=$ID_usuarios_roles;
    {
        $con = new Clase_Conectar();
        $con = $con->Procedimiento_Conectar();
        $cadena = "SELECT * FROM `usuarios_roles` WHERE ID_usuarios_roles=$ID_usuarios_roles";
        $todos = mysqli_query($con, $cadena);
        $con->close();
        return $todos;
    }

    public function insertar($ID_Roles, $Usuarioid)
    {
        $con = new Clase_Conectar();
        $con = $con->Procedimiento_Conectar();
        $cadena = "INSERT INTO `usuarios_roles`(`ID_Roles`, `Usuarioid`) VALUES ('$ID_Roles','$Usuarioid')";
        $todos = mysqli_query($con, $cadena);
        $con->close();
        return $todos;
    }

    public function actualizar($ID_usuarios_roles, $ID_Roles, $Usuarioid)
    {
        $con = new Clase_Conectar();
        $con = $con->Procedimiento_Conectar();
        $cadena = "UPDATE `usuarios_roles` SET `ID_Roles`='$ID_Roles', `Usuarioid`='$Usuarioid' WHERE ID_usuarios_roles=$ID_usuarios_roles";
        $todos = mysqli_query($con, $cadena);
        $con->close();
        return $todos;
    }

    public function eliminar($ID_usuarios_roles)
    {
        $con = new Clase_Conectar();
        $con = $con->Procedimiento_Conectar();
        $cadena = "DELETE FROM `usuarios_roles` WHERE ID_usuarios_roles=$ID_usuarios_roles";
        $todos = mysqli_query($con, $cadena);
        $con->close();
        return $todos;
    }
}
?>
