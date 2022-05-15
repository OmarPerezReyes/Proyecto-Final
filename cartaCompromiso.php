<?php
require_once __DIR__ . '/vendor/autoload.php';
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
function actual_date ()  
{  
    $week_days = array ("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado");  
    $months = array ("", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");  
    $year_now = date ("Y");  
    $month_now = date ("n");  
    $day_now = date ("j");  
    $week_day_now = date ("w");  
    $date = $week_days[$week_day_now] . ", " . $day_now . " de " . $months[$month_now] . " de " . $year_now;   
    return $date;    
}  
$mpdf = new \Mpdf\Mpdf();

$correo = $_SESSION['usuario'];
$alumno = "SELECT * FROM alumno WHERE correo='$correo'";
$resultado = mysqli_query($conexion, $alumno);

$html = '<div style="display:flex"><img src="assets/images/logoUPV.png" align="left" width="25%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<img src="assets/images/logoUTyP.png" align="right" width="25%"></div>
<h2 style="text-align:center"><p>Universidad Politécnica de Victoria</p></h2>
<h3 style="text-align:center">Regreso a clases seguro</h3>
<h3 style="text-align:center">Carta Comprimiso</h3>
<br>';

while ($row = mysqli_fetch_assoc($resultado)) {
    $html .= "<p>Alumno: " . $row['nombre'] . " " . $row['apellidos'] . '</p>
    <p>Matrícula: ' . $row['id_matricula'] . '</p><p>Carrera: ';
    $carrera = "SELECT * FROM carrera WHERE id='{$row['id_carrera']}'";
    $resultadoDos = mysqli_query($conexion, $carrera);
    while ($rowDos = mysqli_fetch_assoc($resultadoDos)) {
        $html .= $rowDos['nombre_carrera'];
    }
    mysqli_free_result($resultadoDos);
    $grupo = "SELECT * FROM grupo WHERE id='{$row['id_grupo']}'";
    $resultadoTres = mysqli_query($conexion, $grupo);
    while ($rowTres = mysqli_fetch_assoc($resultadoTres)) {
        $html .= '</p>
      <p>Grupo: ' . $rowTres['nombre_grupo'];
    }
    mysqli_free_result($resultadoTres);
}
mysqli_free_result($resultado);

$html .= '</p>
  <p>Manifiesto mi compromiso de: </p>
<ul>
    <li>Hablar con la verdad en los formularios posteriores a contestar.</li>
    <li>Identificar e informar la presencia de signos y síntomas relacionados con la enfermedad COVID-19
        como: malestar general, tos seca, estornudos, dolor de cabeza, fiebre o dificultad para respirar.</li>
    <li>Dirigirse directa y exclusivamente al espacio donde se impartirá la sesión académica.</li>
    <li>Respetar las rutas de entrada y salida de la institución.</li>
    <li>Evitar salir a lugares que conlleven aglomeración de personas.</li>
    <li>Evitar el consumo de alimentos dentro de la institución educativa, como forma de salvaguardar mi salud.</li>
    <li>Promover hábitos de higiene y salud que disminuyan la propagación del virus.</li>
</ul>
<br><br>
<p style="text-align:center">__________________________________________</p>
<p style="text-align:center">Firma del Alumno</p>
<br><br>
<p>*El hecho de incumplir las reglas mostradas con anterioridad será nulo el registro y no podrás ingresar al plantel </p>
<br>
<span style = "text-align: left display:flex">Ciudad Victoria, Tamaulipas &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
$html .= '' . actual_date('l jS \of F Y') . '</span>
';

$mpdf->WriteHTML($html);
$mpdf->Output();
