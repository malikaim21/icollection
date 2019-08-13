<?php 
	include_once "koneksi.php";

	$no_kontrak = isset($_POST["no_kontrak"]) ? $_POST["no_kontrak"] : "";
	$nama_konsumen = isset($_POST["nama_konsumen"]) ? $_POST["nama_konsumen"] : "";
	$alamat = isset($_POST["alamat"]) ? $_POST["alamat"] : "";
	$kelurahan = isset($_POST["kelurahan"]) ? $_POST["kelurahan"] : "";
	$kecamatan = isset($_POST["kecamatan"]) ? $_POST["kecamatan"] : "";
	$no_tlp = isset($_POST["no_tlp"]) ? $_POST["no_tlp"] : "";
	$button = isset($_POST["simpan"]) ? $_POST["simpan"] : "";
 
	if ($button == "simpan") {
	$sql = mysqli_query($koneksi, "INSERT INTO konsumen (no_kontrak, nama_konsumen, kelurahan, kecamatan, alamat, no_tlp) 
								   VALUES ('$no_kontrak','$nama_konsumen','$kelurahan', '$kecamatan', '$alamat', '$no_tlp') ");
	
	header("location:../index.php?page=view_konsumen"); 
	}
	elseif ($button == "ubah"){
	$sql = mysqli_query($koneksi, "UPDATE konsumen SET nama_konsumen='$nama_konsumen', alamat='$alamat', kelurahan='$kelurahan', 
													   kecamatan='$kecamatan', no_tlp='$no_tlp' WHERE no_kontrak='$no_kontrak' ");

	header("location:../index.php?page=view_konsumen");
	}
 ?>