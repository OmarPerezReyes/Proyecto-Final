<?php
    if(session_start()==true) session_destroy();
    session_start();
    if(isset($_SESSION['usuario'])){
        header("location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMC</title>
    <link rel="Icon" href="assets/images/logoSMCSinFondo.png" type="image/png">
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/estilos.css">
    
</head>
<body>

        <main>

            <div class="contenedor__todo">
            <div class="caja__trasera">
                    <div class="caja__trasera-login">
                        <h4>Desarrollado por:</h4>
                        <h5>Mario Coyoy López</h5>
                        <h5>Adrián Pérez Facundo</h5>
                        <h5>Omar Peréz Reyes</h5>
                        <h5>Nuria Rivera Zamarrón</h5>
                        <h5>Juan Torres Colorado</h5>
                        <button id="btn__iniciar-sesion">Regresar</button>
                    </div>
                    <div class="logo-completo">
                        <img src="./assets/images/logoSMCBlanco.png">
                    </div>

                    <div class="caja__trasera-register">
                    <center>  <label>¡No podemos caer y</label></center>
                       <center><label>dejar al COVID-19</label></center>
                    <center> <label>ganar la batalla!</label></center><br><br>
                        <button id="btn__registrarse">Conocenos</button>
                    </div>
                </div>

                <!--Formulario de Login y registro-->
                <div class="contenedor__login-register">
                    <!--Login-->
                    <form action="controllers/login_usuario_be.php" method="POST" class="formulario__login">
                        <h2>Iniciar Sesión</h2>
                        <input type="text" placeholder="Correo Electronico" name="correo">
                        <input type="password" placeholder="Contraseña" name="contrasena">
                        <button>Iniciar sesión</button>
                    </form>

                    <!--Register-->
                    <form action="controllers/login_usuario_be.php" method="POST" class="formulario__register">
                        <h2>Iniciar Sesión</h2>
                        <input type="text" placeholder="Correo Electronico" name="correo">
                        <input type="password" placeholder="Contraseña" name="contrasena">
                        <button>Iniciar sesión</button>
                    </form>
                </div>
            </div>

        </main>

        <script src="assets/js/script.js"></script>
</body>
</html>