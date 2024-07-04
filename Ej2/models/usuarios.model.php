<?php
// php es un lenguaje de programacion interpretado, por lo que no se compila, se ejecuta en el servidor
require_once('../config/conexion.php');
class Clase_Usuarios
{
    //TODO: procedimiento para obtener todos los usuarios de la base de datos
    public function todos()  ///select * from usuarios;
    {
        //instanciar la clase conectar
        $con = new Clase_Conectar();
        //usar el procedimiento para conectar
        $con = $con->Procedimiento_Conectar();
        //ejecutar la consulta
        $cadena = "SELECT * FROM `usuarios`";
        //guardar la consulta en una variable
        $todos = mysqli_query($con, $cadena);
        //cerrar la conexion
        $con->close();
        //retornar la consulta
        return $todos;
    }
    public function uno($UsuarioId) //select * from usuarios where UsuarioId=$UsuarioId;
    {
        $con = new Clase_Conectar();
        $con = $con->Procedimiento_Conectar();
        $cadena = "SELECT * FROM `usuarios` where UsuarioId=$UsuarioId";
        $todos = mysqli_query($con, $cadena);
        $con->close();
        return $todos;
    }
    public function insertar($Nombre, $correo, $password, $estado)
    {
        $con = new Clase_Conectar();
        $con = $con->Procedimiento_Conectar();
        $cadena = "INSERT INTO `usuarios`(`Nombre`, `correo`, `password`, `estado`) VALUES ('$Nombre','$correo','$password',$estado)";
        $todos = mysqli_query($con, $cadena);
        $con->close();
        return $todos;
    }
    public function actualizar($UsuarioId, $Nombre, $correo, $password, $estado)
    {
        $con = new Clase_Conectar();
        $con = $con->Procedimiento_Conectar();
        $cadena = "UPDATE `usuarios` SET `Nombre`='$Nombre',`correo`='$correo',`password`='$password',`estado`=$estado WHERE UsuarioId=$UsuarioId";
        $todos = mysqli_query($con, $cadena);
        $con->close();
        return $todos;
    }
    public function actualizar_Estado($UsuarioId, $estado)
    {
        $con = new Clase_Conectar();
        $con = $con->Procedimiento_Conectar();
        $cadena = "UPDATE `usuarios` SET `estado`=$estado WHERE UsuarioId=$UsuarioId";
        $todos = mysqli_query($con, $cadena);
        $con->close();
        return $todos;
    }
    public function eliminar($UsuarioId)
    {
        $con = new Clase_Conectar();
        $con = $con->Procedimiento_Conectar();
        $cadena = "DELETE FROM `usuarios` where UsuarioId=$UsuarioId";
        $todos = mysqli_query($con, $cadena);
        $con->close();
        return $todos;
    }

    //llamar esta consulta desde controlador
    public function login($correo, $password)
    {
        $con = new Clase_Conectar();
        $con = $con->Procedimiento_Conectar();
        $cadena = "SELECT * FROM `usuarios` WHERE `correo` = '$correo' AND `password`='$password' and estado = 1";
        $todos = mysqli_query($con, $cadena);
        $con->close();
        return $todos;
    }
    public function loginCorreo($correo)
    {
        $con = new Clase_Conectar();
        $con = $con->Procedimiento_Conectar();
        $cadena = "SELECT * FROM `usuarios` WHERE `correo` = '$correo'";
        $todos = mysqli_query($con, $cadena);
        $con->close();
        return $todos;
    }
    public function loginParametros($correo, $password) //mayor seguridad
    {
        $con = new Clase_Conectar();
        $con = $con->Procedimiento_Conectar();
        $cadena = "SELECT * FROM `usuarios` WHERE `correo` = '?' AND `password`='?' ";
        $stmt = $con->prepare($cadena);
        $stmt->bind_param('ss', $correo, $password);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            return $result;
        }
    }
}
