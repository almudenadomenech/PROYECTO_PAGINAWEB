<?php
include('../includes/navbar.php'); 
include('../includes/conexion.php'); // Conexión a la base de datos

// Iniciar sesión

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: ../paginas/login.php");
    exit;
}

// Obtener datos del usuario logueado
$user_id = $_SESSION['id']; 
$query = "SELECT * FROM usuarios WHERE id = '$user_id'";
$result = mysqli_query($link, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result); // Cargar datos del usuario
} else {
    $user = null; // Usuario nuevo o no encontrado
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Usuario</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="heading" style="background:url(../images/header-3.jpg) no-repeat">
    <h1 style="font-size: 45px;">Formulario de Usuario</h1>
</div>

<section class="booking">
    <h1 class="heading-title">Actualizar Perfil</h1>

    <form action="guardar_datos.php" method="POST" class="booking-form">
        <div class="flex">
            <div class="inputBox">
                <span>Usuario:</span>
                <input type="text" name="usuario" placeholder="Introduce tu usuario" required>
            </div>
            <div class="inputBox">
                <span>Apellidos:</span>
                <input type="text" name="apellidos" placeholder="Introduce tus apellidos" required>
            </div>
            <div class="inputBox">
                <span>Dirección:</span>
                <input type="text" name="direccion" placeholder="Introduce tu dirección" required>
            </div>
            <div class="inputBox">
                <span>Teléfono:</span>
                <input type="text" name="telefono" placeholder="Introduce tu teléfono" required>
            </div>
            <div class="inputBox">
                <span>Email:</span>
                <input type="email" name="email" placeholder="Introduce tu email" required>
            </div>
        </div>

        <!-- Botón para redirigir a avatar.php -->
        <div style="text-align: center; margin-top: 1rem;">
            <a href="avatar.php" class="btn" style="margin-bottom: 1rem;">Subir Foto</a>
        </div>

        <input type="submit" value="Actualizar" class="btn">
    </form>
</section>




<?php include('../includes/footer.php'); ?>
</body>
</html>
