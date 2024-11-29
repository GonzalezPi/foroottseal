<?php
    include_once 'database.php';
    session_start();

    // Consulta para obtener los últimos 30 posts con los datos del usuario y la categoría
    $query = "SELECT * FROM (
                  SELECT * FROM post 
                  INNER JOIN users ON post.post_usuario = users.usuario_id
                  INNER JOIN categorias ON post.post_categoria = categorias.categoria_id
                  ORDER BY post.post_id DESC
                  LIMIT 30
              ) AS ultimos_posts
              ORDER BY ultimos_posts.fecha_hora DESC";

    try {
        $stmt = $conexionOttseal->query($query);
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error en la consulta: " . $e->getMessage();
        die();
    }

    if (isset($_SESSION['user_name'])) {
        // Acceder a la variable de sesión
        $user_name = $_SESSION['user_name'];
        echo "<i class='welcome-message'>Eres Ottsealer, " . htmlspecialchars($user_name) . "</i>";
    } else {
        echo 'No has iniciado sesión.';
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
                    <a class="perfil" href="pagina.php"><h3>Perfil</h3></a>
                    <a class="iniciarsesion" href="">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z" clip-rule="evenodd"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <div class="cuadradoPerfil">
        <div class="perfilCaja"></div>
        <div class="perfilImagen">
            <img src="assets/images/perfilOttseal.png" width="100" height="100">
        </div>
        <div class="nombre">
            <div class="nombrePerfil">
            <?php echo htmlspecialchars($user_name) ?>
        </div>
        </div>
        
        <a class="logOut" href="index.php">LOG OUT</a>
        <div class="logoutBox"></div>
    </div>
<style>
    
    .perfilCaja{
        position:absolute;
    width: 300px;
    height:300px;
    background-color:#FE8592;
    border-radius:5px;
    margin-left:1200px;
    margin-top: 40px;
    z-index:40;
    box-shadow:0px 0px 10px #964F56;
    
}
@font-face{
    font-family: fuenteLogin5;
    src: url(fuentes/Momcake-Bold.otf);
}
.perfilImagen{
     position:absolute;
     z-index: 41;
     margin-left: 1300px;
     margin-top: 90px;   
    }
    .nombrePerfil {
        font-family:fuenteLogin5;
        font-size: 40px;
        color: pink;
        position: absolute;
        z-index:43;
        margin-left:85%;
        margin-top: 190px;
    }
    .welcome-message{
        font-family:fuenteLogin5;
        font-size: 20px;
        color: pink;
        position: absolute;
        z-index:43;
        margin-left:1240px;
        margin-top:310px;
    }
    .logOut{
        font-family:fuenteLogin4;
        font-size: 20px;
        color: PINK;
        position: absolute;
        z-index:44;
        margin-left:1300px;
        margin-top: 290px;
    }
    @font-face{
    font-family: fuenteLogin4;
    src: url(fuentes/PlusJakartaSans-Italic-VariableFont_wght.ttf);
    
}
.logoutBox{
    position:absolute;
    width: 140px;
    height:50px;
    background-color:#FD4F76;
    border-radius:5px;
    margin-left:1278px;
    margin-top: 280px;
    z-index:40;
    box-shadow:0px 0px 90px #964F56;
}
.cuadradoPerfil{
    
    opacity: 0;
    animation: fadeIn 2s forwards;
}
@keyframes fadeIn {
    to {opacity :1;}
}

</style>
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
                <a href="postear.php" class="nuevopost">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </a>
            </div>
            <table border="2" style="width: 60%; text-align: justify;">
                <tbody>
                    <?php 
                    foreach ($posts as $post) { ?>
                        <tr>
                            <td>
                                <div class="posteo">
                                    <div class="upperpost">
                                        <div class="username"><?php echo htmlspecialchars($post['usuario_nombre']); ?></div>
                                        <div class="categoria_post"><?php echo htmlspecialchars($post['categoria_temas']); ?></div>
                                    </div>
                                    <div class="titulo"><?php echo htmlspecialchars($post['post_titulo']); ?></div>
                                    <div class="contenido"><?php echo htmlspecialchars($post['post_contenido']); ?></div>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Additional content -->
</div>
</body>
</html>
