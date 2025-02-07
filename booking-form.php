<?php

$connection = mysqli_connect('localhost', 'root', '', 'book_db');

if(isset($_POST['send'])) {
    $nombre = $_POST['name'];
    $email = $_POST['email'];
    $telefono = $_POST['phone'];
    $direccion = $_POST['address'];
    $donde_viajar = $_POST['address'];
    $num_personas = $_POST['guest'];
    $fecha_inicio = $_POST['arrivals'];
    $fecha_fin = $_POST['leaving'];
    
    $requiest = " insert into booking-form(nombre, email, telefono, direccion, donde_viajar, numero_personas, fecha_inicio, fecha_fin) values('$nombre', '$email', '$telefono', '$direccion', '$donde_viajar', '$num_personas', '$fecha_inicio', '$fecha_fin')";

    mysqli_query($connection, $request);

    header("location: booking.php");
}else {
    echo "Algo salió mal, inténtalo de nuevo";
}
?>