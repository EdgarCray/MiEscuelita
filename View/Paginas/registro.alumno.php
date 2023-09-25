
<main>
<div class="botones">
        <a style="width: 250px; margin-top: 50px; " href="app.php?pagina=mostrar.alumno">
        <button class="login__button" style="width: 250px; margin-top: 50px; " >Ver Alumnos</button></a>
    </div>
        <!-- Contenido principal de tu página -->
        <div class="login" id="registro">
        <form method="post" class="login__form">
            <h1 class="login__title">Registro de Alumnos:</h1>
            <div class="login__inputs">
                <div class="login__box">
                    <input type="text" placeholder="Ingresa tu nombre" name="nombre_alumno" required class="login__input">
                </div>
            </div>

            <div class="login__inputs">
                <div class="login__box">
                    <input type="text" placeholder="Ingresa tu apellido paterno" name="apellido_p" required class="login__input">
                </div>
            </div>
                
            <div class="login__inputs">
                <div class="login__box">
                    <input type="text" placeholder="Ingresa tu apellido materno" name="apellido_m" required class="login__input">
                </div>
            </div>

            <div class="login__inputs">
                <div class="login__box">
                    <input type="number" placeholder="Ingresa tu edad" name="edad_alumno" required class="login__input">
                </div>
            </div>

            <div class="login__inputs">
                <div class="login__box">
                    <input type="email" placeholder="Ingresa tu correo" name="correo" required class="login__input">
                </div>
            </div>

            <div class="login__inputs">
        <div class="login__box">
  <select class="browser-default" name="genero">
    <option value="" disabled selected>Selecciona tu genero:</option>
    <option value="Masculino">Masculino</option>
    <option value="Femenino">Femenino</option>
  </select>
        </div>
    </div>

    <div class="login__inputs">
        <div class="login__box">
  <select class="browser-default" name="grado">
    <option value="" disabled selected>Selecciona tu grado:</option>
    <option value="1">1er. Cuatrimestre</option>
    <option value="2">2do. Cuatrimestre</option>
    <option value="3">3er. Cuatrimestre</option>
    <option value="4">4to. Cuatrimestre</option>
    <option value="5">5to. Cuatrimestre</option>
    <option value="6">6to. Cuatrimestre</option>
    <option value="7">7mo. Cuatrimestre</option>
    <option value="8">8vo. Cuatrimestre</option>
    <option value="9">9no. Cuatrimestre</option>
    <option value="10">10mo. Cuatrimestre</option>
    <option value="11">11vo. Cuatrimestre</option>
  </select>
        </div>
    </div>

    <div class="login__inputs">
        <div class="login__box">
  <select class="browser-default" name="grupo">
    <option value="" disabled selected>Selecciona tu grupo:</option>
    <option value="A">A</option>
    <option value="B">B</option>
    <option value="C">C</option>
  </select>
        </div>
    </div>

    <style>
        .mensaje {
            padding: 10px;
            margin: 10px;
            border-radius: 5px;
            font-weight: bold;
        }

        .mensaje-exito {
            background-color: #4CAF50;
            color: #FFF;
        }

        .mensaje-error {
            background-color: #FF5733;
            color: #FFF;
        }
    </style>
    <?php 

		$registro = ControladorFormulario::ctrRegistroAlumno();

        if ($registro == "ok") {

            echo '<div class="mensaje mensaje-exito">Registro exitoso</div>';
		}

		if ($registro == "error") {

			
            #echo '<div class="mensaje mensaje-error">Error al registrar el usuario:</div>';
		}
			
		?>

            <button type="submit" class="login__button">Registrar</button>

        </form>
    </div>
    </main>
