<?php 
	include_once "koneksi.php";

	$id_unit = isset($_POST["id_unit"]) ? $_POST["id_unit"] : "";
	$nopol = isset($_POST["nopol"]) ? $_POST["nopol"] : "";
	$tipe_kendaraan = isset($_POST["tipe_kendaraan"]) ? $_POST["tipe_kendaraan"] : "";
	$merk = isset($_POST["merk"]) ? $_POST["merk"] : "";
	$jenis_kendaraan = isset($_POST["jenis_kendaraan"]) ? $_POST["jenis_kendaraan"] : "";
	$warna = isset($_POST["warna"]) ? $_POST["warna"] : "";
	$thn_kendaraan = isset($_POST["thn_kendaraan"]) ? $_POST["thn_kendaraan"] : "";
	$no_rangka = isset($_POST["no_rangka"]) ? $_POST["no_rangka"] : "";
	$no_mesin = isset($_POST["no_mesin"]) ? $_POST["no_mesin"] : "";
	$kondisi = isset($_POST["kondisi"]) ? $_POST["kondisi"] : "";	
	$button = isset($_POST["simpan"]) ? $_POST["simpan"] : "";
 
	if ($button == "simpan") {
	$sql = mysqli_query($koneksi, "INSERT INTO unit (merk, tipe_kendaraan, nopol, jenis_kendaraan, warna, thn_kendaraan,
								   no_rangka, no_mesin, kondisi) 
								   VALUES ('$merk', '$tipe_kendaraan', '$nopol', '$jenis_kendaraan', '$warna', '$thn_kendaraan',
										   '$no_rangka', '$no_mesin', '$kondisi') ");
	
	header("location:../index.php?page=view_unit"); 
	}
	else if ($button == "Ubah"){
	$sql = mysqli_query($koneksi, "UPDATE unit SET nopol='$nopol', tipe_kendaraan='$tipe_kendaraan', merk='$merk', 
													   jenis_kendaraan='$jenis_kendaraan', warna='$warna', thn_kendaraan='$thn_kendaraan', no_rangka='$no_rangka', no_mesin='$no_mesin', kondisi='$kondisi' WHERE id_unit='$id_unit' ");
	
	header("location:../index.php?page=view_unit");
	}
 ?>