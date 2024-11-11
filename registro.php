<?php
require 'database.php';
$message = '';
if (!empty($_POST['usuarioHTML']) && !empty($_POST['correoHTML']) && !empty($_POST['claveHTML']) && !empty($_POST['claveConfHTML'])) {
    // Verificar que las contraseñas coincidan
    if ($_POST['claveHTML'] === $_POST['claveConfHTML']) { 
        $password = password_hash($_POST['claveHTML'], PASSWORD_BCRYPT);

        // Preparar la consulta SQL sin `usuario_contraConf`
        $sql = "INSERT INTO users (usuario_nombre, usuario_email, usuario_contra) VALUES (:nombre, :email, :contra)";
        $stmt = $conexionOttseal->prepare($sql);
        
        // Vincular los parámetros
        $stmt->bindParam(':nombre', $_POST['usuarioHTML']);
        $stmt->bindParam(':email', $_POST['correoHTML']);
        $stmt->bindParam(':contra', $password);

        // Ejecutar la consulta y verificar el resultado
        if ($stmt->execute()) {
            $message = 'Se creó un usuario satisfactoriamente';
        } else {
            $message = 'No se pudo crear el usuario';
        }
    } else {
        $message = "Las contraseñas no coinciden.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registro</title>
    <link rel="stylesheet" type="text/css" href="assets/estiloLogin01.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
    <?php
    if (!empty($message)):?>
        <p><?= $message ?> </p>
    <?php endif; ?>
    <section class="login-container">
        <div class="izq-blanca">
            <div class="logoTexto">
                ottseal
            </div>  
            <img src="assets/images/logoOttsealPng.png" class="logoImg">
            <div class="hola">Hola,</div>
            <b>ottsealer!</b>
            <form action="registro.php" method="post">
                
                <input type="text" placeholder="Su usuario" name="usuarioHTML" class="usuarioInput"><br>

                <input type="text" placeholder="Su correo" name="correoHTML"><br>

                <input type="password" id="password" name="claveHTML" placeholder="Su clave" /><br>
                <span class="eye-icon" id="togglePassword">
                    <span class="material-symbols-outlined"  id="eyeIcon">visibility_off</span>
                </span>

                <input type="password" id="passwordConf" name="claveConfHTML" placeholder="Confirmar clave" /> <br>
                <span class="eye-icon" id="togglePassword2">
                    <span class="material-symbols-outlined" id="eyeIcon2">visibility_off</span>
                </span>
                <input class="enviarSign" type="submit" value="SIGN IN">
            
            </form>
        </div>
        <div class="der-img">

        </div>
    </section>
    <script type="text/javascript" src="funcionOjo.js">
    </script>
</body>
</html>
