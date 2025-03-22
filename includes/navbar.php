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

    <?php
    // Verificar si el usuario está logueado
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
        // Si el usuario es administrador
        if ($_SESSION['role_id'] == 2) {
            echo '<a href="../booking/booking-list.php">Ver reservas</a>';
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
