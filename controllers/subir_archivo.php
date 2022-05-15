<?php
    include 'conexion_be.php';

    session_start();
    $correo = $_SESSION['usuario'];
    $email = explode("@","$correo");
    $confirmacion = $_POST['asistencia'];

    if($_FILES['carta']['error'] > 0){
        echo '
        <script>
            alert("Error al cargar el archivo. Por favor intente de nuevo.");
            window.location = "../registro.html";
        </script>
        ';
    } else {
        $permitido = array("application/pdf", 'image/jpg');
        if(in_array($_FILES['carta']['type'], $permitido)){
            $ruta = '../assets/files/';
            opendir($ruta);
            $destino1 = $ruta.$_FILES['carta']['name'];
            copy($_FILES['carta']['tmp_name'], $destino1);
            rename($destino1, "../assets/files/$email[0]_CartaCompromiso.pdf");

            if(!file_exists($ruta)){
                mkdir($ruta);
            }
        } else {
            echo '
            <script>
                alert("Tipo de archivo no permitido.");
                window.location = "../registro.html";
            </script>
            ';
        }
    }

    if($_FILES['certificado']['error'] > 0){
        echo '
        <script>
            alert("Error al cargar el archivo. Por favor intente de nuevo.");
            window.location = "../registro.html";
        </script>
        ';
    } else {
        $permitido = array("application/pdf", 'image/jpg');
        if(in_array($_FILES['certificado']['type'], $permitido)){
            $ruta = '../assets/files/';
            opendir($ruta);
            $destino2 = $ruta.$_FILES['certificado']['name'];
            copy($_FILES['certificado']['tmp_name'], $destino2);
            rename($destino2, "../assets/files/$email[0]_CertificadoVacunación.pdf");

            if(!file_exists($ruta)){
                mkdir($ruta);
            }
        } else {
            echo '
            <script>
                alert("Tipo de archivo no permitido.");
                window.location = "../registro.html";
            </script>
            ';
        }
    }

    $query = "INSERT INTO registro(carta_compromiso, certificado_vacunacion, confirmacion)
    VALUES('$destino1', '$destino2', '$confirmacion')";
    $ejecutar = mysqli_query($conexion, $query);
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