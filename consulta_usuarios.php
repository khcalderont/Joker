<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta charset="iso-8859-1">
	<?php
	require('joker.php');
	?>
	<title>Conuslta de Usuarios</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
	<img src="img/joker.png" width="15%" id="logo">
		
	<center>
	 	<table id="tabla">
	 		<tr>
	 			<img src="img/titulo.png" width="30%" id="titulo">
	 		</tr>
		<tr>
			<td colspan="10" align="center"><h1>..::USUARIOS REGISTRADOS::..</h1></td>
		</tr>
		<tr>
			<td align="center" width="75"><strong>Identificación</strong> </td>
			<td align="center" width="75"><strong>Nombres</strong></td>
			<td align="center" width="195"><strong>Apellidos</strong></td>
			<td align="center" width="75"><strong>Edad</strong></td>
			<td align="center" width="75"><strong>Teléfono</strong></td>
			<td align="center" width="75"><strong>Nacionalidad</strong></td>
			<td align="center" width="75"><strong>E-mail</strong></td>
			<td align="center" width="75"><strong>Sexo</strong></td>
			<td align="center"><strong>Modificar</strong></td>
			<td align="center"><strong>Eliminar</strong></td>
		</tr>
		<?php 
			try{
				$sql="SELECT * FROM usuarios";
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
		<td><?php echo $consulta['Identificacion']; ?></td>
		<td><?php echo $consulta['Nombre_usuario']; ?></td>
		<td><?php echo $consulta['Apellido_usuario']; ?></td>
		<td align="center"><?php echo $consulta['Edad']; ?></td>
		<td width="50px"><?php echo $consulta['Telefono']; ?></td>
		<td align="center"><?php echo $consulta['fk_nacionalidad']; ?></td>
		<td><?php echo $consulta['Email']; ?></td>
		<td><?php echo $consulta['Sexo']; ?></td>
		<td><a href="act_usuarios.php?cod=<?php echo $consulta['id_usuario']?>"><img src="img/editar.png" width="25" class="iconos"></a></td>
		<td><a href="confirmusu.php?codigo=<?php echo $consulta['id_usuario']?>"><img src="img/eliminar.png" width="25" class="iconos"></a></td></tr>
		<?php 
				}
			}catch(Exeption $e){
			die('Error: '.$e->getMessage());
	 		}
		 ?>
	</table>
</body>
</html>