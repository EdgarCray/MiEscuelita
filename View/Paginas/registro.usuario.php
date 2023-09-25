<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Escuelita</title>
    <link rel="shortcut icon" href="http://localhost/MiEscuelita/Img/icono.png" type="image/x-icon">
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
        <!-- ============== Remix Icon ===============================-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css" integrity="sha512-/VYneElp5u4puMaIp/4ibGxlTd2MV3kuUIroR3NSQjS2h9XKQNebRQiyyoQKeiGE9mRdjSCIZf9pb7AVJ8DhCg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- ============== CSS ===============================-->
    <link rel="stylesheet" href="http://localhost/MiEscuelita/Css/main.css">

        <!--====================Sweet Alert ==================-->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "miescuelita";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recopilar datos del formulario
    $nombre = $_POST["nombre"];
    $usuario = $_POST["usuario"];
    $contraseña = $_POST["contraseña"];

    // Encriptar la contraseña
    $hashedPassword = password_hash($contraseña, PASSWORD_BCRYPT);

    // Verificar si el usuario ya existe
    $sql = "SELECT COUNT(*) FROM usuario WHERE usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count > 0) {
        echo '<div class="mensaje mensaje-error">El usuario ya existe</div>';
    } else {
        // Preparar la consulta de inserción
        $sql = "INSERT INTO usuario (nombre, usuario, contraseña) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $nombre, $usuario, $hashedPassword);

        if ($stmt->execute()) {
            echo '<div class="mensaje mensaje-exito">Registro exitoso</div>';
        } else {
            echo '<div class="mensaje mensaje-error">Error al registrar el usuario: ' . $stmt->error . '</div>';
        }

        $stmt->close();
    }
}

$conn->close();
?>
</head>
<body>
    <div class="login">
        <img src="http://localhost/MiEscuelita/Img/fondo.jfif" alt="Imagen" class="login__bg">
        <form method="post" class="login__form">
            <h1 class="login__title">Registro de Usuario</h1>
            <div class="login__inputs">
                <div class="login__box">
                    <input type="text" placeholder="Ingresa tu nombre" name="nombre" required class="login__input">
                    <i class="ri-user-5-fill"></i>             
                </div>
            </div>

            <div class="login__inputs">
                <div class="login__box">
                    <input type="email" placeholder="Ingresa tu correo electrónico" name="usuario" required class="login__input">
                    <i class="ri-mail-fill"></i>
                </div>
            </div>

            <div class="login__inputs">
                <div class="login__box">
                    <input type="password" placeholder="Ingresa una contraseña" name="contraseña" required class="login__input" id="input-contraseña">
                    <i class="ri-git-repository-private-line"></i>
                </div>
            </div>
            <div class="login__check">
                <div class="login__check-box">
                    <input type="checkbox" class="login__check-input" id="user-check" onclick="mostrarContraseña()">
                    <label for="user-check" class="login__check-label">Ver contraseña</label>
                    <script>
            function mostrarContraseña() {
        var passwordInput = document.getElementById("input-contraseña");

            if (passwordInput.type === "password") {
            passwordInput.type = "text";
                } else {
            passwordInput.type = "password";
                }
            }
            </script>



                </div>
            </div>
            <button type="submit" class="login__button">Registrarse</button>
            <div class="login__register">
                ¿Ya tienes una cuenta? <a href="http://localhost/MiEscuelita/index.php">Iniciar Sesión</a>
            </div>
        </form>
    </div>
</body>
</html>