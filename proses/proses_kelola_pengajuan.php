<?php 
	include_once "koneksi.php";

	session_start();
	$id_admin=isset($_SESSION['id_admin'])?($_SESSION['id_admin']): false;
	$no_kontrak = isset($_POST["no_kontrak"]) ? $_POST["no_kontrak"] : "";
	$id_unit = isset($_POST["id_unit"]) ? $_POST["id_unit"] : "";
	$tenor = isset($_POST["tenor"]) ? $_POST["tenor"] : "";
	$nilai_angsuran = isset($_POST["nilai_angsuran"]) ? $_POST["nilai_angsuran"] : "";
	$tgl_jt_tempo = isset($_POST["tgl_jt_tempo"]) ? $_POST["tgl_jt_tempo"] : "";
	$tgl_mulai_angsuran = isset($_POST["tgl_mulai_angsuran"]) ? date('Y-m-d H:i:s' , strtotime($_POST["tgl_mulai_angsuran"])) : "";
	
	$sql = mysqli_query($koneksi,"INSERT INTO angsuran (id_admin, no_kontrak, id_unit, tenor, nilai_angsuran, tgl_jt_tempo, tgl_mulai_angsuran) 
									VALUES ($id_admin, $no_kontrak, $id_unit,$tenor, $nilai_angsuran, $tgl_jt_tempo, '$tgl_mulai_angsuran')");
	
	if ($sql) {
	 
?>
		<script type="text/javascript">
			alert ("Data Berhasil Disimpan")
		</script>
		
		<?php

	header("location:../index.php?page=insert_pengajuan_kredit");
	}
		 ?>