<?php
    require_once 'database.php';
    session_start();
    try {
        $query = "SELECT * FROM (
                      SELECT * FROM post 
                      INNER JOIN users ON post.post_usuario = users.usuario_id
                      INNER JOIN categorias ON post.post_categoria = categorias.categoria_id
                      ORDER BY post.post_id DESC
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
    <link rel="stylesheet" href="assets/todoslospoststyle.css">
</head>
    <header>
        <div class="menu">
        <div class="opciones">
                <a href="pagina.php"><img class="logo" src="assets/images/logoforo.png" alt=""></a>
                <div class="opciones-derecha">
                    <a class="categorias" href="categorias.php"><h3>Categorias</h3></a>
                    <a class="multimedia" href="pagina.php"><h3>Multimedia</h3></a>
                    <a class="amigos" href=""><h3>Amigos</h3></a>
                    <a class="perfil" href="pagina.php"><h3>Principal</h3></a>
                    <a class="iniciarsesion" href=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z" clip-rule="evenodd" />
                    </svg></a>
                </div>
            </div>
        </div>
    </header>
    <div class="bandeja">
        <div class="bandejaderecha">
        <div class="post">
                <div class="upperright" >
                    <a href="" class="vermaspost">
                        <h4>Ver mas post</h4>
                    </a>
                    <a href="postear.php" class="nuevopost"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </a>
                </div>
                    <table border="2" style="width: 60%; text-align: justify;">
                        <tbody>
                        <?php 
                            // Mostrar los posts obtenidos con PDO
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
                    <div class="final">Apartir de aqui ya no se muestran mas post.</div>
            </div>
            
        </div>
        
        </div>
    </div>
    
    

</body>
</html>