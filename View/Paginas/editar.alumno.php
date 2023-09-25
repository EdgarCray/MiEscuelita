
<main>
    <div class="botones">
        <a  href="app.php?pagina=mostrar.alumno">
        <button style="width: 250px; margin-top: 50px; ">Ver Alumnos</button></a>
    </div>
        <!-- Contenido principal de tu página -->
        <div class="login" id="registro">

        <?php

if (isset($_GET["idAlumno"])) {
    
    $item = "idAlumno";
    $valor = $_GET["idAlumno"];
    $alumnos = ControladorFormulario::ctrMostrarAlumno($item,$valor);

}

?>
        <form method="post" class="login__form">
            <h1 class="login__title">Editar Datos de Alumnos:</h1>
            <div class="login__inputs">
                <div class="login__box">
                    <input type="text" value="<?php echo $alumnos["nombre"] ;?>" placeholder="Ingresa tu nombre" name="nombre_alumnoA" required class="login__input">
                </div>
            </div>

            <div class="login__inputs">
                <div class="login__box">
                    <input type="text" value="<?php echo $alumnos["apellido_p"] ;?>" placeholder="Ingresa tu apellido paterno" name="apellido_pA" required class="login__input">
                </div>
            </div>
                
            <div class="login__inputs">
                <div class="login__box">
                    <input type="text" value="<?php echo $alumnos["apellido_m"] ;?>" placeholder="Ingresa tu apellido materno" name="apellido_mA" required class="login__input">
                </div>
            </div>

            <div class="login__inputs">
                <div class="login__box">
                    <input type="number" value="<?php echo $alumnos["edad"] ;?>" placeholder="Ingresa tu edad" name="edad_alumnoA" required class="login__input">
                </div>
            </div>

            <div class="login__inputs">
                <div class="login__box">
                    <input type="email" value="<?php echo $alumnos["correo"] ;?>" placeholder="Ingresa tu correo" name="correoA" required class="login__input">
                    <input type="number" style="display: none;" value="<?php echo $alumnos["idAlumno"] ;?>" name="idAlumnoA">
                </div>
            </div>
            

            <div class="login__inputs">
        <div class="login__box">
        <select class="browser-default" name="generoA">
    <option value="" disabled>Selecciona tu género:</option>
    <option value="Masculino"<?php if ($alumnos["genero"] == "Masculino") echo " selected";?>>Masculino</option>
    <option value="Femenino"<?php if ($alumnos["genero"] == "Femenino") echo " selected";?>>Femenino</option>
</select>

        </div>
    </div>

    <div class="login__inputs">
    <div class="login__box">
        <select class="browser-default" name="gradoA">
            <option value="" disabled selected>Selecciona tu grado:</option>
            <option value="1" <?php echo ($alumnos["grado"] == 1) ? 'selected' : ''; ?>>1er. Cuatrimestre</option>
            <option value="2" <?php echo ($alumnos["grado"] == 2) ? 'selected' : ''; ?>>2do. Cuatrimestre</option>
            <option value="3" <?php echo ($alumnos["grado"] == 3) ? 'selected' : ''; ?>>3er. Cuatrimestre</option>
            <option value="4" <?php echo ($alumnos["grado"] == 4) ? 'selected' : ''; ?>>4to. Cuatrimestre</option>
            <option value="5" <?php echo ($alumnos["grado"] == 5) ? 'selected' : ''; ?>>5to. Cuatrimestre</option>
            <option value="6" <?php echo ($alumnos["grado"] == 6) ? 'selected' : ''; ?>>6to. Cuatrimestre</option>
            <option value="7" <?php echo ($alumnos["grado"] == 7) ? 'selected' : ''; ?>>7mo. Cuatrimestre</option>
            <option value="8" <?php echo ($alumnos["grado"] == 8) ? 'selected' : ''; ?>>8vo. Cuatrimestre</option>
            <option value="9" <?php echo ($alumnos["grado"] == 9) ? 'selected' : ''; ?>>9no. Cuatrimestre</option>
            <option value="10" <?php echo ($alumnos["grado"] == 10) ? 'selected' : ''; ?>>10mo. Cuatrimestre</option>
            <option value="11" <?php echo ($alumnos["grado"] == 11) ? 'selected' : ''; ?>>11vo. Cuatrimestre</option>
        </select>
    </div>
</div>


    <div class="login__inputs">
    <div class="login__box">
        <select class="browser-default" name="grupoA">
            <option value="" disabled>Selecciona tu grupo:</option>
            <option value="A"<?php if ($alumnos["grupo"] == "A") echo " selected"; ?>>A</option>
            <option value="B"<?php if ($alumnos["grupo"] == "B") echo " selected"; ?>>B</option>
            <option value="C"<?php if ($alumnos["grupo"] == "C") echo " selected"; ?>>C</option>
        </select>
    </div>
</div>


    <?php

$actualizarAlumno = ControladorFormulario::ctrActualizarAlumno();

                
if ($actualizarAlumno == "ok") {
    
    echo '<div class="alert alert-success" style="display: none";>El usuario ha sido actualizado</div>
    <script>

                            if(window.history.replaceState){

                                window.history.replaceState(null, null, window.location.href);

                            } 
                            setTimeout(function(){
                                window.location ="app.php?pagina=mostrar.alumno";
                            },100); </script>'; 

}

if ($actualizarAlumno == "error") {
    
    echo 'Error';
    
}

?>

            <button type="submit" class="login__button">Editar</button>

        </form>
    </div>
    </main>
