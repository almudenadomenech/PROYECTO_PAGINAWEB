<?php
include('../includes/navbar.php');
include('../includes/conexion.php'); // Asegurar conexión con la base de datos
include('booking-form.php');  // Procesa el formulario de reserva

// Verificar si el usuario está logueado
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: ../paginas/login.php");
    exit;
}

// Obtener ID del usuario logueado
$user_id = $_SESSION['id'];

// Consultar los datos del usuario en la base de datos
$query = "SELECT usuario, email, telefono, direccion FROM usuarios WHERE id = $user_id";
$result = mysqli_query($link, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $user_data = mysqli_fetch_assoc($result);
} else {
    $user_data = ['usuario' => '', 'email' => '', 'telefono' => '', 'direccion' => ''];
}

?>

<!-- Estilos y scripts -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="../css/style.css">

<div class="heading" style="background:url(../images/header-3.jpg) no-repeat">
    <h1>Reserva ahora</h1>
</div>

<!-- Sección de formulario de reserva -->
<section class="booking">
    <h1 class="heading-title">Reserva tu viaje</h1>

    <form action="booking.php" method="post" class="booking-form">
        <div class="flex">
            <div class="inputBox">
                <span>Nombre:</span>
                <input type="text" placeholder="Introduce tu nombre" name="name" value="<?= htmlspecialchars($user_data['usuario']) ?>">
            </div>

            <div class="inputBox">
                <span>Email:</span>
                <input type="email" placeholder="Introduce tu email" name="email" value="<?= htmlspecialchars($user_data['email']) ?>">
            </div>

            <div class="inputBox">
                <span>Teléfono:</span>
                <input type="number" placeholder="Introduce tu teléfono" name="phone" value="<?= htmlspecialchars($user_data['telefono']) ?>">
            </div>

            <div class="inputBox">
                <span>Dirección:</span>
                <input type="text" placeholder="Introduce tu dirección" name="address" value="<?= htmlspecialchars($user_data['direccion']) ?>">
            </div>

            <div class="inputBox">
                <span>Donde viajar:</span>
                <input type="text" placeholder="Lugar que quieres visitar" name="location">
            </div>

            <div class="inputBox">
                <span>Número de personas:</span>
                <input type="number" placeholder="Introduce número de personas" name="guest">
            </div>

            <div class="inputBox">
                <span>Fecha inicio:</span>
                <input type="date" name="arrivals">
            </div>

            <div class="inputBox">
                <span>Fecha fin:</span>
                <input type="date" name="leaving">
            </div>
        </div>

        <input type="submit" value="Enviar" class="btn" name="send">
    </form>
</section>

<!-- Footer -->
<?php include('../includes/footer.php'); ?>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="../js/script.js"></script>

</body>
</html>
