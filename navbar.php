<section class="header">
    <a href="home.php" class="logo">
        <img src="images/Logo.png" alt="">
    </a>

    <nav class="navbar">
        <a href="home.php">Home</a>
        <a href="acercaDe.php">Acerca de</a>
        <a href="paquetes.php">Paquetes</a>
        <a href="booking.php">Booking</a>

        <?php
        // Verificar si el usuario está logueado
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
            // Si está logueado, mostrar el enlace para cerrar sesión
            echo '<a href="cerrar_sesion.php">Cerrar sesión</a>';
        } else {
            // Si no está logueado, mostrar los enlaces de Login y Register
            echo '<a href="login.php">Login</a>';
            echo '<a href="register.php">Register</a>';
        }
        ?>
    </nav>

    <div id="menu-btn" class="fas fa-bars"></div>
</section>
