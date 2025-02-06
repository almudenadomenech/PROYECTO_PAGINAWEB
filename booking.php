<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>

    <!-- swiper css link -->
    <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
/>

     <!-- font awesone cdn link  -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" href="css/style.css">
</head>
<body>

<section class="header">

    <a href="home.php" class= "logo"> viajar.</a>

    <nav class="navbar">
        <a href="home.php">Home</a>
        <a href="acercaDe.php">Acerca de</a>
        <a href="paquetes.php">Paquetes</a>
        <a href="booking.php">Booking</a>
    </nav>
    <div id="menu-btn" class="fas fa-bars"></div>

</section>

<div class="heading" style="background:url(images/header-3.jpg) no-repeat" >
    <h1>Reserva ahora</h1>
</div>

<!-- seccion booking inicio -->

<section class="booking">

    <h1 class="heading-title">Reserva tu viaje</h1>

    <form action="booking.php" method= "post" class="booking-form">

    <div class="flex">
        <div class="inputBox">
            <span>Nombre:</span>
            <input type="text" placeholder="Introduce tu nombre" name="name">
        </div>

        <div class="inputBox">
            <span>Email:</span>
            <input type="email" placeholder="Introduce tu email" name="email">
        </div>

        <div class="inputBox">
            <span>Teléfono:</span>
            <input type="number" placeholder="Introduce tu teléfono" name="phone">
        </div>

        <div class="inputBox">
            <span>Dirección:</span>
            <input type="text" placeholder="Introduce tu dirección" name="address">
        </div>

        <div class="inputBox">
            <span>Donde viajar:</span>
            <input type="text" placeholder="Lugar que quieres visitar" name="Location">
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

    <input type="submit" value="submit" class="btn" name="send">
    

    </form>

</section>





<!-- seccion booking fin -->



  <!-- seccion footer   -->
<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>Enlaces rápidos</h3>
        <a href="home.php"> <i class="i.fas.fa-angle-right"></i>  Home</a>
        <a href="acercaDe.php"> <i class="i.fas.fa-angle-right"></i>Sobre nosotros</a>
        <a href="paquetes.php"><i class="i.fas.fa-angle-right"></i>Paquetes</a>
        <a href="booking.php"><i class="i.fas.fa-angle-right"></i>Booking</a>
        </div>

        <div class="box">
            <h3> Enlaces adicionales</h3>
        <a href="#"> <i class="i.fas.fa-angle-right"></i>Preguntas</a>
        <a href="#"> <i class="i.fas.fa-angle-right"></i>Sobre nosotros</a>
        <a href="#"> <i class="i.fas.fa-angle-right"></i>Política de privacidad</a>
        <a href="#"> <i class="i.fas.fa-angle-right"></i>Condiciones de uso</a>
        </div>

        <div class="box">
            <h3>Información de contacto</h3>
        <a href="#"> <i class="i.fas.fa-phone"> </i>785-75-69-98</a>
        <a href="#"> <i class="i.fas.fa-phone"> </i>111-22-22-33</a>
        <a href="#"> <i class="i.fas.fa-envelope"> </i>viajes@gmail.com</a>
        <a href="#"> <i class="i.fas.fa-map"> </i>madrid, españa -28045</a>
        </div>

        <div class="box">
            <h3>Síguenos</h3>
            <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
            <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
            <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
            <a href="#"> <i class="fab fa-linkedin"></i> linkedin </a>
        </div>

    </div>

    
</section>

<!-- swiper js link  -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

     <script src="js/script.js"></script>
</body>
</html>