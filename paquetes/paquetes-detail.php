<?php
session_start();
include('../includes/conexion.php');

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: ../paginas/login.php");
    exit;
}

$package_id = $_GET['id'];

$query = "SELECT * FROM paquetes WHERE id = $package_id";
$package_result = mysqli_query($link, $query);

if ($package_result && mysqli_num_rows($package_result) > 0) {
    $package_data = mysqli_fetch_assoc($package_result);
} else {
    die('Paquete no encontrado.');
}

// Consulta para la galería
$gallery_query = "SELECT ruta_imagen FROM imagenes_paquete WHERE paquete_id = $package_id";
$gallery_result = mysqli_query($link, $gallery_query);

$rating_query = "SELECT AVG(rating) AS avg_rating FROM comentarios WHERE package_id = $package_id";
$rating_result = mysqli_query($link, $rating_query);
$rating_data = mysqli_fetch_assoc($rating_result);
$avg_rating = round($rating_data['avg_rating'], 1);

$comments_query = "SELECT comentarios.*, usuarios.usuario, usuarios.foto_perfil FROM comentarios 
                   JOIN usuarios ON comentarios.user_id = usuarios.id 
                   WHERE comentarios.package_id = $package_id";
$comments_result = mysqli_query($link, $comments_query);

$duraciones_query = "SELECT duracion, precio FROM duraciones_paquete WHERE paquete_id = $package_id";
$duraciones_result = mysqli_query($link, $duraciones_query);
$duraciones = [];
while ($row = mysqli_fetch_assoc($duraciones_result)) {
    $duraciones[] = $row;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Paquete - <?php echo $package_data['nombre']; ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<?php include('../includes/navbar.php'); ?>

<div class="heading" style="background:url(../images/header-3.jpg) no-repeat">
    <h1><?php echo $package_data['location']; ?></h1>
</div>

<section class="package-details">
    <div class="package-info">
        <div class="image-detail">
            <!-- Imagen Principal -->
            <img src="../images/<?php echo $package_data['image']; ?>" alt="<?php echo $package_data['nombre']; ?>">
        </div>

        <!-- Carrusel de Miniaturas debajo de la Imagen Principal -->
        <?php if ($gallery_result && mysqli_num_rows($gallery_result) > 0): ?>
        <div class="swiper gallerySwiper" style="width: 100%; max-width: 800px; margin: 20px auto;">
            <div class="swiper-wrapper">
                <?php while ($img = mysqli_fetch_assoc($gallery_result)): ?>
                <div class="swiper-slide">
                    <img src="../images/<?php echo htmlspecialchars($img['ruta_imagen']); ?>" 
                         alt="Imagen galería" 
                         style="width: 100%; height: auto; border-radius: 10px;"
                         onclick="openLightbox(this.src)">
                </div>
                <?php endwhile; ?>
            </div>

            <!-- Botones de Navegación -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

            <!-- Paginación opcional -->
            <div class="swiper-pagination"></div>
        </div>
        <?php endif; ?>

        <div class="content">
            <h3><?php echo $package_data['nombre']; ?></h3>
            <p><?php echo $package_data['description']; ?></p>
        </div>
    </div>


    <!-- Servicios incluidos -->
    <?php
    $extras = [
        ['label' => 'Transporte', 'icon' => 'fa-bus', 'field' => 'transporte'],
        ['label' => 'Guía', 'icon' => 'fa-user-tie', 'field' => 'guia'],
        ['label' => 'Excursiones', 'icon' => 'fa-mountain-sun', 'field' => 'excursiones'],
        ['label' => 'Alojamiento', 'icon' => 'fa-bed', 'field' => 'alojamiento'],
        ['label' => 'Comidas', 'icon' => 'fa-utensils', 'field' => 'comidas']
    ];

    $incluidos = [];
    foreach ($extras as $item) {
        $valor = $package_data[$item['field']] ?? null;

        if (in_array($item['field'], ['transporte', 'guia', 'excursiones', 'alojamiento'])) {
            if ($valor == 1) {
                $incluidos[] = [
                    'label' => $item['label'],
                    'icon' => $item['icon'],
                    'texto' => 'Incluido'
                ];
            }
        } else {
            if (!empty($valor)) {
                $incluidos[] = [
                    'label' => $item['label'],
                    'icon' => $item['icon'],
                    'texto' => htmlspecialchars($valor)
                ];
            }
        }
    }
    ?>

    <?php if (!empty($incluidos)): ?>
        <h1 style="margin-top: 30px;">Servicios Incluidos</h1>
        <table class="tabla-incluidos" style="margin-top:10px; width:100%; text-align:center; border-collapse:collapse;">
            <tr>
                <?php foreach ($incluidos as $item): ?>
                    <td style="padding:15px; border:1px solid #ddd; border-radius:10px;">
                        <i class="fa-solid <?php echo $item['icon']; ?>" style="font-size:24px; color:#007bff;"></i><br>
                        <strong><?php echo $item['label']; ?></strong><br>
                        <span style="color:green;"><?php echo $item['texto']; ?></span>
                    </td>
                <?php endforeach; ?>
                <?php
                $emptyCells = 6 - count($incluidos);
                for ($i = 0; $i < $emptyCells; $i++) {
                    echo '<td style="padding:15px; border:1px solid transparent;"></td>';
                }
                ?>
            </tr>
        </table>
    <?php endif; ?>

    <!-- Duraciones -->
    <div class="durations">
        <h1>Paquetes vacacionales</h1>
        <?php if (!empty($duraciones)) : ?>
            <table>
                <thead>
                    <tr>
                        <th>Duración</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($duraciones as $duracion) : ?>
                        <tr>
                            <td><?php echo $duracion['duracion']; ?> días</td>
                            <td><?php echo number_format($duracion['precio'], 2); ?>€</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p>No hay duraciones disponibles para este paquete.</p>
        <?php endif; ?>
    </div>

    <!-- Rating promedio -->
    <p>Puntuación Promedio: <?php echo $avg_rating; ?> / 5</p>

    <!-- Comentarios -->
    <section class="package-reviews">
        <h2>Valoraciones de los Clientes</h2>

        <?php if (isset($message)): ?>
            <div class="message"><?php echo $message; ?></div>
        <?php endif; ?>

        <div class="comments-container">
            <?php while ($comment = mysqli_fetch_assoc($comments_result)): ?>
                <?php $user_photo = $comment['foto_perfil'] ? "../images/{$comment['foto_perfil']}" : '../images/default.jpg'; ?>
                <div class="comment">
                    <div class="user-info">
                        <img src="<?php echo $user_photo; ?>" alt="Foto de <?php echo $comment['usuario']; ?>" class="user-photo">
                        <p><strong><?php echo $comment['usuario']; ?></strong></p>
                    </div>
                    <div class="comment-content">
                        <div class="rating">
                            <?php for ($i = 0; $i < $comment['rating']; $i++): ?>
                                <span class="star">★</span>
                            <?php endfor; ?>
                            <?php for ($i = $comment['rating']; $i < 5; $i++): ?>
                                <span class="star">☆</span>
                            <?php endfor; ?>
                        </div>
                        <p><?php echo $comment['comment']; ?></p>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <h3>Deja tu valoración</h3>
        <form action="paquetes-detail.php?id=<?php echo $package_id; ?>" method="post" class="comment-form">
            <label for="rating">Valoración (1-5 estrellas):</label>
            <select name="rating" id="rating" required>
                <option value="1">1 Estrella</option>
                <option value="2">2 Estrellas</option>
                <option value="3">3 Estrellas</option>
                <option value="4">4 Estrellas</option>
                <option value="5">5 Estrellas</option>
            </select>

            <label for="comment">Comentario:</label>
            <textarea name="comment" id="comment" required></textarea>

            <button type="submit" name="send_comment" class="btn">Enviar Comentario</button>
        </form>
    </section>
</section>

<!-- Lightbox -->
<div id="lightbox" style="display:none; position:fixed; top:0; left:0; width:100vw; height:100vh; background-color:rgba(0,0,0,0.8); justify-content:center; align-items:center; z-index:1000;" onclick="closeLightbox()">
    <img id="lightbox-img" src="" style="max-width:90%; max-height:90%; border:4px solid white; border-radius:10px;">
</div>

<?php include('../includes/footer.php'); ?>
<script src="../js/script.js"></script>
<script>
function openLightbox(src) {
    const lightbox = document.getElementById('lightbox');
    const img = document.getElementById('lightbox-img');
    img.src = src;
    lightbox.style.display = 'flex';
}
function closeLightbox() {
    document.getElementById('lightbox').style.display = 'none';
}
</script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="../js/script.js"></script>
</body>
</html>
