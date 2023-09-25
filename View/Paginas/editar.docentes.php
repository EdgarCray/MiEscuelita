
<main>
    <div class="botones">
        <a href="app.php?pagina=mostrar.docentes">
        <button style="width: 250px; margin-top: 50px; ">Ver Docentes</button></a>
    </div>
        <!-- Contenido principal de tu página -->
        <div class="login" id="registro">
        <form method="post" class="login__form">
        <?php

if (isset($_GET["idProfesor"])) {
    
    $item = "idProfesor";
    $valor = $_GET["idProfesor"];
    $docentes = ControladorFormulario::ctrMostrarDocente($item,$valor);

}

?>
            <h1 class="login__title">Registro de Docentes:</h1>
            <div class="login__inputs">
                <div class="login__box">
                    <input type="text" value="<?php echo $docentes["nombre"] ;?>" placeholder="Ingresa tu nombre" name="nombre_docenteD" required class="login__input">
                </div>
            </div>

            <div class="login__inputs">
                <div class="login__box">
                    <input type="email" value="<?php echo $docentes["correo"] ;?>" placeholder="Ingresa tu correo" name="correo_docenteD" required class="login__input">
                </div>
            </div>

            <div class="login__inputs">
                <div class="login__box">
                    <input type="number" value="<?php echo $docentes["telefono"] ;?>" placeholder="Ingresa tu teléfono" name="telefono_docenteD" required class="login__input">
                    <input type="hidden" name="idProfesorD" value="<?php echo $docentes["idProfesor"] ;?>" >
                </div>
            </div>

            <div class="login__inputs">
        <div class="login__box">
  <select class="browser-default" name="grado_estudioD">
    <option value="" disabled selected>Selecciona tu grado de estudios:</option>
    <option value="Técnico" <?php if ($docentes["gradoEstudio"] == "Técnico") echo " selected";?>>Técnico</option>
    <option value="Licenciatura" <?php if ($docentes["gradoEstudio"] == "Licenciatura") echo " selected";?>>Licenciatura</option>
    <option value="Ingeniería" <?php if ($docentes["gradoEstudio"] == "Ingeniería") echo " selected";?>>Ingeniería</option>
    <option value="Maestría" <?php if ($docentes["gradoEstudio"] == "Maestría") echo " selected";?>>Maestría</option>
    <option value="Doctorado" <?php if ($docentes["gradoEstudio"] == "Doctorado") echo " selected";?>>Doctorado</option>
  </select>
        </div>
    </div>

    <?php

$actualizarDocente = ControladorFormulario::ctrActualizarDocente();

                
if ($actualizarDocente == "ok") {
    
    echo '<div class="alert alert-success" style="display: none";>El usuario ha sido actualizado</div>
    <script>

                            if(window.history.replaceState){

                                window.history.replaceState(null, null, window.location.href);

                            } 
                            setTimeout(function(){
                                window.location ="app.php?pagina=mostrar.docentes";
                            },100); </script>'; 

}

if ($actualizarDocente == "error") {
    
    echo 'Error';
    
}

?>
            <button type="submit" class="login__button">Registrar</button>

        </form>
    </div>
    </main>
