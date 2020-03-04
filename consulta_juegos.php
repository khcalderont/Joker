<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta charset="iso-8859-1">
	<?php
	require('joker.php');
		?>
	<title>Conuslta de Juegos</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
	<img src="img/joker.png" width="15%" id="logo">
		
	<center>
	 	<table id="tabla" cellspacing="20" >
	 		<tr>
	 			<img src="img/titulo.png" width="30%" id="titulo">
	 		</tr>
		<tr>
			<td colspan="6" align="center"><h1>..::JUEGOS REGISTRADOS::..</h1></td>
		</tr>
		<tr>
			<td align="center" width="75"><strong>Nombre</strong> </td>
			<td align="center" width="75"><strong>Valor</strong></td>
			<td align="center" width="195"><strong>Descripción</strong></td>
			<td align="center" width="75"><strong>Clasificación</strong></td>
			<td align="center"><strong>Modificar</strong></td>
			<td align="center"><strong>Eliminar</strong></td>
		</tr>
		<?php 
			try{
				$sql="SELECT * FROM juegos";
				$resultado=$base->prepare($sql);
				$resultado->execute(array());
				while($consulta=$resultado->fetch(PDO::FETCH_ASSOC)){
		?>

	<tr>
		<td></td>
	</tr>
	<tr>
		<td></td>
	</tr>
	<tr>
		<td><?php echo $consulta['Nombre_juego']; ?></td>
		<td width="15%" align="center"><?php echo $consulta['Valor_mensualidad']; ?></td>
		<td width="40%" align="center"><?php echo $consulta['Descripcion']; ?></td>
		<td align="center"><?php echo $consulta['Clasificacion']; ?></td>
		<td><a href="act_juegos.php?cod=<?php echo $consulta['id_juego']?>"><img src="img/editar.png" width="25" class="iconos"></a></td>
		<td><a href="confirmacion.php?codigo=<?php echo $consulta['id_juego']?>"><img src="img/eliminar.png" width="25" class="iconos"></a></td></tr>
		<?php 
				}
			}catch(Exeption $e){
			die('Error: '.$e->getMessage());
	 		}
		 ?>
	</table>
</center>
</body>
</html>