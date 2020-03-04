<?php

try{
	$base = new PDO('mysql:host=localhost; dbname=joker', 'root', '');
	} catch(Exeption $e){
		die('Error: '.$e->getMessage());
	}

?>