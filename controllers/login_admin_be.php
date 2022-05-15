<?php
    session_start();
    
    include 'conexion_be.php';

    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    $validar_login = mysqli_query($conexion, "SELECT * FROM administrador WHERE correo_admin='$correo'
    and contrasena_admin='$contrasena'");

    if(mysqli_num_rows($validar_login) > 0){
        $_SESSION['admin'] = $correo;
        header("location: ../admin/scanner.php");
        exit();
    }else{
        echo '
            <script>
                alert("Usuario inexistente. Ingrese un usario válido.");
                window.location = "../admin/index.php"
            </script>
        ';
        exit();
    }
?>