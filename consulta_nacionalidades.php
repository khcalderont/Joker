<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta charset="iso-8859-1">
	<?php
	require('joker.php');
	?>
	<title>Conuslta de Nacionalidades</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
	<img src="img/joker.png" width="15%" id="logo">		
	<center>
	 	<table id="tabla" cellspacing="20">
	 		<tr>
	 			<img src="img/titulo.png" width="30%" id="titulo">
	 		</tr>
		<tr>
			<td colspan="3" align="center"><h1>..::NACIONALIDADES REGISTRADOS::..</h1></td>
		</tr>
		<tr>
			<td align="center" width="75"><strong>Nombre de País</strong></td>
			<td align="center" width="5"><strong>Modificar</strong></td>
			<td align="center" width="10"><strong>Eliminar</strong></td>
		</tr>
		<?php 
			try{
				$sql="SELECT * FROM nacionalidad";
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
		<td align="center"><?php echo $consulta['Nombre_de_pais']; ?></td>

		<td><a href="act_nacionalidades.php?cod=<?php echo $consulta['id_nacionalidad']?>"><img src="img/editar.png" width="25" class="iconos"></a></td>
		<td><a href="confirmnac.php?codigo=<?php echo $consulta['id_nacionalidad']?>"><img src="img/eliminar.png" width="25" class="iconos"></a></td></tr>
		<?php 
				}
			}catch(Exeption $e){
			die('Error: '.$e->getMessage());
	 		}
		 ?>
	</table>
</body>
</html>