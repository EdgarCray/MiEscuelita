<?php
    session_start();

class ControladorFormulario {
    /**===================================
     * INGRESAR REGISTROS DE LOS USUARIOS
    ====================================== */
    static public function ctrRegistroUsuario(){

        if (isset($_POST["nombre"])) {
            if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/',$_POST["nombre"])&&
            preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/',$_POST["usuario"])&&
            preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/',$_POST["contraseña"])) {
        
        $tablaUsuario = "usuario";

        $datosUsuario = array( "nombre" => $_POST["nombre"],
                        "usuario" => $_POST["usuario"],
                        "contraseña" => $_POST["registroCorreo"],
            );
            $respuesta = ModeloFormularios::mdlRegistroUsuario($tablaUsuario,$datosUsuario);

            return $respuesta;

        }else {

            $respuesta = "error";

            return $respuesta;
            
        }
    }
        }
    }
