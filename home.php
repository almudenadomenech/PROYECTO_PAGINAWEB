<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

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

<!-- seccion home  -->
 <section class="home">

 <div class="swiper home-slider">

    <div class="swiper-wrapper">

        <div class="swiper-slide slide" style="background:url(images/home-slide-1.jpg) no-repeat">
            <div class="content">
                <span>explorar, descubrir, viajar</span>
                <h3>Viajes alrededor del mundo</h3>
                <a href="paquetes.php" class="btn">Descubre más</a>
            </div>

        </div>

        <div class="swiper-slide slide" style="background:url(images/home-slide-2.jpg) no-repeat">
            <div class="content">
                <span>explorar, descubrir, viajar</span>
                <h3>Descubre nuevos lugares</h3>
                <a href="paquetes.php" class="btn">Descubre más</a>
            </div>

        </div>

        <div class="swiper-slide slide" style="background:url(images/home-slide-3.jpg) no-repeat">
            <div class="content">
                <span>explorar, descubrir, viajar</span>
                <h3>Haz que tu viaje valga la pena</h3>
                <a href="paquetes.php" class="btn">Descubre más</a>
            </div>

        </div>
    </div>

    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
 </div>

 </section>


<!-- seccion servicios  -->
 <section class="services">

 <h1 class="heading-title">Nuestros servicios</h1>

 <div class="box-container">

    <div class="box">
        <img src="images/icon-1.png" alt="">
        <h3>Aventuras</h3>
    </div>

    <div class="box">
        <img src="images/icon-2.png" alt="">
        <h3>Tour guiados</h3>
    </div>

    <div class="box">
        <img src="images/icon-3.png" alt="">
        <h3>Trekking</h3>
    </div>

    <div class="box">
        <img src="images/icon-4.png" alt="">
        <h3>Camp fire</h3>
    </div>

    <div class="box">
        <img src="images/icon-5.png" alt="">
        <h3>Off road</h3>
    </div>

    <div class="box">
        <img src="images/icon-6.png" alt="">
        <h3>Camping</h3>
    </div>


 </div>
 </section>





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