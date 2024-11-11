<?php
require_once 'database.php';
session_start();
try {
    $query = "SELECT * FROM (
                  SELECT * FROM post 
                  INNER JOIN users ON post.post_usuario = users.usuario_id
                  INNER JOIN categorias ON post.post_categoria = categorias.categoria_id
                  ORDER BY post.post_id DESC
                  LIMIT 3
              ) AS ultimos_posts
              ORDER BY ultimos_posts.fecha_hora DESC"; 
    $stmt = $conexionOttseal->query($query);
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error al consultar la base de datos: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ottseal</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <header>
        <div class="menu">
            <div class="opciones">
                <a href="pagina.php"><img class="logo" src="assets/images/logoforo.png" alt=""></a>
                <div class="opciones-derecha">
                    <a class="categorias" href="categorias.php"><h3>Categorias</h3></a>
                    <a class="multimedia" href="multimedia.php"><h3>Multimedia</h3></a>
                    <a class="amigos" href=""><h3>Amigos</h3></a>
                    <a class="perfil" href="paginaPerfil.php"><h3>Perfil</h3></a>
                    <!-- Mostrar el nombre de usuario desde la sesión -->
                    <?php if (isset($_SESSION['usuario_nombre'])): ?>
                        <a class="bienvenido" href="#"><h3>Bienvenido, <?php echo $_SESSION['usuario_nombre']; ?>!</h3></a>
                    <?php else: ?>
                        <a class="iniciarsesion" href="login.php"><h3>Iniciar sesión</h3></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>
    <div class="bandeja">
        <div class="bandejaderecha">
            <div class="post">
                <div class="upperright">
                    <div class="postrecientes">
                        <h4>Post recientes</h4>
                    </div>
                    <a href="todoslospost.php" class="vermaspost">
                        <h4>Ver más post</h4>
                    </a>
                    <a href="postear.php" class="nuevopost"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </a>
                </div>
                <table border="2" style="width: 60%; text-align: justify;">
                    <tbody>
                        <?php
                        foreach ($posts as $array) { ?>
                            <tr>
                                <td>
                                    <div class="posteo">
                                        <div class="upperpost">
                                            <div class="username"><?php echo $array['usuario_nombre']; ?></div>
                                            <div class="categoria_post"><?php echo $array['categoria_temas']; ?></div>
                                        </div>
                                        <div class="titulo"><?php echo $array['post_titulo']; ?></div>
                                        <div class="contenido"><?php echo $array['post_contenido']; ?></div>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="bandejaizquierda">
            <input class="buscador" type="text" name="Buscar" placeholder="Buscar...">
            <div class="temas">
                <h4>Temas populares</h4>
            </div>
            <ul>
                <li>Música</li>
                <li>Anime</li>
                <li>Literatura</li>
                <li>Fotografía, cine y diseño gráfico</li>
                <li>Exposiciones y museos</li>
            </ul>
            <div class="temas">
                <h4>Noticias recientes</h4>
            </div>
            <ul>
                <a href="bienvenida.html" class="bienvenida"><li>Bienvenidos a Ottseal!</li></a>
            </ul>
        </div>
    </div>
</body>
</html>
