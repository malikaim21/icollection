<?php 

	$nik = $_GET['nik'];

	$sql = mysqli_query($koneksi, "DELETE FROM kolektor WHERE nik='$nik'");

 ?>

 <script type="text/javascript">
  window.location ="?page=view_kolektor";
  </script>
