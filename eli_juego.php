<?php 
	require('joker.php');
?>

<?php
	try{
		$sql="DELETE FROM juegos WHERE id_juego=".$_REQUEST['eliminar'].";";
		$resultado=$base->prepare($sql);
		$resultado->execute(array());
		?>
		<script language="javascript">window.alert("El juego se ha elimido de la BD!!!"); window.location="consulta_juegos.php"</script>
		<?php
	}catch(Exeption $e){
			die('Error: '.$e->getMessage());
	}	
 ?>
