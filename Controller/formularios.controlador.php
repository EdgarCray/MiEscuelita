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

            /**===================================
     * INGRESAR REGISTROS DE LOS ALUMNOS
    ====================================== */
    static public function ctrRegistroAlumno(){

        if (isset($_POST["nombre_alumno"])) {

            $tablaAlumno = "alumno";

            $datosAlumno = array( "nombre" => $_POST["nombre_alumno"],
                            "apellido_p" => $_POST["apellido_p"],
                            "apellido_m" => $_POST["apellido_m"],
                            "edad" => $_POST["edad_alumno"],
                            "correo" => $_POST["correo"],
                            "genero" => $_POST["genero"],
                            "grado" => $_POST["grado"],
                            "grupo" => $_POST["grupo"] );  
                            
                $respuesta = ModeloFormularios::mdlRegistroAlumno($tablaAlumno,$datosAlumno);

                return $respuesta;

            }else {

                $respuesta = "error";

                return $respuesta;
                
            }
        }

        /**===================================
 * MOSTRAR LOS REGISTROS DE LOS AlUMNOS
====================================== */
static public function ctrMostrarAlumno($item,$valor){

    $tablaAlumno = "alumno";

    $respuesta = ModeloFormularios::mdlMostrarAlumno($tablaAlumno,$item,$valor);

    return $respuesta;

}

/**===================================
 * EDITAR LOS REGISTROS DE LOS ALUMNOS
====================================== */
static public function ctrActualizarAlumno(){

    if (isset($_POST["nombre_alumnoA"])) {
        
        $tablaAlumno = "alumno";
        
        $datosAlumno = array( "idAlumno" => $_POST["idAlumnoA"],
        "nombre" => $_POST["nombre_alumnoA"],
        "apellido_p" => $_POST["apellido_pA"],
        "apellido_m" => $_POST["apellido_mA"],
        "edad" => $_POST["edad_alumnoA"],
        "correo" => $_POST["correoA"],
        "genero" => $_POST["generoA"],
        "grado" => $_POST["gradoA"],
        "grupo" => $_POST["grupoA"]
    );

                        $respuesta = ModeloFormularios::mdlActualizarAlumno($tablaAlumno,$datosAlumno);

                        return $respuesta;

        }else {
            
            #$respuesta = "error";

            #return $respuesta;

        }
    }



       /**===================================
     * ELIMINAR LOS REGISTROS DE LOS USUARIOS
    ====================================== */

    public function ctrEliminarAlumno(){

        if (isset($_POST["eliminarAlumno"])) {
            
            $tablaAlumno = "alumno";

            $valor = $_POST["eliminarAlumno"];

            $respuesta = ModeloFormularios::mdlEliminarAlumno($tablaAlumno,$valor);

            if ($respuesta == "ok") {

                echo '<script>

                if(window.history.replaceState){
    
                    window.history.replaceState(null, null, window.location.href);
    
                }
                window.location = "app.php?pagina=mostrar.alumno"

                </script>';
                
            }

            return $respuesta;

        }


    }

            /**===================================
     * INGRESAR REGISTROS DE LOS DOCENTES
    ====================================== */
    static public function ctrRegistroDocente(){

        if (isset($_POST["nombre_docente"])) {

            $tablaDocente = "profesor";

            $datosDocente = array( 
            "nombre_docente" => $_POST["nombre_docente"],
            "correo_docente" => $_POST["correo_docente"],
            "telefono_docente" => $_POST["telefono_docente"],
                            "grado_estudio" => $_POST["grado_estudio"]
                            );
                            
                $respuesta = ModeloFormularios::mdlRegistroDocente($tablaDocente,$datosDocente);

                return $respuesta;

            }else {

                $respuesta = "error";

                return $respuesta;
                
            }
        }

    /**===================================
 * MOSTRAR LOS REGISTROS DE LOS DOCENTES
====================================== */
static public function ctrMostrarDocente($item,$valor){

    $tablaDocente = "profesor";

    $respuesta = ModeloFormularios::mdlMostrarDocente($tablaDocente,$item,$valor);

    return $respuesta;

}

/**===================================
 * EDITAR LOS REGISTROS DE LOS DOCENTES
====================================== */
static public function ctrActualizarDocente(){

    if (isset($_POST["nombre_docenteD"])) {
        
        $tablaDocente = "profesor";
        
        $datosDocente = array( "idProfesor" => $_POST["idProfesorD"],
        "nombre" => $_POST["nombre_docenteD"],
        "telefono" => $_POST["telefono_docenteD"],
        "correo" => $_POST["correo_docenteD"],
        "gradoEstudio" => $_POST["grado_estudioD"]
    );

                        $respuesta = ModeloFormularios::mdlActualizarDocente($tablaDocente,$datosDocente);

                        return $respuesta;

        }else {
            
            #$respuesta = "error";

            #return $respuesta;

        }
    }



       /**===================================
     * ELIMINAR LOS REGISTROS DE LOS USUARIOS
    ====================================== */

    public function ctrEliminarDocente(){

        if (isset($_POST["eliminarDocente"])) {
            
            $tablaDocente = "profesor";

            $valor = $_POST["eliminarDocente"];

            $respuesta = ModeloFormularios::mdlEliminarDocente($tablaDocente,$valor);

            if ($respuesta == "ok") {

                echo '<script>

                if(window.history.replaceState){
    
                    window.history.replaceState(null, null, window.location.href);
    
                }
                window.location = "app.php?pagina=mostrar.docentes"

                </script>';
                
            }

            return $respuesta;

        }


    }
    }
