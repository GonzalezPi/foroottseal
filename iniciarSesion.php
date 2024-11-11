<?php
require 'database.php';
session_start();

if (!empty($_POST['correoLoginHTML']) && !empty($_POST['contraLoginHTML'])) {
    // Consulta solo el correo para obtener el hash de la contraseña almacenada
    $records = $conexionOttseal->prepare("SELECT usuario_id, usuario_contra, usuario_nombre FROM users WHERE usuario_email = :email2");
    $records->bindParam(':email2', $_POST['correoLoginHTML']);
    $records->execute();
    $user = $records->fetch(PDO::FETCH_ASSOC);
    
    $message = '';
    // Si se encontró el usuario y la contraseña es válida
    if ($user && password_verify($_POST['contraLoginHTML'], $user['usuario_contra'])) {
        $_SESSION['user_id'] = $user['usuario_id'];              // Almacenar el ID del usuario
        $_SESSION['user_name'] = $user['usuario_nombre'];         // Almacenar el nombre del usuario
        header('Location: pagina.php');  // Redirigir a pagina.php
        exit();  
    } else {
        $message = 'Algo no cuadra bro. No pudimos iniciar sesión, perdón bro';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INICIAR SESION</title>
    <link rel="stylesheet" type="text/css" href="assets/estiloIniciarSesion.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=visibility_off" />
    
</head>
<body>


    
    <div class="conteiner">
    <?php if (!empty($message)) : ?>
            <?= $message ?>
        <?php endif; ?>
        <div class="tituloOttseal">Ottseal</div>
            <div class="logoOttseal">
            <img src="assets/images/logoOttsealPng.png" width="70" height="70">
        </div>
        <div class="textosInicio">
            <div class="textoInicio01">Hola de nuevo, </div><div class="textoInicio02">OTTSEALER&excl;</div>
        </div>
        
        <div class="inputs">
                <div class="subConteiner">
                    <form method="post" action="iniciarSesion.php">
                
                        <div class="usuario"> <br>
                            <input type="text" class="usuarioInput" value="" name="correoLoginHTML" placeholder="Ingrese su correo...">
                        </div>
                        <div class="contra"> <br>
                            <input type="password" id="contraInput" value="" name="contraLoginHTML" placeholder="Ingrese su clave...">
                        </div>
                        <span id="togglePasswordLogIn">
                            <span class="material-symbols-outlined" id="eyeIcon">visibility_off</span>
                        </span>
                        <div class="enviarLogIn">
                            <input type="submit" class="logInInput" value="LOG IN">
                        </div>
                        <span class="claveIcon">
                            <img src="assets/images/candadoLogIn.png" width="40px" height="20px">
                        </span>
                       <span class="correoIcon">
                            <img src="assets/images/correoLogIn.png" width="30px" height="30px">
                        </span>
                       <span class="usuarioIcon">
                            <img src="assets/images/userOttseal.png" width="110px" height="100px">
                       </span>
                       </form>
                </div>
                
        </div>
       
    </div>
    

<script type="text/javascript" src="funcionOjoLogIn.js">
</script>
</body>
</html>
<!---paños=null-->