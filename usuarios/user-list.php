<?php
include('../includes/conexion.php'); // Conexión a la base de datos

// Iniciar sesión
session_start();

// Verificar si el usuario está logueado y si es un administrador
if (!isset($_SESSION['id']) || $_SESSION['role_id'] != 2) { // Cambié 'rol' por 'role_id' para ser consistente
    // Si no es un administrador, redirige a la página de inicio o acceso denegado
    header('Location: ../index.php');
    exit();
}

// Consulta para obtener todos los usuarios
$query = "SELECT * FROM usuarios"; 
$result = mysqli_query($link, $query);

if (!$result) {
    die("Error en la consulta: " . mysqli_error($link));
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<!-- Encabezado -->
<section class="heading">
    <h1>Lista de Usuarios Registrados</h1>
</section>

<!-- Tabla de usuarios -->
<section class="usuarios-list">
    <table class="usuarios-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Foto de Perfil</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($user = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= $user['id']; ?></td>
                    <td><?= $user['usuario']; ?></td>
                    <td><?= $user['apellidos']; ?></td>
                    <td><?= $user['email']; ?></td>
                    <td><?= $user['telefono']; ?></td>
                    <td>
                        <?php if (!empty($user['foto_perfil'])): ?>
                            <img src="<?= $user['foto_perfil']; ?>" alt="Foto de perfil" style="width: 50px; height: 50px; border-radius: 50%;">
                        <?php else: ?>
                            <span>No tiene foto</span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</section>

</body>
</html>

<?php
// Cerrar la conexión
mysqli_close($link);
?>
