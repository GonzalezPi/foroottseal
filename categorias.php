<?php
    include_once 'database.php';
    
    $query = "SELECT * FROM categorias";
    $stmt = $conexionOttseal->prepare($query);
    $stmt->execute();
    $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ottseal</title>
    <link rel="stylesheet" href="assets/stylecategorias.css">
</head>
<body>
    <header>
        <div class="menu">
            <div class="opciones">
                <a href="pagina.php"><img class="logo" src="assets/images/logoforo.png" alt=""></a>
                <div class="opciones-derecha">
                    <a class="multimedia" href="multimedia.php"><h3>Multimedia</h3></a>
                    <a class="principal" href="pagina.php"><h3>Principal</h3></a>
                    <a class="amigos" href=""><h3>Amigos</h3></a>
                    <a class="perfil" href=""><h3>Perfil</h3></a>
                    <a class="iniciarsesion" href="">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z" clip-rule="evenodd"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <div class="bandeja">
        <div class="bandejaderecha">
            <ul>
                <?php 
                    foreach ($categorias as $categoria) { ?>
                        <li><h2><?php echo htmlspecialchars($categoria['categoria_temas']); ?></h2></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</body>
</html>
