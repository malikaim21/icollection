<?php 
	include_once "koneksi.php";

	$nik=$_POST['nik'];
	$angsuran=$_POST['angsuran'];
	// var_dump($_POST);die;

	foreach($angsuran as $a){
		//$no=0;
		$file="INSERT INTO daftar_tagihan (id_angsuran, nik) VALUES ( $a ,$nik )";
		// $no++;
		// var_dump($file);die;
		$query=mysqli_query($koneksi,$file);	
	}
	header("location:../index.php?page=input_tagihan");
 ?>