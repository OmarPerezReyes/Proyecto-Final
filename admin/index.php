<?php
    if(session_start()==true) session_destroy();
    session_start();
    if(isset($_SESSION['admin'])){
        header("location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMC</title>
    <link rel="Icon" href="../assets/images/logoSMCSinFondo.png" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="../assets/css/adminLogin.css">
</head>
<body>

        <main>

            <div class="contenedor__todo">
                <!--Formulario de Login y registro-->
                <div class="contenedor__login-register">
                    <!--Login-->
                    <form action="../controllers/login_admin_be.php" method="POST" class="formulario__login">
                        <h1>Administrador</h1>
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