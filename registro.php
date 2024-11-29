<?php
require 'database.php';
$message = '';

if (!empty($_POST['usuarioHTML']) && !empty($_POST['correoHTML']) && !empty($_POST['claveHTML']) && !empty($_POST['claveConfHTML'])) {
    // Verificar que las contraseñas coincidan antes de cualquier otro proceso
    if ($_POST['claveHTML'] !== $_POST['claveConfHTML']) {
        $message = "ERROR 1: Las contraseñas no coinciden.";
    } elseif (!preg_match("/^[a-zA-Z0-9._%+-]+@gmail\.com$/", $_POST['correoHTML'])) {
        $message = "ERROR 2: El correo no es válido. Procure incluir @gmail.com y un usuario propio.";
    } else {
        $sql = "SELECT * FROM users WHERE usuario_nombre LIKE :nombre OR usuario_email LIKE :email"; 
        $stmt = $conexionOttseal->prepare($sql); 
        $stmt->bindParam(':nombre', $_POST['usuarioHTML']); $stmt->bindParam(':email', $_POST['correoHTML']); 
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC); 
        if ($result) {
        $message = "ERROR 3: El nombre de usuario o el correo ya existen. Por favor, Ingrese uno diferente.";
        } else {
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
            $message = "Se creó un usuario satisfactoriamente. Visita <a href='iniciarSesion.php'>LOG IN</a> para comenzar tu aventura :D";
        } else {
            $message = 'Hubo un error al crear el usuario';
        }
    }
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
    <style>
        .textoAbajo{
            font-family: fuenteLogin04;
            display: flex;
            flex-direction:row;
            justify-content: center;
        }
        
        
    </style>
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
    <div class="textoAbajo">¿Ya tienes una cuenta?  <a href="iniciarSesion.php">‎ Iniciar sesión.</a></div>
    <script type="text/javascript" src="funcionOjo.js">
    </script>
</body>
</html>