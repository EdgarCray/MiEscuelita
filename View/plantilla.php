<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Escuelita</title>
    <link rel="shortcut icon" href="http://localhost/MiEscuelita/Img/icono.png" type="image/x-icon">

                    <!-- ============== Materialize ===============================-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

                <!-- ============== Materialize ===============================-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

            <!-- ============== Remix Icon ===============================-->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css" integrity="sha512-/VYneElp5u4puMaIp/4ibGxlTd2MV3kuUIroR3NSQjS2h9XKQNebRQiyyoQKeiGE9mRdjSCIZf9pb7AVJ8DhCg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

                        <!-- ============== CSS ===============================-->
    <link rel="stylesheet" href="http://localhost/MiEscuelita/Css/main.css">
</head>
<body style="background-image: url('http://localhost/MiEscuelita/Img/fondos.jfif');
            background-size: cover;">
    <header>
        <!-- ============== Menú en computadoras ============== -->
        <nav>
            <div class="nav-wrapper #ffe082 amber lighten-3">
                <a href="app.php?pagina=inicio" class="brand-logo center">Mi Escuelita</a>
                <ul id="nav-mobile" class="left hide-on-med-and-down">

                <?php if (isset($_GET["pagina"])) : ?>
                    <?php if ($_GET["pagina"] == "inicio") : ?>
                    <li><a href="app.php?pagina=inicio">Inicio</a></li>
                    <?php else: ?>

                        <li><a href="app.php?pagina=inicio">Inicio</a></li>

                        <?php endif ?>

                        <?php if ($_GET["pagina"] == "registro.alumno") : ?>
                    <li><a href="app.php?pagina=registro.alumno">Alumnos</a></li>
                    <?php else: ?>
                        <li><a href="app.php?pagina=registro.alumno">Alumnos</a></li>
                        <?php endif ?>

                        <?php if ($_GET["pagina"] == "docente") : ?>
                        <li><a href="app.php?pagina=registro.docentes">Docente</a></li>
                        <?php else: ?>
                            <li><a href="app.php?pagina=registro.docentes">Docente</a></li>
                            <?php endif ?>

                            <?php if ($_GET["pagina"] == "salir") : ?>
                    <li><a href="app.php?pagina=salir">Salir</a></li>
                    <?php else: ?>
                        <li><a href="app.php?pagina=salir">Salir</a></li>
                        <?php endif ?>

                        <?php else: ?>
                            <li><a href="app.php?pagina=inicio">Inicio</a></li>
                            <li><a href="app.php?pagina=registro.alumno">Alumnos</a></li>
                            <li><a href="app.php?pagina=registro.docentes">Docente</a></li>
                            <li><a href="app.php?pagina=salir">Salir</a></li>
                            <?php endif;?>
                </ul>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            </div>
        </nav>

                <!-- ============== Menú en teléfonos ============== -->
        <ul class="sidenav" id="mobile-demo">
        <?php if (isset($_GET["pagina"])) : ?>
                    <?php if ($_GET["pagina"] == "inicio") : ?>
                    <li><a href="app.php?pagina=inicio">Inicio</a></li>
                    <?php else: ?>

                        <li><a href="app.php?pagina=inicio">Inicio</a></li>

                        <?php endif ?>

                        <?php if ($_GET["pagina"] == "registro.alumno") : ?>
                    <li><a href="app.php?pagina=registro.alumno">Alumnos</a></li>
                    <?php else: ?>
                        <li><a href="app.php?pagina=registro.alumno">Alumnos</a></li>
                        <?php endif ?>

                        <?php if ($_GET["pagina"] == "docente") : ?>
                        <li><a href="app.php?pagina=registro.docentes">Docente</a></li>
                        <?php else: ?>
                            <li><a href="app.php?pagina=registro.docentes">Docente</a></li>
                            <?php endif ?>

                            <?php if ($_GET["pagina"] == "salir") : ?>
                    <li><a href="app.php?pagina=salir">Salir</a></li>
                    <?php else: ?>
                        <li><a href="app.php?pagina=salir">Salir</a></li>
                        <?php endif ?>

                        <?php else: ?>
                            <li><a href="app.php?pagina=inicio">Inicio</a></li>
                            <li><a href="app.php?pagina=registro.alumno">Alumnos</a></li>
                            <li><a href="app.php?pagina=registro.docentes">Docente</a></li>
                            <li><a href="app.php?pagina=salir">Salir</a></li>
                            <?php endif;?>
        </ul>
    </header>

                            <div class="contenido">
                            <?php

                                if (isset($_GET["pagina"])) {

                                    if (
                                        $_GET["pagina"] == "inicio" ||
                                        $_GET["pagina"] == "registro.alumno" ||
                                        $_GET["pagina"] == "registro.docentes" ||
                                        $_GET["pagina"] == "mostrar.alumno" ||
                                        $_GET["pagina"] == "editar.alumno" ||
                                        $_GET["pagina"] == "editar.docentes" ||
                                        $_GET["pagina"] == "mostrar.docentes" ||
                                        $_GET["pagina"] == "salir" 
                                    ) {

                                        include "paginas/" . $_GET["pagina"] . ".php";
                                    } else {
                                        include "paginas/error404.php";
                                    }
                                } else {

                                    include "paginas/inicio.php";
                                }


                                ?>
                            </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems);
        });
    </script>
    <div class="audio" style="display: none;">
        <audio id="audioPlayer" controls>
            <source src="http://localhost/MiEscuelita/Audio/Minecraft.mp3" type="audio/mpeg">
            <source src="http://localhost/MiEscuelita/Audio/Cat Minecraft.mp3" type="audio/mpeg">
        </audio>
    </div>
    <script src="http://localhost/MiEscuelita/Js/principal.js"></script>
</body>
</html>
