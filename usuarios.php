<!DOCTYPE html>
<html>
<head>
	<title>Registro de Usuarios</title>
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
	 			<td colspan="2"><h1><strong>..::REGISTRO DE USUARIOS::..</strong></h1></td>
	 		</tr>
	 		<tr>
	 			<td>Nombres:</td>
	 			<td><input type="text" name="nomusu" placeholder="Ingrese su nombre" required=""></td>
	 		</tr>
	 		<tr>
	 			<td>Apellidos:</td>
	 			<td><input type="text" name="apusu" placeholder="Ingrese su apellido" required=""></td>
	 		</tr>
	 		<tr>
	 			<td>N° Identificación:</td>
	 			<td><input type="text" name="ident" placeholder="Ingrese su núnero de identificación" required=""></td>
	 		</tr>
	 		<tr>
	 			<td>Edad:</td>
	 			<td><input type="number" name="edad" placeholder="Ingrese su edad" required=""></td>
	 		</tr>
	 		<tr>
	 			<td>Teléfono:</td>
	 			<td><input type="text" name="tel" placeholder="Ingrese su número de teléfono" required=""></td>
	 		</tr>
	 		<tr>
	 			<td>Email:</td>
	 			<td><input type="email" name="email" placeholder="Ingrese su correo electrónico" required=""></td>
	 		</tr>
	 		<tr>
	 			<td>Sexo:</td>
	 			<td><input type="text" name="sexo" placeholder="Escribe el sexo" required=""></td>
	 		</tr>
	 		<tr>
	 			<td>Nacionalidad:</td>
	 			<td><select name="select" required="">
	 				<option>Seleccionar país...</option>
	 				<?php
	 				try{
	 					$sql1="SELECT * FROM nacionalidad";
	 					$result=$base->prepare($sql1);
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
	 			<td colspan="2"><input id="boton" type="submit" name="btn" value="REGISTRAR"></td>
	 		</tr>
	 	</table>
	 </form>
	 </center>
	 <?php

	 if(isset($_POST['btn'])){

	 	$nombre=$_POST['nomusu'];
	 	$apellido=$_POST['apusu'];
	 	$identificación=$_POST['ident'];
	 	$edad=$_POST['edad'];
	 	$telefono=$_POST['tel'];
	 	$email=$_POST['email'];
	 	$sexo=$_POST['sexo'];
	 	$nacionalidad=$_POST['select'];

	 	try{
	 		$sql="INSERT INTO usuarios(`id_usuario`, `Nombre_usuario`, `Apellido_usuario`, `Identificacion`, `Edad`, `Telefono`, `Email`, `Sexo`, `fk_nacionalidad`)
	 		values('', :nom, :ape, :iden, :edad, :tel, :email, :sexo, :nac)";

	 		$resultado=$base->prepare($sql);//Con esto se prepara la ejecución de mi sentencia

	 		$resultado->execute(array(":nom"=>$nombre, ":ape"=>$apellido, ":iden"=>$identificación, ":edad"=>$edad, ":tel"=>$telefono, ":email"=>$email, ":sexo"=>$sexo, ":nac"=>$nacionalidad)); //Ejecución de la sentencia SQL
	 	?>
		<script language="javascript"> window.alert("Registro de usuario exitoso !!")</script>

<?php
		} catch(Exeption $e){
			die('Error: '.$e->getMessage());
	 	}
	}

?>
</body>
</html>