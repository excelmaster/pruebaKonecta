<?php
	define('HOMEDIR',__DIR__);

	include 'views/base_header.php';
	$page   =isset($_GET['page'])?$_GET['page']:'listado';
	$folder =isset($_GET['folder'])?$_GET['folder']:'productos';;
	if(isset($_POST['btnSearch'])){
		$search     =true;
		$dataSearch =$_POST['dataSearch'];
	}

	include 'views/'.$folder.'/'.$page.'.php';
	include 'views/base_footer.php';
