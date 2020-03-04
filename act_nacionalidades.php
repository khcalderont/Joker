<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta charset="iso-8859-1">
<?php
	require('joker.php');
?>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<title>Actualización de Nacionalidades</title>
</head>
<body>
	<img src="img/joker.png" width="15%" id="logo">
	<?php 

	try{
		$sql1="SELECT * FROM nacionalidad WHERE id_nacionalidad=".$_REQUEST['cod'].";";
		$resultado1=$base->prepare($sql1);
		$resultado1->execute(array());
		while ($consulta1=$resultado1->fetch(PDO::FETCH_ASSOC)) { 
	?>
	<form method="POST" action="act_nacionalidades.php?cod=<?php echo $_REQUEST["cod"]; ?>">

	<center>
	 	<table>
	 		<tr>
	 			<img src="img/titulo.png" width="30%" id="titulo">
	 		</tr>
	 		<tr>
	 			<td colspan="2"><h1><strong>ACTUALIZACIÓN DE NACIONALIDADES..!!</strong></h1></td>
	 		</tr>
	 		<tr>
	 			<td>Nombre de Nacionalidad:</td>
	 			<td><input type="text" name="nnacionalidad" required="" value="<?php echo $consulta1['Nombre_de_pais'];?>"></td>
	 		</tr>
	 		<tr>
	 			<td><input id="boton" type="submit" name="btn" value="Actualizar"></td>
	 		</tr>
	 	</table>
	</center>
	</form>
<?php
		}
	}catch(Exeption $e){
			die('Error: '.$e->getMessage());
	 	}
?>
	
<?php

	if (isset($_POST['btn'])) {
		try{
		$nombre=$_POST['nnacionalidad'];

		$sql="UPDATE nacionalidad SET `Nombre_de_pais`=:nom WHERE id_nacionalidad=".$_REQUEST["cod"].";";
		$resultado=$base->prepare($sql);//Con esto se prepara la ejecución de mi sentencia

	 		$resultado->execute(array(":nom"=>$nombre));//Ejecución de la sentencia SQL
?>
		<script language="javascript"> window.alert("Actualización de nacionalidad exitosa !!"); window.location="consulta_nacionalidades.php"</script>

<?php
		} catch(Exeption $e){
			die('Error: '.$e->getMessage());
	 	}
	}
?>
</body>
</html>