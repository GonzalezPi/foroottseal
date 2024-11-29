<?php
require_once 'database.php';
session_start();

// Verificamos si el usuario está logueado
if (isset($_SESSION['user_id'])) {
    // Obtener los datos del formulario
    $usuario = $_SESSION['user_id'];
    $categoria_id = $_POST['post_categoria']; // Ahora obtienes la categoría seleccionada
    $contenido = $_POST['post_contenido'];
    $titulo = $_POST['post_titulo'];

    try {
        // Usamos una consulta preparada para evitar inyección SQL
        $query = "INSERT INTO post (post_usuario, post_contenido, post_titulo, post_categoria) 
                  VALUES (:usuario, :contenido, :titulo, :categoria_id)";
        $stmt = $conexionOttseal->prepare($query);
        $stmt->bindParam(':usuario', $usuario, PDO::PARAM_INT);
        $stmt->bindParam(':contenido', $contenido, PDO::PARAM_STR);
        $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $stmt->bindParam(':categoria_id', $categoria_id, PDO::PARAM_INT);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            // Redirigir a la página si el post se guardó exitosamente
            header('Location: pagina.php');
            exit();
        } else {
            echo 'Error al guardar el post. Inténtalo nuevamente.';
        }
    } catch (PDOException $e) {
        die("Error al guardar el post en la base de datos: " . $e->getMessage());
    }
} else {
    // Si no hay usuario logueado, redirigir a la página de login
    echo 'Debes iniciar sesión para publicar un post.';
}
