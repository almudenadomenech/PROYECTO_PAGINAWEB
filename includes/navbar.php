<?php
// Verificar si la sesión ya está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Iniciar la sesión solo si no está iniciada
}
?>

<section class="header">
    <a href="/home.php" class="logo">
        <img src="/images/Logo.png" alt="">
    </a>

    <nav class="navbar">
        <a href="../home.php">Home</a>
        <a href="../paginas/acercaDe.php">Acerca de</a>
        <a href="../paginas/paquetes.php">Paquetes</a>
        <a href="../booking/booking.php">Booking</a>
        <a href="../usuarios/user-form.php">Formulario usuarios</a>

        <?php
        // Verificar si el usuario está logueado
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
            // Si el usuario es administrador (role_id == 2)
            if ($_SESSION['role_id'] == 2) {
                // Enlace para la lista de usuarios solo visible para administradores
                echo '<a href="../usuarios/user-list.php">Lista de usuarios</a>';
                echo '<a href="../booking/booking-list.php">Ver reservas</a>'; // Solo para administradores
            } else {
                // Si es usuario normal
                echo '<a href="../booking/booking-list.php">Mis reservas</a>';
            }

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
