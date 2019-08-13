<?php 

	$id_unit = $_GET['id_unit'];

	$sql = mysqli_query($koneksi, "DELETE FROM unit WHERE id_unit='$id_unit'");

 ?>

 <script type="text/javascript">
  window.location ="?page=view_unit";
  </script>
