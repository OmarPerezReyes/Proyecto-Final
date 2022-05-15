<?php
    include 'conexion_be.php';

    session_start();

    if(!isset($_SESSION['usuario'])){
        echo '
        <script>
            alert("Inicia sesión para acceder.");
            window.location = "../index.php";
        </script>
        ';
        session_destroy();
        die();
    }

    $correo = $_SESSION['usuario'];
    $email = explode("@","$correo");


    if($_FILES['qr']['error'] > 0){
        echo '
        <script>
            alert("Error al cargar el archivo. Por favor intente de nuevo.");
            window.location = "../registro.html";
        </script>
        ';
    } else {
        $permitido = array('image/jpg', 'image/jpge', 'image/png');
        if(in_array($_FILES['qr']['type'], $permitido)){
            $ruta = '../assets/files/codigo_qr';
            opendir($ruta);
            $destino1 = $ruta.$_FILES['qr']['name'];
            copy($_FILES['qr']['tmp_name'], $destino1);
            $extension = strtolower(pathinfo($destino1, PATHINFO_EXTENSION));
            rename($destino1, "../assets/files/codigo_qr/$email[0]_CodigoQR.$extension");
            $qr = "../assets/files/codigo_qr/$email[0]_CodigoQR.$extension";
            if(!file_exists($ruta)){
                mkdir($ruta);
            }
        } else {
            echo '
            <script>
                alert("Tipo de archivo no permitido.");
                window.location = "../subir_codigo.php";
            </script>
            ';
        }
    }

    if($_FILES['imagen_perfil']['error'] > 0){
        echo '
        <script>
            alert("Error al cargar el archivo. Por favor intente de nuevo.");
            window.location = "../subir_codigo.php";
        </script>
        ';
    } else {
        $permitido = array('image/jpg', 'image/jpge', 'image/png');
        if(in_array($_FILES['imagen_perfil']['type'], $permitido)){
            $ruta = '../assets/files/imagen_perfil/';
            opendir($ruta);
            $destino2 = $ruta.$_FILES['imagen_perfil']['name'];
            copy($_FILES['imagen_perfil']['tmp_name'], $destino2);
            $extension = strtolower(pathinfo($destino1, PATHINFO_EXTENSION));
            rename($destino2, "../assets/files/imagen_perfil/$email[0]_ImagenPerfil.$extension");
            $perfil = "../assets/files/imagen_perfil/$email[0]_ImagenPerfil.$extension";
            if(!file_exists($ruta)){
                mkdir($ruta);
            }
        } else {
            echo '
            <script>
                alert("Tipo de archivo no permitido.");
                window.location = "../subir_codigo.php";
            </script>
            ';
        }
    }

    $actualizar = "UPDATE alumno SET codigo_qr='$destino1', imagen_perfil='$destino2' WHERE correo='$correo'";
    $ejecutar = mysqli_query($conexion, $actualizar);
    if($ejecutar){
        echo '
            <script>
            window.location = "../menu.php"
            </script>';
    }else{
        echo '
            <script>
            alert("No se pudo realizar la acción. Intente nuevamente.");
            window.location = "../registro.html"
            </script>';
    }
?>