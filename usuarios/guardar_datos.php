<?php
include('../includes/conexion.php'); // Conexión a la base de datos

// Verificar que la solicitud sea mediante POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoger datos del formulario
    $usuario = $_POST['usuario'];
    $apellidos = $_POST['apellidos'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $user_id = $_POST['user_id'] ?? null; // ID del usuario para actualización
    $foto_perfil = null;

    // Procesar la subida de la foto
    if (isset($_FILES['foto_perfil']) && $_FILES['foto_perfil']['error'] === UPLOAD_ERR_OK) {
        $foto_tmp = $_FILES['foto_perfil']['tmp_name'];
        $foto_nombre = basename($_FILES['foto_perfil']['name']);
        $foto_ruta = '../uploads/' . $foto_nombre;

        // Mover el archivo subido a la carpeta "uploads"
        if (move_uploaded_file($foto_tmp, $foto_ruta)) {
            $foto_perfil = $foto_ruta; // Guardar la ruta del archivo
        } else {
            echo "Error al subir la foto.";
            exit;
        }
    }

    if ($user_id) {
        // Actualizar datos existentes en la tabla "usuarios"
        $query = "UPDATE usuarios SET 
                    usuario = '$usuario', 
                    apellidos = '$apellidos', 
                    direccion = '$direccion', 
                    telefono = '$telefono', 
                    email = '$email'";

        // Si hay una nueva foto, incluirla en la actualización
        if ($foto_perfil) {
            $query .= ", foto_perfil = '$foto_perfil'";
        }

        $query .= " WHERE id = $user_id";
    } else {
        // Insertar nuevo usuario en la tabla "usuarios"
        $query = "INSERT INTO usuarios (usuario, apellidos, direccion, telefono, email, foto_perfil) 
                  VALUES ('$usuario', '$apellidos', '$direccion', '$telefono', '$email', '$foto_perfil')";
    }

    // Ejecutar la consulta
    if (mysqli_query($link, $query)) {
        header("Location: perfil.php"); // Redirigir a la página de perfil después de guardar
        exit;
    } else {
        echo "Error al guardar los datos: " . mysqli_error($link);
    }
} else {
    echo "Solicitud no válida.";
}
