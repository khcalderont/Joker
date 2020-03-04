<?php 
	require('joker.php');
?>

<?php
	try{
		$sql="DELETE FROM usuarios WHERE id_usuario=".$_REQUEST['eliminar'].";";
		$resultado=$base->prepare($sql);
		$resultado->execute(array());
		?>
		<script language="javascript">window.alert("El usuaio se ha elimido de la BD!!!"); window.location="consulta_usuarios.php"</script>
		<?php
	}catch(Exeption $e){
			die('Error: '.$e->getMessage());
	}	
 ?>
