<?php
include('../includes/conexion.php');
include('../includes/navbar.php');

if (!isset($_SESSION['loggedin']) || $_SESSION['role_id'] != 2) {
    header('Location: ../login.php');
    exit;
}

$id = '';
$name = '';
$description = '';
$image = '';
$location = '';
$availability = '';
$category = '';
$transporte = 0;
$alojamiento = 0;
$comidas = 0;
$guia = 0;
$excursiones = 0;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM paquetes WHERE id = $id";
    $result = mysqli_query($link, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $p = mysqli_fetch_assoc($result);
        extract($p);
    }

    $duraciones = [];
    $duraciones_query = "SELECT duracion, precio FROM duraciones_paquete WHERE paquete_id = $id";
    $duraciones_result = mysqli_query($link, $duraciones_query);
    while ($row = mysqli_fetch_assoc($duraciones_result)) {
        $duraciones[] = $row;
    }
} else {
    $duraciones = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? '';
    $name = mysqli_real_escape_string($link, $_POST['name']);
    $description = mysqli_real_escape_string($link, $_POST['description']);
    $location = mysqli_real_escape_string($link, $_POST['location']);
    $category = mysqli_real_escape_string($link, $_POST['category']);
    $availability = isset($_POST['availability']) ? 1 : 0;

    $transporte = isset($_POST['transporte']) ? 1 : 0;
    $alojamiento = isset($_POST['alojamiento']) ? 1 : 0;
    $comidas = isset($_POST['comidas']) ? 1 : 0;
    $guia = isset($_POST['guia']) ? 1 : 0;
    $excursiones = isset($_POST['excursiones']) ? 1 : 0;

    if (!empty($_FILES['image']['name'])) {
        $img_name = basename($_FILES['image']['name']);
        $target = "../images/" . $img_name;
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
        $image = $img_name;
    }

    if (!empty($id)) {
        $sql = "UPDATE paquetes SET nombre='$name', description='$description',
                image='$image', location='$location', availability='$availability',
                category='$category', transporte='$transporte', alojamiento='$alojamiento',
                comidas='$comidas', guia='$guia', excursiones='$excursiones' WHERE id=$id";
    } else {
        $sql = "INSERT INTO paquetes (nombre, description, image, location, availability,
                category, transporte, alojamiento, comidas, guia, excursiones)
                VALUES ('$name', '$description', '$image', '$location', '$availability',
                '$category', '$transporte', '$alojamiento', '$comidas', '$guia', '$excursiones')";
    }

    if (mysqli_query($link, $sql)) {
        if (empty($id)) {
            $id = mysqli_insert_id($link);
        }

        mysqli_query($link, "DELETE FROM duraciones_paquete WHERE paquete_id = $id");

        for ($i = 1; $i <= 3; $i++) {
            $dur = $_POST["duracion_$i"] ?? '';
            $precio = $_POST["precio_$i"] ?? '';
            if (!empty($dur) && !empty($precio)) {
                $dur = (int)$dur;
                $precio = (float)$precio;
                $insert = "INSERT INTO duraciones_paquete (paquete_id, duracion, precio)
                           VALUES ($id, $dur, $precio)";
                mysqli_query($link, $insert);
            }
        }

        header('Location: paquetes.php');
        exit;
    } else {
        echo "Error: " . mysqli_error($link);
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title><?= $id ? 'Editar Paquete' : 'Nuevo Paquete' ?></title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <div class="heading" style="background:url(../images/header-2.jpg) no-repeat">
        <h1><?= $id ? 'Editar Paquete' : 'Nuevo Paquete' ?></h1>
    </div>

    <section class="form-admin-container">
        <form method="post" class="form-admin" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">

            <!-- Fila 1: Nombre, Ubicación, Categoría -->
            <div class="inputBox">
                <span>Nombre</span>
                <input type="text" name="name" value="<?= htmlspecialchars($name) ?>" required>
            </div>

            <div class="inputBox">
                <span>Ubicación</span>
                <input type="text" name="location" value="<?= htmlspecialchars($location) ?>" required>
            </div>

            <div class="inputBox">
                <span>Categoría</span>
                <select name="category" required>
                    <option value="">Selecciona una categoría</option>
                    <option value="Playa" <?= $category == 'Playa' ? 'selected' : '' ?>>Playa</option>
                    <option value="Montaña" <?= $category == 'Montaña' ? 'selected' : '' ?>>Montaña</option>
                    <option value="Aventura" <?= $category == 'Aventura' ? 'selected' : '' ?>>Aventura</option>
                    <option value="Cultural" <?= $category == 'Cultural' ? 'selected' : '' ?>>Cultural</option>
                </select>
            </div>

            <!-- Contenedor de paquetes -->
            <!-- Duraciones y precios en filas separadas -->
            
            <div class="inputBox-paquetes">
            <span class="paquete-title">Paquete 1</span>
                <span>Días</span>
                <input type="number" name="duracion_1" value="<?= htmlspecialchars($duraciones[0]['duracion'] ?? 7) ?>">
                <span>Precio</span>
                <input type="number" step="0.01" name="precio_1" value="<?= htmlspecialchars($duraciones[0]['precio'] ?? '') ?>">
            </div>

            <div class="inputBox-paquetes">
            <span class="paquete-title">Paquete 2</span>
                <span>Dias</span>
                <input type="number" name="duracion_2" value="<?= htmlspecialchars($duraciones[1]['duracion'] ?? 10) ?>">
                <span>Precio</span>
                <input type="number" step="0.01" name="precio_2" value="<?= htmlspecialchars($duraciones[1]['precio'] ?? '') ?>">
            </div>

            <div class="inputBox-paquetes">
            <span class="paquete-title">Paquete 3</span>
                <span>Días</span>
                <input type="number" name="duracion_3" value="<?= htmlspecialchars($duraciones[2]['duracion'] ?? 15) ?>">
                <span>Precio</span>
                <input type="number" step="0.01" name="precio_3" value="<?= htmlspecialchars($duraciones[2]['precio'] ?? '') ?>">
            </div>

            <!-- Descripción ocupa 2 columnas y 2 filas -->
            <div class="inputBox descripcion">
                <span>Descripción</span>
                <textarea name="description"><?= htmlspecialchars($description) ?></textarea>
            </div>



            <!-- Incluye -->
            <div class="inputBox" style="grid-column: span 3;">
    <span>Incluye</span>
    <table class="table">
        <tbody>
            <tr>
                <td>
                    <div class="form-check">
                    <label class="form-check-label" for="transporte">Transporte</label>
                        <input class="form-check-input" type="checkbox" name="transporte" id="transporte" <?= $transporte ? 'checked' : '' ?>>
                       
                    </div>
                </td>
                <td>
                    <div class="form-check">
                    <label class="form-check-label" for="alojamiento">  Alojamiento </label>                       
                        <input class="form-check-input" type="checkbox" name="alojamiento" id="alojamiento" <?= $alojamiento ? 'checked' : '' ?>>
                        
                    </div>
                </td>
                <td>
                    <div class="form-check">
                    <label class="form-check-label" for="comidas"> Comidas </label>                       
                        <input class="form-check-input" type="checkbox" name="comidas" id="comidas" <?= $comidas ? 'checked' : '' ?>>
                       
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-check">
                    <label class="form-check-label" for="guia">Guía</label>                        
                        <input class="form-check-input" type="checkbox" name="guia" id="guia" <?= $guia ? 'checked' : '' ?>>
                        
                    </div>
                </td>
                <td>
                    <div class="form-check">
                    <label class="form-check-label" for="excursiones"> Excursiones</label>                        
                        <input class="form-check-input" type="checkbox" name="excursiones" id="excursiones" <?= $excursiones ? 'checked' : '' ?>>
                        
                    </div>
                </td>
                <!-- Aquí puedes agregar más checkboxes si es necesario -->
            </tr>
        </tbody>
    </table>
</div>


            <!-- Disponibilidad -->
            <div class="inputBox" style="grid-column: span 3;">
                <span>¿Disponible?</span>
                <label><input type="checkbox" name="availability" <?= $availability ? 'checked' : '' ?>> Sí</label>
            </div>

            <button type="submit" class="btn"><?= $id ? 'Actualizar' : 'Guardar' ?></button>
        </form>
    </section>

    <script>
        function previewImage(event) {
            const preview = document.getElementById('preview');
            preview.src = URL.createObjectURL(event.target.files[0]);
            preview.style.display = 'block';
        }
    </script>

    <?php include('../includes/footer.php'); ?>
</body>

</html>