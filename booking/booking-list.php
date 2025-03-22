<?php
// Iniciar sesión
session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: ../paginas/login.php");  // Redirigir al login si no está logueado
    exit;
}

require_once "../includes/conexion.php"; // Asegúrate de que este archivo contiene la conexión a la base de datos

// Consultar las reservas según el tipo de usuario
if ($_SESSION['role_id'] == 2) {
    // Si es administrador, mostrar todas las reservas
    $sql = "SELECT * FROM booking";  // Obtener todas las reservas
} else {
    // Si es usuario normal, mostrar solo sus reservas
    $user_id = $_SESSION['id'];  // Obtener el id del usuario logueado
    $sql = "SELECT * FROM booking WHERE usuario_id = $user_id";  // Obtener solo las reservas del usuario logueado
}

// Ejecutar la consulta
$result = mysqli_query($link, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Reservas</title>
    <!-- swiper css link -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

<!-- font awesome cdn link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="../css/style.css">
</head>
<body>

    <?php include('../includes/navbar.php'); ?>  <!-- Navbar para navegación -->

    <div class="table-container">
    <h1>Mis Reservas</h1>
    <?php
    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr><th>Nombre</th><th>Email</th><th>Teléfono</th><th>Dirección</th><th>Destino</th><th>Fecha de Inicio</th><th>Fecha de Fin</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['nombre'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['telefono'] . "</td>";
            echo "<td>" . $row['direccion'] . "</td>";
            echo "<td>" . $row['location'] . "</td>";
            echo "<td>" . $row['fecha_inicio'] . "</td>";
            echo "<td>" . $row['fecha_fin'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No tienes reservas.</p>";
    }
    ?>
</div>


    <!-- swiper js link -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="../js/script.js"></script>
</body>
</html>

<?php
// Cerrar la conexión a la base de datos
mysqli_close($link);
?>
