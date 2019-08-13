<?php 
	include_once "koneksi.php";

	$nik = isset($_POST["nik"]) ? $_POST["nik"] : "";
	$nama_kolektor = isset($_POST["nama_kolektor"]) ? $_POST["nama_kolektor"] : "";
	$alamat = isset($_POST["alamat"]) ? $_POST["alamat"] : "";
	$no_hp = isset($_POST["no_hp"]) ? $_POST["no_hp"] : "";
	$username = isset($_POST["username"]) ? $_POST["username"] : "";
	$password = md5($_POST["password"]);
	$button = isset($_POST["simpan"]) ? $_POST["simpan"] : "";
 
	if ($button == "simpan") {
	$sql = mysqli_query($koneksi, "INSERT INTO kolektor (nik, nama, alamat, no_hp, username, password) 
								   VALUES ('$nik','$nama_kolektor', '$alamat', '$no_hp', '$username', '$password') ");
	
	header("location:../index.php?page=view_kolektor"); 
	}elseif ($button == "edit"){
	$sql = mysqli_query($koneksi, "UPDATE kolektor SET nama='$nama_kolektor', alamat='$alamat', no_hp='$no_hp', username='$username', 
								   password='$password' WHERE nik='$nik' ");

	header("location:../index.php?page=view_kolektor");
	}
 ?>