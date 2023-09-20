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
    $usuario = $_POST["usuario"];
    $contraseña = $_POST["contraseña"];

    // Verificar las credenciales en la base de datos
    $sql = "SELECT nombre, contraseña FROM usuario WHERE usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row["contraseña"];

        // Verificar la contraseña
        if (password_verify($contraseña, $hashedPassword)) {
                        // Redireccionar después de establecer la variable de sesión
                        header("Location: app.php");
                        exit();
    } else {
        echo '<div class="mensaje mensaje-error">Usuario no encontrado</div>';
    }
    }
    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Escuelita</title>
        <!-- ============== Remix Icon ===============================-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css" integrity="sha512-/VYneElp5u4puMaIp/4ibGxlTd2MV3kuUIroR3NSQjS2h9XKQNebRQiyyoQKeiGE9mRdjSCIZf9pb7AVJ8DhCg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- ============== CSS ===============================-->
    <link rel="stylesheet" href="http://localhost/MiEscuelita/Css/main.css">
</head>
<body>
    <div class="login">
        <img src="http://localhost/MiEscuelita/Img/☆.jfif" alt="Imagen" class="login__bg">
        <form method="post" class="login__form">
            <h1 class="login__title">Inicio de Sesión</h1>
            <div class="login__inputs">
                <div class="login__box">
                    <input type="email" placeholder="Ingresa tu usuario" name="usuario" required class="login__input">
                    <i class="ri-mail-fill"></i>
                </div>
            </div>

            <div class="login__inputs">
                <div class="login__box">
                    <input type="password" placeholder="Ingresa tu contraseña" id="campo-contraseña" name="contraseña" required class="login__input">
                    <i class="ri-git-repository-private-line"></i>
                </div>
            </div>
            <div class="login__check">
                <div class="login__check-box">
                    <input type="checkbox" class="login__check-input" onclick="mostrarContraseña()" id="user-check">
                    <label for="user-check" class="login__check-label">Mostrar contraseña</label>
                    <script>
            function mostrarContraseña() {
        var passwordInput = document.getElementById("campo-contraseña");

            if (passwordInput.type === "password") {
            passwordInput.type = "text";
                } else {
            passwordInput.type = "password";
                }
            }
            </script>
                </div>
                <a href="#" class="login__forgot">¿Olvidaste tu contraseña?</a>
            </div>
            <button type="submit" class="login__button">Iniciar sesión</button>
            <div class="login__register">
                ¿No tienes una cuenta? <a href="http://localhost/MiEscuelita/View/Paginas/registro.usuario.php">Registrarse</a>
            </div>
        </form>
    </div>
</body>
</html>