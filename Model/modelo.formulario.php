<?php
require_once "conexion.php";


class ModeloFormularios{
/**=====================================
     * INGRESAR REGISTROS DE LOS USUARIOS
    ======================================= */

    static public function mdlRegistroUsuario($tablaUsuario, $datosUsuario){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tablaUsuario (nombre, usuario, contraseña) VALUES(:nombre, :usuario, :contraseña)");
    
        $stmt -> bindParam(":nombre", $datosUsuario["nombre"], PDO::PARAM_STR);
        $stmt -> bindParam(":usuario", $datosUsuario["usuario"], PDO::PARAM_STR);
    
        // Encriptar la contraseña antes de guardarla en la base de datos
        $contraseñaEncriptada = password_hash($datosUsuario["contraseña"], PASSWORD_DEFAULT);
        $stmt -> bindParam(":contraseña", $contraseñaEncriptada, PDO::PARAM_STR);
    
        if ($stmt -> execute()) {
            return "ok";
        } else {
            print_r(Conexion::conectar()->errorInfo());
        }
    }
    
}