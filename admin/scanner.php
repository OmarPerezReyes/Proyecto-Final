<?php
include '../controllers/conexion_be.php';

session_start();

if (!isset($_SESSION['admin'])) {
  echo '
        <script>
            alert("Por favor, inicia sesión");
            window.location = "index.php";
        </script>
        ';
  session_destroy();
  die();
}
$decision = null;
?>
<html>

<head>
  <title>QRCode Scanner</title>
  <link rel="Icon" href="../assets/images/logoSMCSinFondo.png" type="image/png">

  <script type="text/javascript" src="../assets/js/instascan.min.js"></script>
  <link rel="stylesheet" href="../assets/css/scanner.css">
  <link rel="stylesheet" href="../assets/css/ventanaAdmin.css">

</head>

<body>
  <div>
    <video id="preview"></video>

    <script type="text/javascript">
      let scanner = new Instascan.Scanner({
        video: document.getElementById('preview')
      });

      scanner.addListener('scan', function(content) {
        window.location.href = "scanner.php?content=" + content

        console.log(content);

      });

      Instascan.Camera.getCameras().then(function(cameras) {

        if (cameras.length > 0) {
          scanner.start(cameras[0]);
          <?php

          if (isset($_GET["content"])) {
            $contenido = $_GET["content"];
            $matricula = $contenido;
            $alumno = "SELECT * FROM alumno WHERE id_matricula='$matricula'";
            $resultado = mysqli_query($conexion, $alumno);
            while ($row = mysqli_fetch_assoc($resultado)) {
          ?>
              document.getElementById('nombre').innerHTML = ('<?php echo $row['nombre'] . ' '; ?>')
              document.getElementById('nombre').innerHTML += ('<?php echo $row['apellidos']; ?>')
              document.getElementById('correo').innerHTML = ('<?php echo $row['correo']; ?>')
              document.getElementById('carrera').innerHTML = ('<?php $carrera = "SELECT * FROM carrera WHERE id='{$row['id_carrera']}'";
                                                                $resultadoDos = mysqli_query($conexion, $carrera);
                                                                while ($rowDos = mysqli_fetch_assoc($resultadoDos)) {
                                                                  echo $rowDos['nombre_carrera'];
                                                                }
                                                                mysqli_free_result($resultadoDos); ?>')
              document.getElementById('grupo').innerHTML = ('<?php $grupo = "SELECT * FROM grupo WHERE id='{$row['id_grupo']}'";
                                                              $resultadoTres = mysqli_query($conexion, $grupo);
                                                              while ($rowTres = mysqli_fetch_assoc($resultadoTres)) {
                                                                echo $rowTres['nombre_grupo'];
                                                              }
                                                              mysqli_free_result($resultadoTres);
                                                              $decision = $row['estado'] ? true : false; ?>')
              document.getElementById('perfil').src = ('<?php echo '../assets/files/imagen_perfil/'. $row['id_matricula'] . '_ImagenPerfil.png'?>')
          <?php
            }
            mysqli_free_result($resultado);
          }

          ?>
        } else {
          console.error('No cameras found.');
        }
      }).catch(function(e) {
        console.error(e);
      });
    </script>

  </div>
  <div class="modal">
    <div class="c">
      <header>Perfil del Alumno</header>
      <div class="cd">
        <div class="img">
          <center><img id="perfil" src="../assets/images/perfil.jpg" alt=""></center>
        </div>
        <div class="ct">
        </div>
        <center>
          <p>
          <h2 id="nombre">Alumno: </h2>
          </p>
        </center>
        <center>
          <p id="correo">Correo institucional: </p>
        </center>
        <center>
          <p id="carrera">Carrera: </p>
        </center>
        <center>
          <p id="grupo">Grupo: </p>
        </center>
        <br>
        <?php
        echo ($decision ? '<center><button class="btn-est" style="background-color: green">Aceptado</button></center>' : '<center><button class="btn-est" style="background-color: red">No aceptado</button></center>');
        ?>
      </div>
    </div>
  </div>
  </div>
</body>

</html>