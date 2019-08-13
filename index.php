<?php 

	setlocale(LC_TIME, 'id_ID');
	date_default_timezone_set("Asia/Bangkok");
	session_start();
	include_once ("proses/koneksi.php");
	include_once ("proses/helper.php");

	$id_admin=isset($_SESSION['id_admin'])?($_SESSION['id_admin']): false;
	$nama=isset($_SESSION['nama'])?($_SESSION['nama']): false;
	$nik=isset($_SESSION['nik'])?($_SESSION['nik']): false;	
	// $username=isset($_SESSION['username'])?($_SESSION['username']): false;

	if (isset($_SESSION['id_admin'])OR($_SESSION['nik'])) {
		
		include_once "resources/header.php";
	    include_once "resources/sidebar.php";
	    include_once "resources/body.php";
	    include_once "resources/footer.php";

	}
	else{
		header("location:login.php"); 
 	}
?> 
	