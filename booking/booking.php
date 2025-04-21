<?php
session_start();
include('../includes/navbar.php');
include('../includes/conexion.php'); // Asegurar conexión con la base de datos

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

// Verificar si el formulario fue enviado
if (isset($_POST['send'])) {
    // Obtener los datos del formulario
    $name = $_POST['name'];
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $phone = mysqli_real_escape_string($link, $_POST['phone']);
    $address = mysqli_real_escape_string($link, $_POST['address']);
    $location = mysqli_real_escape_string($link, $_POST['location']);
    $guest = mysqli_real_escape_string($link, $_POST['guest']);
    $arrivals = mysqli_real_escape_string($link, $_POST['arrivals']);
    $leaving = mysqli_real_escape_string($link, $_POST['leaving']);

    // Consulta SQL para insertar la reserva
    $sql = "INSERT INTO booking (nombre, email, telefono, direccion, location, numero_personas, fecha_inicio, fecha_fin, usuario_id)
            VALUES ('$name', '$email', '$phone', '$address', '$location', '$guest', '$arrivals', '$leaving', '$user_id')";

    // Ejecutar la consulta
    if ($link->query($sql) === TRUE) {
        $reservation_success = true;
        $message = "Reserva realizada correctamente.";
    } else {
        $reservation_success = false;
        $message = "Error al realizar la reserva: " . $link->error;
    }
} else {
    $reservation_success = false;
    $message = "";
}

?>

<!-- swiper css link -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

<!-- font awesome cdn link -->
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
                <input type="text" placeholder="Introduce tu nombre" name="name" value="<?= htmlspecialchars($user_data['usuario']) ?>" required>
            </div>

            <div class="inputBox">
                <span>Email:</span>
                <input type="email" placeholder="Introduce tu email" name="email" value="<?= htmlspecialchars($user_data['email']) ?>" required>
            </div>

            <div class="inputBox">
                <span>Teléfono:</span>
                <input type="number" placeholder="Introduce tu teléfono" name="phone" value="<?= htmlspecialchars($user_data['telefono']) ?>" required>
            </div>

            <div class="inputBox">
                <span>Dirección:</span>
                <input type="text" placeholder="Introduce tu dirección" name="address" value="<?= htmlspecialchars($user_data['direccion']) ?>" required>
            </div>

            <div class="inputBox">
                <span>Donde viajar:</span>
                <input type="text" placeholder="Lugar que quieres visitar" name="location" required>
            </div>

            <div class="inputBox">
                <span>Número de personas:</span>
                <input type="number" placeholder="Introduce número de personas" name="guest" required>
            </div>

            <div class="inputBox">
                <span>Fecha inicio:</span>
                <input type="date" name="arrivals" required>
            </div>

            <div class="inputBox">
                <span>Fecha fin:</span>
                <input type="date" name="leaving" required>
            </div>
        </div>

        <input type="submit" value="Enviar" class="btn" name="send">
    </form>
</section>

<!-- Modal de éxito -->
<?php if ($reservation_success): ?>
<div id="reservationModal" class="modal" style="display: block;">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2>¡Reserva realizada con éxito!</h2>
        <p>Tu reserva ha sido realizada con éxito. ¡Gracias por elegirnos!</p>
        <button onclick="closeModal()">Cerrar</button>
    </div>
</div>
<?php endif; ?>

<!-- Footer -->
<?php include('../includes/footer.php'); ?>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="../js/script.js"></script>

<script>
// Función para cerrar el modal
function closeModal() {
    document.getElementById('reservationModal').style.display = 'none';
}

// Mostrar el modal si la reserva es exitosa
window.addEventListener('load', function() {
    const successFlag = document.body.getAttribute('data-success');
    if (successFlag === 'true') {
        document.getElementById('reservationModal').style.display = 'block';
    }
});
</script>


</body>
</html>
