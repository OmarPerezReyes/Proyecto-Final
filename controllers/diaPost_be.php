<?php
    include 'conexion_be.php';

    $n1 = $_POST['1'];
    $n2 = $_POST['2'];
    $n3 = $_POST['3'];
    $n4 = $_POST['4'];
    $n5 = $_POST['5'];
    $n6 = $_POST['6'];
    $n7 = $_POST['7'];
    $n8 = $_POST['8'];
    $n9 = $_POST['9'];
    $n10 = $_POST['10'];

    $query = "INSERT INTO ingreso_post(proceso_ingreso, medida_temperatura, tunel_sanitizante,
    gel_antibacterial, desinfeccion_calzado, cubrebocas, distancia_social_alumnos, distancia_social_docentes,
    agua_jabon, medidas_implementadas)
    VALUES('$n1', '$n2', '$n3','$n4', '$n5', '$n6', '$n7', '$n8', '$n9', '$n10')";

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
            window.location = "../diaPost.html"
            </script>';
    }
?>