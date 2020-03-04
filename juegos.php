<!DOCTYPE html>
<html>
<head>
	<title>Formulario de Juegos</title>
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
	 			<td colspan="2"><h1><strong>..::REGISTRO DE JUEGOS::..</strong></h1></td>
	 		</tr>
	 		<tr>
	 			<td><strong>Nombre deL Juego:</strong></td>
	 			<td><input type="text" name="njuego" placeholder="Ingrese el nombre del Juego" required=""></td>
	 		</tr>
	 		<tr>
	 			<td><strong>Valor:</strong></td>
	 			<td><input type="number" name="valor" placeholder="Ingrese el valor del Juego" required=""></td>
	 		</tr>
	 		<tr>
	 			<td><strong>Descripción:</strong></td>
	 			<td><input type="text" name="desc" placeholder="Escriba aquí la descripción que desee sobre el Juego" width="80%" height="120px" required=""></td>
	 		</tr>
	 		<tr>
	 			<td><strong>Clasificación:</strong></td>
	 			<td><select name="select">
	 				<option value="E">E</option>
	 				<option value="E+">E+</option>
	 				<option value="T">T</option>
	 				<option value="M">M</option>
	 				<option value="R">R</option>
	 				<option value="RP">RP</option>
	 			</select></td>
	 		</tr>
	 		<tr>
	 			<td colspan="2"><input id="boton" type="submit" name="btn" value="REGISTRAR"></td>
	 		</tr>
	 	</table>
	 </form>
	 </center>
<?php

	if (isset($_POST['btn'])) {
		$nombre=$_POST['njuego'];
		$valor=$_POST['valor'];
		$descripción=$_POST['desc'];
		$clasif=$_POST['select'];

		try{
			$sql="INSERT INTO juegos(`id_juego`, `Nombre_juego`, `Valor_mensualidad`, `Descripcion`, `Clasificacion`)
			values('', :nom, :val, :descrip, :clas)";

			$resultado=$base->prepare($sql);//Con esto se prepara la ejecución de mi sentencia

	 		$resultado->execute(array(":nom"=>$nombre, ":val"=>$valor, ":descrip"=>$descripción, ":clas"=>$clasif));//Ejecución de la sentencia SQL

?>
		<script language="javascript"> window.alert("Registro de juegos exitoso !!")</script>

<?php
		} catch(Exeption $e){
			die('Error: '.$e->getMessage());
	 	}
	}

?>
</body>
</html>




