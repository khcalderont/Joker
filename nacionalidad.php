<!DOCTYPE html>
<html>
<head>
	<title>Formulario Nacionalidad</title>
	<meta charset="utf-8">
	<meta charset="iso-8859-1">
	<?php
	require'joker.php'
		?>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>

<body>
	<img src="img/joker.png" width="15%" id="logo">		
	<center>
	<form method="POST" name="form">
	 	<table id="tabla">
	 		<tr>
	 			<img src="img/titulo.png" width="30%" id="titulo">
	 		</tr>
	 		<tr>
	 			<td colspan="2"><h1><strong>..::REGISTRO DE NACIOANALIDAD::..</strong></h1></td>
	 		</tr>
	 		<tr>
	 			<td><strong>Nombre de país:</strong></td>
	 			<td><input type="text" name="npais" placeholder="Ingrese el nombre del país" required=""></td>
	 		</tr>
	 		<tr>
	 			<td colspan="2"><input id="boton" type="submit" name="btn" value="REGISTRAR" required=""></td>
	 		</tr>
	 	</table>
	 </form>
	 </center>

<?php

	 if(isset($_POST['btn'])){
	 	$pais=$_POST['npais'];

	 	//Ahora se reciben y se cargan en variables los daros que vienen del formulario:
	 	try{
	 		$sql="INSERT INTO nacionalidad(`id_nacionalidad`, `Nombre_de_pais`) 
	 		values('', :nomp)"; //Ésta es una sentencia SQL de inserción almacenada en una variable

	 		$resultado=$base->prepare($sql);//Con esto se prepara la ejecución de mi sentencia

	 		$resultado->execute(array(":nomp"=>$pais));//Ejecución de la sentencia SQL

?>
		<script language="javascript"> window.alert("Registro de nacionalidad exitoso !!")</script>

<?php

	 	} catch(Exeption $e){
			die('Error: '.$e->getMessage());
	 	}
	 }

?>
</body>
</html>