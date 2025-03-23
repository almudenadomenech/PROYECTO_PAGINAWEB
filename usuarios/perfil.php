<?php
session_start();
include('../includes/conexion.php'); // Conexión a la base de datos

// Verificar si el usuario está logueado
if (!isset($_SESSION['id'])) {
    header("Location: login.php"); // Redirigir al login si no está autenticado
    exit;
}

$user_id = $_SESSION['id']; // ID del usuario logueado

// Obtener los datos del usuario
$query = "SELECT * FROM usuarios WHERE id = '$user_id'";
$result = mysqli_query($link, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result); // Cargar los datos del usuario
} else {
    echo "No se encontró el usuario.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil del Usuario</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php include('../includes/navbar.php'); ?> <!-- Tu barra de navegación -->

    <div class="heading" style="background:url(../images/user-list.jpg) no-repeat">
        <h1 style="font-size: 45px;">Perfil de Usuario</h1>
    </div>

    <section class="profile">
        <h1 class="heading-title">Mis Datos</h1>

        <div class="flex">
            <div class="inputBox">
                <span>Usuario:</span>
                <p><?php echo htmlspecialchars($user['usuario']); ?></p>
            </div>
            <div class="inputBox">
                <span>Apellidos:</span>
                <p><?php echo htmlspecialchars($user['apellidos']); ?></p>
            </div>
            <div class="inputBox">
                <span>Dirección:</span>
                <p><?php echo htmlspecialchars($user['direccion']); ?></p>
            </div>
            <div class="inputBox">
                <span>Teléfono:</span>
                <p><?php echo htmlspecialchars($user['telefono']); ?></p>
            </div>
            <div class="inputBox">
                <span>Email:</span>
                <p><?php echo htmlspecialchars($user['email']); ?></p>
            </div>
            <div class="inputBox">
                <span>Foto de Perfil:</span>
                <img src="<?php echo htmlspecialchars($user['foto_perfil']); ?>" alt="Foto de perfil" style="width: 100px; height: 100px; border-radius: 50%;">
            </div>
        </div>

        <!-- Botón para redirigir al formulario de actualización -->
        <div style="text-align: center; margin-top: 1rem;">
            <a href="user-form.php" class="btn">Actualizar Datos</a>
        </div>
    </section>

    <?php include('../includes/footer.php'); ?> <!-- Tu pie de página -->
</body>
</html>
