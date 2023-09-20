<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Inicio</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="http://localhost/MiEscuelita/Css/main.css">
</head>
<body style="background-image: url('http://localhost/MiEscuelita/Img/☆.jfif');
            background-repeat: no-repeat;
            background-size: cover;">
    <header>
        <nav>
            <div class="nav-wrapper blue">
                <a href="#" class="brand-logo center">Mi Escuelita</a>
                <ul id="nav-mobile" class="left hide-on-med-and-down">
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Alumnos</a></li>
                    <li><a href="#">Docente</a></li>
                    <li><a href="http://localhost/MiEscuelita/View/Paginas/salir.php">Salir</a></li>
                </ul>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            </div>
        </nav>
        <ul class="sidenav" id="mobile-demo">
            <li><a href="#">Inicio</a></li>
            <li><a href="#">Acerca de</a></li>
            <li><a href="#">Contacto</a></li>
        </ul>
    </header>

    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems);
        });
    </script>
</body>
</html>
