<?php

// INICIALIZAR SESION
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){

    header('location:home.php');
    exit;
}

require_once "conexion.php";

$email = $password = "";
$email_error = $password_error = "";

if($_SERVER['REQUEST_METHOD'] == "POST"){

    if(empty(trim($_POST['email']))){
        $email_error = "Por favor introduzca el email";
    }
}

?>