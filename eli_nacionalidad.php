<?php 
	require('joker.php');
?>

<?php
	try{
		$sql="DELETE FROM nacionalidad WHERE id_nacionalidad=".$_REQUEST['eliminar'].";";
		$resultado=$base->prepare($sql);
		$resultado->execute(array());
		?>
		<script language="javascript">window.alert("La nacionalidad se ha eliminado de la BD!!!"); window.location="consulta_nacionalidades.php"</script>
		<?php
	}catch(Exeption $e){
			die('Error: '.$e->getMessage());
	}	
 ?>
