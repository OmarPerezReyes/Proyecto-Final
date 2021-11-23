<?php

  //Inicia una sesión
  session_start();

  //Verifica si ya existe una sesióna abierta, si no, no se puede acceder
  if(!isset($_SESSION['usuario'])){
    echo '
      <script>
        alert("Primero debes inicar sesión");
        window.location = "index.php";
      </script>
    ';
    session_destroy();
    die();
  }

?>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formulario</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="assets/css/estilosAdrian.css">
</head>

<body>

	<form action="index.html" method="post">

		<h1>Formulario</h1>

		<fieldset>
			<legend><span class="number">1</span>Responder lo siguiente</legend>
      <label for="name">Nombre Completo:</label>
      <input type="text" id="name" name="user_name">
      <label>Sexo:</label>
      <input type="radio" id="hombre" value="hombre" name="sexo"><label for="hombre" class="light">Hombre</label><br>
      <input type="radio" id="mujer" value="mujer" name="sexo"><label for="mujer" class="light">Mujer</label>
      <br><br>
      <label>Edad:</label>
      <input type="radio" id="menor18" value="menor18" name="edad"><label for="menor18" class="light">Menor de 18</label><br>
      <input type="radio" id="mayor18" value="mayor18" name="edad"><label for="mayor18" class="light">Mayor de 18</label>
      <br><br>
      <label>Durantes los recientes días, has tenido alguno de los siguientes síntomas:</label>
      <input type="checkbox" id="fiebre" value="fiebre" name="sintomas"><label for="fiebre" class="light">Fiebre</label><br>
      <input type="checkbox" id="tosSeca" value="tosSeca" name="sintomas"><label for="tosSeca" class="light">Tos Seca</label><br>
      <input type="checkbox" id="cansancio" value="cansancio" name="sintomas"><label for="cansancio" class="light">Cansancio</label><br>
      <input type="checkbox" id="gustoOl" value="gustoOl" name="sintomas"><label for="gustoOl" class="light">Perdida del gusto o el olfato</label><br>
      <input type="checkbox" id="dolorG" value="dolorG" name="sintomas"><label for="dolorG" class="light">Dolor de garganta</label><br>
      <input type="checkbox" id="dolorC" value="dolorC" name="sintomas"><label for="dolorC" class="light">Dolor de cabeza</label><br>
      <input type="checkbox" id="dolorMA" value="dolorMA" name="sintomas"><label for="dolorMA" class="light">Dolores musculares o articulares</label><br>
      <input type="checkbox" id="apetito" value="apetito" name="sintomas"><label for="apetito" class="light">Perdida de apetito</label><br>
      <input type="checkbox" id="dolorOP" value="dolorOP" name="sintomas"><label for="dolorOP" class="light">Dolor u opresion en el pecho</label><br>
      <input type="checkbox" id="ansiedad" value="ansiedad" name="sintomas"><label for="ansiedad" class="light">Ansiedad</label><br>
      <input type="checkbox" id="depresion" value="depresion" name="sintomas"><label for="depresion" class="light">Depresion</label><br>
      <br>
      <label>¿Has hecho alguna prueba para saber si tienes covid?</label>
      <input type="radio" id="si" value="si" name="prueba"><label for="si" class="light">Si</label><br>
      <input type="radio" id="si" value="no" name="prueba"><label for="no" class="light">No</label><br>
      <br>
      <label>¿Has estado en aislamiento?</label>
      <input type="radio" id="si" value="si" name="aislamiento"><label for="si" class="light">Si</label><br>
      <input type="radio" id="si" value="no" name="aislamiento"><label for="no" class="light">No</label><br>
      <br>
      <label>¿Con qué frecuencia sales de casa para ir a lugares públicos?</label>
      <input type="radio" id="1-2" value="1-2" name="salir"><label for="1-2" class="light">1-2 veces a la semana</label><br>
      <input type="radio" id="3-4" value="3-4" name="salir"><label for="3-4" class="light">3-4 veces a la semana</label><br>
      <input type="radio" id="5" value="5" name="salir"><label for="5" class="light">5 o mas veces a la semana</label><br>
      <br>
      <label>Con qué frecuencia visitas a conocidos, amigos o familia?</label>
      <input type="radio" id="1-2" value="1-2" name="visitas"><label for="1-2" class="light">1-2 veces a la semana</label><br>
      <input type="radio" id="3-4" value="3-4" name="visitas"><label for="3-4" class="light">3-4 veces a la semana</label><br>
      <input type="radio" id="5" value="5" name="visitas"><label for="5" class="light">5 o mas veces a la semana</label><br>
      <br>
    </select>
    </fieldset>
    <button type="submit">Enviar respuestas</button>
    <button type="submit" href="php/cerrar_sesion.php">Cerrar sesión</button>
  </form>
  
</body>
</html>