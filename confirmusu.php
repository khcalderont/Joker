<?php 

	require('joker.php');
?>

<?php
	try{
		$sql="SELECT * FROM usuarios WHERE id_usuario =".$_REQUEST['codigo'].";";
		$resultado=$base->prepare($sql);
		$resultado->execute(array());
		while($consulta=$resultado->fetch(PDO::FETCH_ASSOC)){
			echo "Está seguro de que desea eliminar de la Base de Datos el usuario: ".$consulta['Nombre_usuario'];
			}
		}catch(Exeption $e){
			die('Error: '.$e->getMessage());
		?>

		

		<?php

		}catch(Exeption $e){
			die('Error: '.$e->getMessage());
	}
?>
<table width="50">
	<tr>
		<td>
		<a href="eli_usuario.php?eliminar= <?php echo $_REQUEST['codigo'] ?>"><img src="img/confirm.png" width="25"></a>
		</td>
		<td>
			<a href="javascript:history.go(-1)"><img src="img/error.png" width="25"></a>
		</td>
	</tr>
</table>