<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta charset="iso-8859-1">
<?php
	require('joker.php');
?>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<title>Actualización de Usuarios</title>
</head>
<body>
	<img src="img/joker.png" width="15%" id="logo">
		<?php 

		try{
			$sql1="SELECT * FROM usuarios WHERE id_usuario=".$_REQUEST['cod'].";";
			$resultado1=$base->prepare($sql1);
			$resultado1->execute(array());
			while ($consulta1=$resultado1->fetch(PDO::FETCH_ASSOC)) { 
		?>

		<form method="POST" action="act_usuarios.php?cod=<?php echo $_REQUEST["cod"]; ?>">

			<center>
		 	<table>
		 		<tr>
		 			<img src="img/titulo.png" width="30%" id="titulo">
		 		</tr>
		 		<tr>
		 			<td colspan="2"><h1><strong>ACTUALIZACIÓN DE USUARIOS..!!</strong></h1></td>
		 		</tr>
		 		<tr>
		 			<td>Identificación:</td>
		 			<td><input type="text" name="ident" required="" value="<?php echo $consulta1['Identificacion'];?>"></td>
		 		</tr>
		 		<tr>
		 			<td>Nombres:</td>
		 			<td><input type="text" name="nomus" required="" value="<?php echo $consulta1['Nombre_usuario'];?>"></td>
		 		</tr>
		 		<tr>
		 			<td>Apellidos:</td>
		 			<td><input type="text" name="apeus" required="" value="<?php echo $consulta1['Apellido_usuario'];?>"></td>
		 		</tr>
		 		<tr>
		 			<td>Edad:</td>
		 			<td><input type="text" name="edad" required="" value="<?php echo $consulta1['Edad'];?>"></td>
		 		</tr>
		 		<tr>
		 			<td>Teléfono:</td>
		 			<td><input type="txt" name="tel" required="" value="<?php echo $consulta1['Telefono'];?>"></td>
		 		</tr>
		 		<tr>
		 			<td>Nacionalidad:</td>
		 			<td><select name="nac" required="" value="<?php echo $consulta1['fk_nacionalidad'];?>">
		 				<option>Seleccionar país...</option>
		 				<?php
		 				try{
		 					$sql2="SELECT * FROM nacionalidad";
		 					$result=$base->prepare($sql2);
		 					$result->execute(array());
		 					while($consulta=$result->fetch(PDO::FETCH_ASSOC)){
		 				?>
		 					<option value="<?php echo $consulta['id_nacionalidad']; ?>"> <?php echo $consulta['Nombre_de_pais'] ?></option>
		 				<?php
		 					}
		 				}
		 				catch(Exeption $e){
						die('Error: '.$e->getMessage());
		 				}
		 				?>
		 			</select></td>
		 		</tr>
		 		<tr>
		 			<td>E-mail:</td>
		 			<td><input type="text" name="email" required="" value="<?php echo $consulta1['Email'];?>"></td>
		 		</tr>
		 		<tr>
		 			<td>Sexo:</td>
		 			<td><input type="text" name="sexo" required="" value="<?php echo $consulta1['Sexo'];?>"></td>
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
			$ident=$_POST['ident'];
			$nomus=$_POST['nomus'];
			$apeus=$_POST['apeus'];
			$edad=$_POST['edad'];
			$tel=$_POST['tel'];
			$email=$_POST['email'];
			$sexo=$_POST['sexo'];
			$nac=$_POST['nac'];

			$sql="UPDATE usuarios SET `Nombre_usuario`=:nom,`Apellido_usuario`=:ape,`Identificacion`=:iden,`Edad`=:edad,`Telefono`=:tel,`Email`=:email,`Sexo`=:sexo,`fk_nacionalidad`=:nac WHERE id_usuario=".$_REQUEST["cod"].";";
			$resultado=$base->prepare($sql);//Con esto se prepara la ejecución de mi sentencia

		 	$resultado->execute(array(":nom"=>$nomus, ":ape"=>$apeus, ":iden"=>$ident, ":edad"=>$edad, ":tel"=>$tel, ":email"=>$email, ":sexo"=>$sexo, ":nac"=>$nac));//Ejecución de la sentencia SQL
			?>
			<script language="javascript"> window.alert("Actualización de usuario exitoso !!"); window.location="consulta_usuarios.php"</script>

			<?php
			} catch(Exeption $e){
				die('Error: '.$e->getMessage());
		 	}
		}

			?>
</body>
</html>