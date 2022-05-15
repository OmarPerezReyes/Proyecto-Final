<!DOCTYPE html>
<?php
include 'controllers/conexion_be.php';

session_start();

if (!isset($_SESSION['usuario'])) {
    echo '
        <script>
            alert("Por favor, inicia sesión");
            window.location = "index.php";
        </script>
        ';
    session_destroy();
    die();
}
$correo = $_SESSION['usuario'];
$alumno = "SELECT * FROM alumno WHERE correo='$correo'";
?>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>SMC</title>
    <link rel="Icon" href="assets/images/logoSMCSinFondo.png" type="image/png">
    <link rel="stylesheet" href="assets/css/estilosAdrian.css">
    <link rel="stylesheet" href="assets/css/fontello.css">
    <link rel="stylesheet" href="assets/css/estilosVentana.css">
    <link rel="stylesheet" href="assets/css/menu.css">


</head>

<body>
    <br>
    <input type="checkbox" id="btn-modal">
    <label for="btn-modal" class="lbl-modal icon-user">Perfil del Alumno</label>
    <div class="modal">
        <div class="c">
            <header>Perfil del Alumno</header>
            <label for="btn-modal">X</label>
            <div class="cd">
                <div class="img">
                <?php $resultado = mysqli_query($conexion, $alumno);
                    while ($row = mysqli_fetch_assoc($resultado)) { ?>
                    <center><img src="<?php echo './assets/files/imagen_perfil/'. $row['id_matricula'] . '_ImagenPerfil.png'?>" alt=""></center>
                </div>
                <div class="ct">
                    
                </div>
                <center>
                    <p>
                    <h2><?php echo $row['nombre']; ?> <?php echo $row['apellidos'] ?></h2>
                    </p>
                </center>
                <center>
                    <p><?php echo $row['correo']; ?></p>
                </center>
                <center>
                    <p><?php $carrera = "SELECT * FROM carrera WHERE id='{$row['id_carrera']}'";
                        $resultadoDos = mysqli_query($conexion, $carrera);
                        while ($rowDos = mysqli_fetch_assoc($resultadoDos)) {
                            echo $rowDos['nombre_carrera'];
                        }
                        mysqli_free_result($resultadoDos); ?></p>
                </center>
                <br>
            <?php
                        echo ($row['estado'] ? '<center><button class="btn-est" style="background-color: green">Aceptado</button></center>':'<center><button class="btn-est" style="background-color: red">No aceptado</button></center>');
                    ?>
            <center><a class="btn" href="<?php echo 'assets/files/codigo_qr/'. $row['id_matricula'] . '_CodigoQR.png'?>">Presentar QR</a><a class="btn" href="./index.php">Cerrar Sesión</a></center>
            <?php
            }
            mysqli_free_result($resultado); 
            ?>
            </div>
        </div>
    </div>
    </div>
    <!--   Tarjetas-->
    <div class="title-cards">
        <img src="assets/images/logoCompletoSMC.png" class="logo">
    </div>
    <div class="container-card">

        <div class="card">
            <figure>
                <img src="assets/images/registro.jpg">
            </figure>
            <div class="contenido-card">
                <h3>Registro inicial</h3>
                <p>Solo será aplicado una vez para validar Su asistencia a clases presenciales, en caso de no poder asistir o ya no querer hacerlo, deberás darte de baja del sistema de asistencia, así mismo si quieres reincorporarte deberás volver a llenar este registro.
                </p>
                <a href="registro.html">Contestar</a>
            </div>
        </div>
        <div class="card">
            <figure>
                <img src="assets/images/previoAsistencia.jpg">
            </figure>
            <div class="contenido-card">
                <h3>Día previo a asistir</h3>
                <p>Favor de contestar el siguiente formulario, recuerda que en caso de aprobar tu asistencia, el código solo será válido en las próximas 24 horas.
                </p>
                <a href="diaPrevio.html">Contestar</a>
            </div>
        </div>
        <div class="card">
            <figure>
                <img src="assets/images/postAsistencia.jpg">
            </figure>
            <div class="contenido-card">
                <h3>Día posterior a asistir</h3>
                <p>Favor de contestar las siguientes preguntas con el fin de mejorar nuestro protocolo de asistencia.
                </p>
                <a href="diaPost.html">Contestar</a>
            </div>
        </div>
    </div>
    <form action="cartaCompromiso.php" method="post" class="carta">
        <button type="checkbox" id="" class="descarga">Carta compromiso</button>
    </form>
    <!--Fin   Tarjetas-->
    <footer>
        <div class="contenedor1">
            <h2>Desarrollado por:</h2>
            <label>Mario Coyoy Lopez</label>
            <label>Adrian Perez Facundo</label>
            <label>Omar Alejandro Perez Reyes</label>
            <label>Nuria Yaretzi Rivera Zamarrón</label>
            <label>Juan Daniel Torres Colorado</label>
        </div>
        <div class="contenedor2">
            <h2>Nuestras redes sociales:</h2>
            <a class="icon-facebook-squared" href="https://www.facebook.com/UPVTam">Facebook</a>
            <a class="icon-twitter" href="https://twitter.com/upvictoria">Twitter</a>
            <a class="icon-youtube-play" href="https://www.youtube.com/user/miupv">Youtube</a>
            <a class="icon-globe" href="http://www.upvictoria.edu.mx/">Sitio UPV</a>
        </div>
        <div class="contenedor3">
            <h2>Contacto y dirección:</h2>
            <label>+52 834 171 1100</label>
            <label>Av. Nuevas Tecnologías 5902,</label>
            <label>Parque Científico</label>
            <label>Tecnológico de Tamaulipas,</label>
            <label> 87138 Cd Victoria, Tamps.</label>
        </div>
    </footer>
</body>

</html>