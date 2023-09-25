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

    /**=====================================
     * INGRESAR REGISTROS DE LOS ALUMNOS
    ======================================= */

    static public function mdlRegistroAlumno($tablaAlumno, $datosAlumno){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tablaAlumno (nombre, apellido_p, apellido_m, edad, genero, grado, grupo, correo) VALUES(:nombre, :apellido_p, :apellido_m, :edad, :genero, :grado, :grupo, :correo)");
    
        $stmt -> bindParam(":nombre", $datosAlumno["nombre"], PDO::PARAM_STR);
        $stmt -> bindParam(":apellido_p", $datosAlumno["apellido_p"], PDO::PARAM_STR);
        $stmt -> bindParam(":apellido_m", $datosAlumno["apellido_m"], PDO::PARAM_STR);
        $stmt -> bindParam(":edad", $datosAlumno["edad"], PDO::PARAM_INT);
        $stmt -> bindParam(":genero", $datosAlumno["genero"], PDO::PARAM_STR);
        $stmt -> bindParam(":grado", $datosAlumno["grado"], PDO::PARAM_STR);
        $stmt -> bindParam(":grupo", $datosAlumno["grupo"], PDO::PARAM_STR);
        $stmt -> bindParam(":correo", $datosAlumno["correo"], PDO::PARAM_STR);
    
    
        if ($stmt -> execute()) {
            return "ok";
        } else {
            print_r(Conexion::conectar()->errorInfo());
        }
    }


/* MOSTRAR LOS REGISTROS DE LOS ALUMNOS 
======================================= */

static public function mdlMostrarAlumno($tablaDocente,$item,$valor){

    if ($item == null && $valor == null) {
        
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tablaDocente ORDER BY idAlumno DESC LIMIT 10");
        $stmt->execute();
        return $stmt ->fetchall();

    }else {
        
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tablaDocente WHERE $item = :$item ORDER BY idAlumno DESC LIMIT 10");

        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt -> fetch();
    }

}

    /**=====================================
     * ACTUALIZAR LOS REGISTROS DE LOS ALUMNOS 
    ======================================= */

    static public function mdlActualizarAlumno($tablaAlumno,$datosAlumno){

        $stmt = Conexion::conectar() -> prepare("UPDATE $tablaAlumno SET apellido_p=:apellido_p, nombre=:nombre,  apellido_m=:apellido_m, edad=:edad, genero=:genero, grado=:grado, grupo=:grupo, correo=:correo WHERE idAlumno=:idAlumno");

        $stmt -> bindParam(":apellido_p", $datosAlumno["apellido_p"], PDO::PARAM_STR);
        $stmt -> bindParam(":nombre", $datosAlumno["nombre"], PDO::PARAM_STR);
        $stmt -> bindParam(":apellido_m", $datosAlumno["apellido_m"], PDO::PARAM_STR);
        $stmt -> bindParam(":edad", $datosAlumno["edad"], PDO::PARAM_INT);
        $stmt -> bindParam(":genero", $datosAlumno["genero"], PDO::PARAM_STR);
        $stmt -> bindParam(":grado", $datosAlumno["grado"], PDO::PARAM_STR);
        $stmt -> bindParam(":grupo", $datosAlumno["grupo"], PDO::PARAM_STR);
        $stmt -> bindParam(":correo", $datosAlumno["correo"], PDO::PARAM_STR);
        $stmt -> bindParam(":idAlumno", $datosAlumno["idAlumno"], PDO::PARAM_INT);

        if ($stmt -> execute()) {
            return "ok";
        }else {
            print_r(Conexion::conectar()->errorInfo());
        }
    }

         /**===================================
     * ElIMINAR LOS REGISTROS DE LOS ALUMNOS
    ====================================== */

    static public function mdlEliminarAlumno($tablaAlumno,$valor){

        $stmt = Conexion::conectar() -> prepare("DELETE FROM $tablaAlumno WHERE idAlumno=:idAlumno");

        $stmt -> bindParam(":idAlumno",$valor,PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        }else{
            print_r(Conexion::conectar()->errorInfo());
        }

    }
    /**=====================================
     * INGRESAR REGISTROS DE LOS DOCENTES
    ======================================= */

    static public function mdlRegistroDocente($tablaDocente, $datosDocente){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tablaDocente (nombre, gradoEstudio, telefono, correo) VALUES(:nombre_docente, :grado_estudio, :telefono_docente, :correo_docente)");
    
        $stmt -> bindParam(":nombre_docente", $datosDocente["nombre_docente"], PDO::PARAM_STR);
        $stmt -> bindParam(":grado_estudio", $datosDocente["grado_estudio"], PDO::PARAM_STR);
        $stmt -> bindParam(":telefono_docente", $datosDocente["telefono_docente"], PDO::PARAM_STR);
        $stmt -> bindParam(":correo_docente", $datosDocente["correo_docente"], PDO::PARAM_STR);
    
    
        if ($stmt -> execute()) {
            return "ok";
        } else {
            print_r(Conexion::conectar()->errorInfo());
        }
    }

    /* MOSTRAR LOS REGISTROS DE LOS DOCENTES 
======================================= */

static public function mdlMostrarDocente($tablaDocente,$item,$valor){

    if ($item == null && $valor == null) {
        
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tablaDocente ORDER BY idProfesor DESC LIMIT 10");
        $stmt->execute();
        return $stmt ->fetchall();

    }else {
        
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tablaDocente WHERE $item = :$item ORDER BY idProfesor DESC LIMIT 10");

        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt -> fetch();
    }

}

    /**=====================================
     * ACTUALIZAR LOS REGISTROS DE LOS DOCENTES 
    ======================================= */

    static public function mdlActualizarDocente($tablaDocente,$datosDocente){

        $stmt = Conexion::conectar() -> prepare("UPDATE $tablaDocente SET nombre=:nombre, gradoEstudio=:gradoEstudio, telefono=:telefono, correo=:correo WHERE idProfesor=:idProfesor");

        $stmt -> bindParam(":nombre", $datosDocente["nombre"], PDO::PARAM_STR);
        $stmt -> bindParam(":gradoEstudio", $datosDocente["gradoEstudio"], PDO::PARAM_STR);
        $stmt -> bindParam(":telefono", $datosDocente["telefono"], PDO::PARAM_INT);
        $stmt -> bindParam(":correo", $datosDocente["correo"], PDO::PARAM_STR);
        $stmt -> bindParam(":idProfesor", $datosDocente["idProfesor"], PDO::PARAM_INT);

        if ($stmt -> execute()) {
            return "ok";
        }else {
            print_r(Conexion::conectar()->errorInfo());
        }
    }

        /**===================================
     * ElIMINAR LOS REGISTROS DE LOS ALUMNOS
    ====================================== */

    static public function mdlEliminarDocente($tablaDocente,$valor){

        $stmt = Conexion::conectar() -> prepare("DELETE FROM $tablaDocente WHERE idProfesor=:idDocente");

        $stmt -> bindParam(":idDocente",$valor,PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        }else{
            print_r(Conexion::conectar()->errorInfo());
        }

    }
}