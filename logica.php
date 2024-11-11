}<?php
include('./main.php');
session_start();

// Verificamos si el usuario está logueado
if (isset($_SESSION['usuario_id'])) {
    // Obtener los datos del formulario
    $usuario = $_SESSION['usuario_id']; // Se usa $_SESSION['usuario_id'] correctamente
    $categoria = $_POST['post_categoria'];
    $contenido = $_POST['post_contenido'];
    $titulo = $_POST['post_titulo'];
    $categorias_varias = $_POST['categoria_temas'];

    // Verificación de la conexión a la base de datos
    if (!isset($con)) {
        $con = mysqli_connect("localhost", "usuario", "contraseña", "base_de_datos");
        if (!$con) {
            die("Conexión fallida: " . mysqli_connect_error());
        }
    }

    // Usamos sentencias preparadas para evitar inyección SQL
    $query = $con->prepare("INSERT INTO post (post_usuario, post_contenido, post_titulo, post_categoria) 
                            VALUES (?, ?, ?, ?)");
    $query->bind_param("isss", $usuario, $contenido, $titulo, $categoria);

    // Ejecutar la consulta
    if ($query->execute()) {
        // Redirigir a la página si el post se guardó exitosamente
        header('Location:pagina.php');
        exit(); // Importante para evitar que el código continúe ejecutándose después del redireccionamiento
    } else {
        echo 'Error al guardar el post. Inténtalo nuevamente.';
    }
} else {
    // Si no hay usuario logueado, redirigir a la página de login
    echo 'Debes iniciar sesión para publicar un post.';
}

