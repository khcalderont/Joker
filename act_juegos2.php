<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta charset="iso-8859-1">
<?php
	require('joker.php');
?>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<title>Actualización..!</title>
</head>
<body>

<?php 

	try{
		$sql1="SELECT * FROM juegos WHERE id_juego".$_REQUEST['cod'].";";
		$resultado1=$base->prepare($sql1);
		$resultado1->execute(array());
		while ($consulta1=$resultado1->fetch(PDO::FETCH_ASSOC)) { 
?>

		<form method="POST" action="act_juegos.php?cod=<?php echo $_REQUEST["cod"]; ?>">

		<center>
	 	<table>
	 		
	 		<tr>
	 			<td colspan="2"><h1><strong>ACTUALIZACIÓN DE JUEGOS..!!</strong></h1></td>
	 		</tr>
	 		<tr>
	 			<td>Nombre deL Juego:</td>
	 			<td><input type="text" name="njuego" placeholder="Ingrese el nombre del Juego" required="" value=""></td>
	 		</tr>
	 		<tr>
	 			<td>Valor:</td>
	 			<td><input type="number" name="valor" placeholder="Ingrese el valor del Juego" required=""></td>
	 		</tr>
	 		<tr>
	 			<td>Descripción:</td>
	 			<td><input type="text" name="desc" placeholder="Escriba aquí la descripción que desee sobre el Juego" width="80%" height="120px" required="<?php echo $consulta['Nombre_juego']; ?>"></td>
	 		</tr>
	 		<tr>
	 			<td>Clasificación:</td>
	 			<td><select name="select" required="">
	 				<option value="E">E</option>
	 				<option value="E+">E+</option>
	 				<option value="T">T</option>
	 				<option value="M">M</option>
	 				<option value="R">R</option>
	 				<option value="RP">RP</option>
	 			</select></td>
	 		</tr>
	 		<tr>
	 			<td><input id="boton" type="submit" name="btn" value="Actualizar"></td>
	 		</tr>
	 	</table>
	 </form>
	 </center>
		<?php
		}
	}catch(Exeption $e){
			die('Error: '.$e->getMessage());
	 	}
?>
	
<?php
	
	if (isset($_POST['btn'])) {
		try{
		$nombre=$_POST['njuego'];
		$valor=$_POST['valor'];
		$descripción=$_POST['desc'];
		$clasif=$_POST['select'];

		$sql2="UPDATE juegos SET `Nombre_juego`=:nom,`Valor_mensualidad`=:val,`Descripcion`=:descrip,`Clasificacion`=:clas".$_REQUEST["cod"];

		$resultado=$base->prepare($sql);//Con esto se prepara la ejecución de mi sentencia

	 		$resultado->execute(array(":nom"=>$nombre, ":val"=>$valor, ":descrip"=>$descripción, ":clas"=>$clasif));//Ejecución de la sentencia SQL
?>
		<script language="javascript"> window.alert("Actualización de juego exitoso !!"); window.location="consulta_juegos.php"</script>

<?php
		} catch(Exeption $e){
			die('Error: '.$e->getMessage());
	 	}
	}

?>
</body>
</html>