<?php
session_start();
session_unset(); // Elimina todas las variables de sesión
session_destroy(); // Destruye la sesión actual
session_start(); // Inicia una nueva sesión en blanco por si el usuario se autentica nuevamente
?>
<html>
    <head>
        <title>pagina inicio Ottseal</title>
        <link rel="stylesheet" href="assets/pagPrincipalEstilo.css" TYPE="text/css">
        
    </head>
    <body>
        <div class="titulo">
            <div class="ottseal">Ottseal</div>
            <div class="slogan">Seal the deal in the forums of the otterverse</div>
            <div class="Botones">
                <div class="Registrarse">
                    <a href="registro.php">SIGN UP</a>
                </div>
            <br>
                <div class="IniciarSesion">
                    <a href="iniciarSesion.php">LOG IN</a>
                </div>
            </div>
        </div>
    </body>
</html>