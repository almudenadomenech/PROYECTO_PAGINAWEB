<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- swiper css link -->
    <linkrel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

     <!-- font awesone cdn link  -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<?php
    include('navbar.php');
?>

    <div class="container-all">

        <div class="ctn-form">

            <img src="images/logo.jpg" alt="" class="logo">
            <h1 class="title">Registrarse</h1>
            <form action="">

                <label for="">Nombre de usuario</label>
                <input type="text">
                <span class="msg error"></span>

                <label for="">Email</label>
                <input type="text">
                <span class="msg error"></span>

                <label for="">Contraseña</label>
                <input type="password">
                <span class="msg error"></span>

                <input type="submit" value="Registrarse">


            </form>

            <span class="text-footer">¿Ya te has registrado?
                 <a href="">Iniciar Sesión</a>
            </span>
        </div>

        <div class="ctn-text">
            <div class="capa"> </div>
            <h1 class="title-description">Lorem ipsum dolor sit amet.</h1>
            <p class="text-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti cumque dignissimos mollitia quos nemo cum, error numquam amet suscipit architecto.</p>
        </div>
    </div>
    <?php
    include('footer.php');
?>

<!-- swiper js link  -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

     <script src="js/script.js"></script>
</body>

</html>