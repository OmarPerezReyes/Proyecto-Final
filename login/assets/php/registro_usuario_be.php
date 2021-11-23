<?php
    //Incluye el archivo que establece la conexión a la BD
    include 'conexion_be.php';

    //variables
    $nombre_completo = $_POST['nombre_completo'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    //Método para insertar los datos  que ingresa el usuario en la tabla de mi BD
    $query = "INSERT INTO usuarios(nombre_completo, correo, usuario, contrasena) 
              VALUES('$nombre_completo', '$correo','$usuario','$contrasena')";
    //Ejecuta el método en la base de datos. La primera ariables es porque es la «llave» a la BD.
    $ejecutar = mysqli_query($conexion, $query);

    //Lanza una alertaa depeniendo de s se pudo hacer o no la conexión. Además regresa a la página principal.
    if($ejecutar){
        echo '
            <script>
            alert("Eres nuevo usuario");
            window.location = "../index.php";
            </script>';
    }else{
        echo '
            <script>
            alert("No se pudo realizar la acción. Intente nuevamente.");
            window.location = "../index.php";
            </script>';
    }

    //Cierra la conexión
    mysqli_close($conexion);
?>