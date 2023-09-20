<?php

// Destruye la sesión
session_destroy();

// Redirige a index.php
echo '<script>window.location = "http://localhost/MiEscuelita/index.php"</script>';
exit();
?>
