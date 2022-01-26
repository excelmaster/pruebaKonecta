<?php
	include dirname(__file__,2).'/models/users.php';
	include dirname(__file__,2).'/models/SendEmail.php';

	$users=new Users();
	$sendMail=new SendEmail();

	//Request: creacion de nuevo usuario
	if(isset($_POST['create']))
	{
		if($users->newUser($_POST)){
			header('location: ../index.php?page=new&success=true&folder='.$_GET['folder']);
		}else{
			header('location: ../index.php?page=new&error=true&folder='.$_GET['folder']);
		}
	}
?>