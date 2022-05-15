<?php
    include 'conexion_be.php';

    $n1 = $_POST['1'];
    $n2 = $_POST['2'];
    $n3 = $_POST['3'];
    $n4 = implode(", ", $_POST['sintomas']);
    $n5 = $_POST['5'];
    $n6 = $_POST['6'];
    $n7 = implode(", ",  $_POST['productos']);

    $query = "INSERT INTO ingreso_previo(fiebre, tos, dolor_cabeza, sintomas, lugares_publicos, visitas_conocidos,
    productos) VALUE ('$n1', '$n2', '$n3', '$n4', '$n5', '$n6', '$n7')";

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
            window.location = "../diaPrevio.html"
            </script>';
    }
?>