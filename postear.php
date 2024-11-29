<?php
require_once 'main.php';
session_start();

if (isset($_SESSION['user_name'])) { 
    $username = $_SESSION['user_name'];
}
try {
    $query = "SELECT * FROM categorias"; 
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
    <link rel="stylesheet" href="assets/stylepost.css">
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
                    <a class="principal" href="pagina.php"><h3>Principal</h3></a>
                    <a class="iniciarsesion" href="logout.php"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z" clip-rule="evenodd" />
                    </svg></a>
                </div>
            </div>
        </div>
    </header>
    <div class="bandeja">
        <div class="bandejaderecha">
            <form action="logica.php" method="POST">
                <div class="caja">
                    <div class="">
                        <!-- Campo oculto con el nombre del usuario -->
                        <input type="hidden" name="user_name" value="<?php echo htmlspecialchars($_SESSION['user_name']); ?>">
    
                        <div class="titulo">
                            <label for="titulo">Ingrese un titulo</label>
                            <input type="text" name="post_titulo" required>
                        </div> 
                        <div class="contenido">
                            <label for="contenido">Contenido...</label>
                            <textarea name="post_contenido" required></textarea>
                        </div>
                        <div class="categoria">
                            <label for="categoria">Categoría</label>
                            <select name="post_categoria" required>
                                <?php foreach ($posts as $categoria): ?>
                                    <?php if (isset($categoria['categoria_id']) && isset($categoria['categoria_temas'])): ?>
                                        <option value="<?php echo htmlspecialchars($categoria['categoria_id'], ENT_QUOTES, 'UTF-8'); ?>">
                                            <?php echo htmlspecialchars($categoria['categoria_temas'], ENT_QUOTES, 'UTF-8'); ?>
                                        </option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="enviar">
                            <input type="submit" value="Subir">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="bandejaizquierda">
            <input class="buscador" type="text" name="Buscar" placeholder="Buscar...">
            <div class="mas">
                <h4>Temas populares</h4>
            </div>
            <ul>
                <li>Música</li>
                <li>Anime</li>
                <li>Literatura</li>
                <li>Fotografía, cine y diseño gráfico</li>
                <li>Exposiciones y museos</li>
            </ul>
                <div class="mas">
                <h4>Noticias recientes</h4>
                </div>
            <ul>
                <a href="bienvenida.html" class="bienvenida"><li>Bienvenidos a Ottseal!</li></a>
            </ul>
        </div>
    </div>
</body>
</html>
