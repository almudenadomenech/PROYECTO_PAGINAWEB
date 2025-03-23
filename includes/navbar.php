<?php
// Verificar si la sesión ya está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Iniciar la sesión solo si no está iniciada
}

include('conexion.php'); // Incluir conexión a la base de datos

// Variable para la foto de perfil
$foto_perfil = "";

// Verificar si el usuario está logueado
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // Obtener la foto de perfil del usuario desde la base de datos
    $user_id = $_SESSION['id']; // ID del usuario logueado
    $query = "SELECT foto_perfil FROM usuarios WHERE id = $user_id"; // Consulta para obtener la foto
    $result = mysqli_query($link, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $foto_perfil = $row['foto_perfil']; // Guardar la URL de la foto de perfil
    }
}
?>

<section class="header">
    <a href="/home.php" class="logo">
        <img src="/images/Logo.png" alt="Logo">
    </a>

    <nav class="navbar">
        <a href="../home.php">Home</a>
        <a href="../paginas/acercaDe.php">Acerca de</a>
        <a href="../paginas/paquetes.php">Paquetes</a>
        <a href="../booking/booking.php">Booking</a>
        <a href="../usuarios/perfil.php">Mi perfil</a>

        <?php
        // Verificar si el usuario está logueado
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
            // Si el usuario es administrador (role_id == 2)
            if ($_SESSION['role_id'] == 2) {
                echo '<a href="../usuarios/user-list.php">Lista de usuarios</a>';
                echo '<a href="../booking/booking-list.php">Ver reservas</a>';
            } else {
                // Si es usuario normal
                echo '<a href="../booking/booking-list.php">Mis reservas</a>';
            }

            // Mostrar foto de perfil si existe
            if (!empty($foto_perfil)) {
                echo '<a href="../usuarios/perfil.php" class="profile-photo">
                        <img src="' . $foto_perfil . '" alt="Foto de perfil" style="width: 40px; height: 40px; border-radius: 50%; margin-left: 10px;">
                      </a>';
            }

            // Mostrar botón de cerrar sesión
            echo '<a href="../conexiones/cerrar_sesion.php">Cerrar sesión</a>';
        } else {
            // Si no está logueado
            echo '<a href="../paginas/login.php">Login</a>';
            echo '<a href="../paginas/register.php">Register</a>';
        }
        ?>
    </nav>

    <div id="menu-btn" class="fas fa-bars"></div>
</section>
