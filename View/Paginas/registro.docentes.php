
<main>

<div class="botones">
        <a style="width: 250px; margin-top: 50px; " href="app.php?pagina=mostrar.docentes">
        <button class="login__button" style="width: 250px; margin-top: 50px; " >Ver Docentes</button></a>
    </div>
        <!-- Contenido principal de tu página -->
        <div class="login" id="registro">
        <form method="post" class="login__form">
            <h1 class="login__title">Registro de Docentes:</h1>
            <div class="login__inputs">
                <div class="login__box">
                    <input type="text" placeholder="Ingresa tu nombre" name="nombre_docente" required class="login__input">
                </div>
            </div>

            <div class="login__inputs">
                <div class="login__box">
                    <input type="email" placeholder="Ingresa tu correo" name="correo_docente" required class="login__input">
                </div>
            </div>

            <div class="login__inputs">
                <div class="login__box">
                    <input type="number" placeholder="Ingresa tu teléfono" name="telefono_docente" required class="login__input">
                </div>
            </div>

            <div class="login__inputs">
        <div class="login__box">
  <select class="browser-default" name="grado_estudio">
    <option value="" disabled selected>Selecciona tu grado de estudios:</option>
    <option value="Técnico">Técnico</option>
    <option value="Licenciatura">Licenciatura</option>
    <option value="Ingeniería">Ingeniería</option>
    <option value="Maestría">Maestría</option>
    <option value="Doctorado">Doctorado</option>
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

		$registro = ControladorFormulario::ctrRegistroDocente();

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
