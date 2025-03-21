<?php

$connection = mysqli_connect('localhost', 'root', 'admin', 'login');

if(isset($_POST['send'])) {
    $nombre = $_POST['name'];
    $email = $_POST['email'];
    $telefono = $_POST['phone'];
    $direccion = $_POST['address'];
    $donde_viajar = $_POST['location'];
    $num_personas = $_POST['guest'];
    $fecha_inicio = $_POST['arrivals'];
    $fecha_fin = $_POST['leaving'];
    
    $request = " insert into booking(nombre, email, telefono, direccion, location, numero_personas, fecha_inicio, fecha_fin) values('$nombre', '$email', '$telefono', '$direccion', '$donde_viajar', '$num_personas', '$fecha_inicio', '$fecha_fin')";

    mysqli_query($connection, $request);

    header("location: booking.php");
    exit;  // Asegúrate de que el script termine después de la redirección
} 
?>