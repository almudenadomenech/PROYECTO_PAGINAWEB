<?php
// Verificar si la sesión ya está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Iniciar la sesión solo si no está iniciada
}

// Variable para la foto de perfil
$foto_perfil = "";
$foto_default = "../images/usuario-default.png"; // Foto de perfil por defecto

// Verificar si el usuario está logueado
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    include('conexion.php'); // Incluir conexión a la base de datos solo si está logueado

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

        <?php
        // Verificar si el usuario está logueado
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
            // Si no hay foto de perfil, usar la foto por defecto
            $foto_mostrar = !empty($foto_perfil) ? $foto_perfil : $foto_default;

            echo '<div class="profile-dropdown">
                    <a href="javascript:void(0)" class="profile-photo" onclick="toggleDropdown()">
                        <img src="' . $foto_mostrar . '" alt="Foto de perfil" style="width: 40px; height: 40px; border-radius: 50%; margin-left: 10px;">
                    </a>
                    <div class="dropdown-content" id="dropdown-menu">
                        <a href="../usuarios/perfil.php">Mi perfil</a>';

            // Mostrar "Mis reservas" solo si el usuario no es administrador
            if ($_SESSION['role_id'] != 2) {
                echo '<a href="../booking/booking-list.php">Mis reservas</a>';
            }

            // Mostrar enlaces adicionales si el usuario es administrador
            if ($_SESSION['role_id'] == 2) {
                echo '<a href="../usuarios/user-list.php">Lista de usuarios</a>';
                echo '<a href="../booking/booking-list.php">Ver reservas</a>';
            }

            echo '<a href="../conexiones/cerrar_sesion.php">Cerrar sesión</a>
                </div>
            </div>';
        } else {
            // Si no está logueado, mostrar los enlaces de Login y Register
            echo '<a href="../paginas/login.php">Login</a>';
            echo '<a href="../paginas/register.php">Register</a>';
        }
        ?>
    </nav>

    <div id="menu-btn" class="fas fa-bars"></div>
</section>

<script src="../js/script.js"></script>
