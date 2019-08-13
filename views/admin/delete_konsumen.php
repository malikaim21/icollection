<?php 

	$no_kontrak = $_GET['no_kontrak'];

	$sql = mysqli_query($koneksi, "DELETE FROM konsumen WHERE no_kontrak='$no_kontrak'");

 ?>

 <script type="text/javascript">
  window.location ="?page=view_konsumen";
  </script>
