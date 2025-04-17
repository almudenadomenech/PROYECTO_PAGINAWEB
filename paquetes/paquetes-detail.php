<?php
session_start();
include('../includes/conexion.php'); // Asegura la conexión con la base de datos

// Verificar si el usuario está logueado
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: ../paginas/login.php");
    exit;
}

// Obtener ID del paquete desde la URL
$package_id = $_GET['id'];

// Consultar los datos del paquete desde la base de datos
$query = "SELECT * FROM paquetes WHERE id = $package_id";
$package_result = mysqli_query($link, $query);

if ($package_result && mysqli_num_rows($package_result) > 0) {
    $package_data = mysqli_fetch_assoc($package_result);
} else {
    die('Paquete no encontrado.');
}

// Calcular la puntuación promedio
$rating_query = "SELECT AVG(rating) AS avg_rating FROM comentarios WHERE package_id = $package_id";
$rating_result = mysqli_query($link, $rating_query);
$rating_data = mysqli_fetch_assoc($rating_result);
$avg_rating = round($rating_data['avg_rating'], 1); // Redondeado a 1 decimal

// Obtener los comentarios del paquete
$comments_query = "SELECT comentarios.*, usuarios.usuario, usuarios.photo FROM comentarios 
                   JOIN usuarios ON comentarios.user_id = usuarios.id 
                   WHERE comentarios.package_id = $package_id";
$comments_result = mysqli_query($link, $comments_query);

// Verificar si se envió un comentario
if (isset($_POST['send_comment'])) {
    $user_id = $_SESSION['id'];
    $rating = $_POST['rating'];
    $comment = mysqli_real_escape_string($link, $_POST['comment']);

    // Validar que el comentario no esté vacío y que la puntuación sea válida
    if (empty($comment)) {
        $message = "El comentario no puede estar vacío.";
    } elseif ($rating < 1 || $rating > 5) {
        $message = "Por favor, selecciona una puntuación válida (1-5 estrellas).";
    } else {
        // Verificar si el usuario ya ha dejado un comentario para este paquete
        $check_comment_query = "SELECT * FROM comentarios WHERE package_id = $package_id AND user_id = $_SESSION[id]";
        $check_comment_result = mysqli_query($link, $check_comment_query);

        if (mysqli_num_rows($check_comment_result) > 0) {
            $message = "Ya has dejado un comentario para este paquete.";
        } else {
            // Insertar el comentario
            $insert_comment_sql = "INSERT INTO comentarios (package_id, user_id, rating, comment)
                                   VALUES ('$package_id', '$user_id', '$rating', '$comment')";
            if (mysqli_query($link, $insert_comment_sql)) {
                $message = "Comentario agregado con éxito.";
            } else {
                $message = "Error al agregar el comentario: " . mysqli_error($link);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Paquete - <?php echo $package_data['name']; ?></title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<?php include('../includes/navbar.php'); ?>

<div class="heading" style="background:url(../images/header-3.jpg) no-repeat">
    <h1><?php echo $package_data['name']; ?></h1>
</div>

<!-- Sección de detalles del paquete -->
<section class="package-details">
    <div class="package-info">
        <div class="image">
            <img src="../images/<?php echo $package_data['image']; ?>" alt="<?php echo $package_data['name']; ?>">
        </div>
        <div class="content">
            <h3><?php echo $package_data['name']; ?></h3>
            <p><?php echo $package_data['description']; ?></p>
            <p>Precio: $<?php echo $package_data['price']; ?></p>
        </div>
    </div>

    <!-- Puntuación Promedio -->
    <p>Puntuación Promedio: <?php echo $avg_rating; ?> / 5</p>

    <!-- Sección de Comentarios -->
    <section class="package-reviews">
        <h2>Valoraciones de los Clientes</h2>

        <?php if (isset($message)): ?>
            <div class="message"><?php echo $message; ?></div>
        <?php endif; ?>

        <div class="comments-container">
            <?php while ($comment = mysqli_fetch_assoc($comments_result)): ?>
                <?php
                    $user_photo = $comment['photo'] ? "../images/{$comment['photo']}" : '../images/default.jpg';
                ?>
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

        <!-- Formulario de comentarios (solo si el usuario está logueado) -->
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

<?php include('../includes/footer.php'); ?>

<script src="../js/script.js"></script>
</body>
</html>
