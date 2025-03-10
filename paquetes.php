<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>

    <!-- swiper css link -->
    <linkrel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
/>

     <!-- font awesone cdn link  -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php
    include('navbar.php');
?>

<div class="heading" style="background:url(images/header-2.jpg) no-repeat" >
    <h1>Paquetes</h1>
</div>

<!-- Seccion paquetes inicio -->

<section class="packages">

    <h1 class="heading-title">Principales destinos</h1>

    <div class="box-container">

        <div class="box">
            <div class="image">
                <img src="images/img-1.jpg" alt="Destino 1">
            </div>
            <div class="content">
                <h3>Encanto de Estambun</h3>
                <p>Sumérgete en la historia y la cultura de Estambul, donde oriente y occidente se encuentra</p>
                <a href="booking.php" class="btn">Reserva ahora</a>
            </div>
        </div>
    
        <div class="box">
            <div class="image">
                <img src="images/img-2.jpg" alt="Destino 2">
            </div>
            <div class="content">
                <h3>Paraíso del Caribe</h3>
                <p>Disfruta de playas de arena blanca, aguas cristalinas y una experiencia única en el corazón del Caribe.</p>
                <a href="booking.php" class="btn">Reserva ahora</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/img-13.jpg" alt="Destino 4">
            </div>
            <div class="content">
                <h3>Aventura en las Alturas de Nepal</h3>
                <p>Explora los majestuosos Himalayas y vive una experiencia de senderismo y montañismo inolvidable en el techo del mundo.</p>
                <a href="booking.php" class="btn">Reserva ahora</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/img-4.jpg" alt="">
            </div>
            <div class="content">
                <h3>Aventuras en África</h3>
                <p>Descubre la magia de África: safaris, culturas vibrantes y paisajes impresionantes te esperan.</p>
                <a href="booking.php" class="btn">Reserva ahora</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/img-5.jpg" alt="">
            </div>
            <div class="content">
                <h3>Encanto de Venecia</h3>
                <p>Navega por los canales, recorre sus calles históricas y sumérgete en el romance de la ciudad flotante.</p>
                <a href="booking.php" class="btn">Reserva ahora</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/img-6.jpg" alt="">
            </div>
            <div class="content">
                <h3> Aventura en Japón</h3>
                <p>Montañas, templos y ciudades llenas de historia. ¡Descúbrelo!</p>
                <a href="booking.php" class="btn">Reserva ahora</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/img-7.jpg" alt="">
            </div>
            <div class="content">
                <h3>Explora los Misterios de Marruecos</h3>
                <p>Vive la magia del desierto y sus paisajes infinitos.</p>
                <a href="booking.php" class="btn">Reserva ahora</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/img-8.jpg" alt="">
            </div>
            <div class="content">
                <h3>Vive la Magia de México</h3>
                <p>Explora sus desiertos, cultura vibrante y paisajes únicos.</p>
                <a href="booking.php" class="btn">Reserva ahora</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/img-9.jpg" alt="">
            </div>
            <div class="content">
                <h3>Cappadocia: Maravilla Natural</h3>
                <p>Descubre sus formaciones rocosas, vuelos en globo y paisajes impresionantes.</p>
                <a href="booking.php" class="btn">Reserva ahora</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/img-10.jpg" alt="">
            </div>
            <div class="content">
                <h3>La Ciudad que Nunca Duerme</h3>
                <p>Vive la energía vibrante, sus icónicas calles y monumentos únicos.</p>
                <a href="booking.php" class="btn">Reserva ahora</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/img-11.jpg" alt="">
            </div>
            <div class="content">
                <h3>Tailandia: Un Paraíso Tropical</h3>
                <p> Disfruta de sus playas exóticas, templos milenarios y una cultura fascinante.</p>
                <a href="booking.php" class="btn">Reserva ahora</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/img-12.jpg" alt="">
            </div>
            <div class="content">
                <h3>Descubre la magia de Australia</h3>
                <p>De las playas paradisíacas a la imponente Gran Barrera de Coral, Australia te sorprenderá en cada rincón</p>
                <a href="booking.php" class="btn">Reserva ahora</a>
            </div>
        </div>
    
    </div>

    <div class="load-more-packages"><span class="btn">Leer más</span></div>
</section>

<!-- Seccion paquetes fin -->



  <!-- seccion footer   -->
  <?php
    include('footer.php');
?>



<!-- swiper js link  -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

     <script src="js/script.js"></script>
</body>
</html>