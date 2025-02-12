<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            <h1 class="title">Iniciar Sesión</h1>
            <form action="">
                <label for="">Email</label>
                <input type="text">

                <label for="">Contraseña</label>
                <input type="password">

                <input type="submit" value="inicio">


            </form>

            <span class="text-footer">¿Aún no te has registrado?
                 <a href="">Registrate</a>
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
</body>

</html>