<?php
	include dirname(__file__,2).'/model/Product_model.php';

	$productos=new Product();

	//Request: creacion de nuevo usuario
	if(isset($_POST['create']))
	{
		if($productos->newProduct($_POST)){
			header('location: ../index.php?page=nuevo&success=true&folder='.$_GET['folder']);
		}else{
			header('location: ../index.php?page=nuevo&error=true&folder='.$_GET['folder']);
		}
	}

	//Request: editar usuario
	if(isset($_POST['edit']))
	{
		if($productos->setEditProduct($_POST)){
			header('location: ../index.php?page=editar&id='.$_POST['id'].'&success=true&folder='.$_GET['folder']);
		}else{
			header('location: ../index.php?page=editar&id='.$_POST['id'].'&error=true&folder='.$_GET['folder']);
		}
	}
?>