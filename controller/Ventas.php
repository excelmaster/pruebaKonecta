<?php
	include dirname(__file__,2).'/model/Ventas_model.php';

	$ventas=new Ventas();

	//Request: creacion de nuevo usuario
	if(isset($_POST['create']))
	{
		if($ventas->newVenta($_POST)){
			header('location: ../index.php?page=nuevo&success=true&folder='.$_GET['folder']);
		}else{
			header('location: ../index.php?page=nuevo&error=true&folder='.$_GET['folder']);
		}
	}
	
?>