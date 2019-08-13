<style>
@media print {
    footer{
        display: none !important;
    }
}</style>

<body onload="window.print()" >
<div class="container-fluid" style="margin-top:20px">  
        <div class="container-fluid">
        <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-10">
        	<div class="jumbotron">
      <div class="row">
<div style="margin-top: 30px; width:100%,height:50px;text-align:center;background:#d74b35;color:#fff;line-height:60px;font-size:20px;">
<b>PT. INDOMOBIL FINANCE INDONESIA</b>
<br>
<b><?php $date = date('d - m - Y | H:i:s'); echo $date;?></b>
<br>
<b>BUKTI PEMBAYARAN</b>
<br>
</div>
<?php
$id_tagihan = isset($_GET['id_tagihan']) ? $_GET['id_tagihan'] : "";
$angsuran_ke = isset($_GET['angsuran_ke']) ? $_GET['angsuran_ke'] : "";
$nominal_pembayaran = isset($_GET['nominal_pembayaran']) ? $_GET['nominal_pembayaran'] : "";
$denda = isset($_GET['denda']) ? $_GET['denda'] : "";

$sql = mysqli_query($koneksi,"SELECT * FROM  followup a LEFT JOIN daftar_tagihan b ON b.id_tagihan = a.id_tagihan LEFT JOIN angsuran c 
ON c.id_angsuran = b.id_angsuran LEFT JOIN konsumen d ON d.no_kontrak = c.no_kontrak LEFT JOIN unit e ON e.id_unit = c.id_unit
LEFT JOIN kolektor f ON f.nik = b.nik WHERE a.id_tagihan='$id_tagihan'");
$nota = mysqli_fetch_assoc($sql);

// $sql1 = mysqli_query($koneksi,"SELECT * FROM  kolektor");
// $kolektor = mysqli_fetch_assoc($sql1);
?>
<center><table style="margin-top: 30px;">
	<tr>
		<td><b>No. Kontrak</b></td>  	
		<td>: <b><?php echo $nota['no_kontrak']; ?></b></td>
	</tr>

	<tr>
		<td><b>Nama</b></td>			
		<td>: <b><?php echo $nota['nama_konsumen']; ?></b></td>
	</tr>

	<tr>
		<td><b>No. Polisi</b></td>  	
		<td>: <b><?php echo $nota['nopol']; ?></b></td>
	</tr>
	
	<tr>
		<td><b>Produk</b></td>  	
		<td>: <b><?php echo $nota['jenis_kendaraan']; ?></b></td>
	</tr>

	<tr>
		<td><b>Angsuran-ke</b></td>				
		<td>: <b><?php echo $angsuran_ke; ?></b></td>
	</tr>

	<tr>
		<td>-----------------------------------------------------------------------------------------------------------------------------</td>
		<td>----------------------------------------------------------------------------------</td>
	</tr>

	<tr>
		<td><b>Nominal Pembayaran</b></td>  	
		<td>: <b><?php echo rupiah($nominal_pembayaran); ?></b></td>
	</tr>

	<tr>
		<td><b>Nilai Denda</b></td>  			
		<td>: <b><?php echo rupiah($denda);?></b></td>
	</tr>

	<tr>
		<td><b>Total Bayar</b></td> 		 	
		<td>: <b><?php echo rupiah(((int)$nominal_pembayaran+(int)$denda));?></b></td>
	</tr>

	<tr>
		<td><b>Tanggal Bayar</b></td> 		 	
		<td>: <b><?php echo $date;?></b></td>
	</tr>

	<tr>
		<td><b>Kolektor</b></td> 		 	
		<td>: <b><?php echo $nota['nama'];?></b></td>
	</tr>

	<tr>
		<td colspan="2" style="text-align:right;"><img src='resources/css/dist/img/Tanda_Tangan_Dahlan_Iskan.png' height="100"/></td>
	</tr>

	<tr>
		<td colspan="2" style="text-align:right;"><b>TTD</td></b>
	</tr>

	<tr>
		<td>-----------------------------------------------------------------------------------------------------------------------------</td>
		<td>----------------------------------------------------------------------------------</td>
	</tr>

	<tr>
		<td colspan="2"><b><center>Harap Tanda Bukti Ini Disimpan Sebagai Bukti Pembayaran Angsuran Yang SAH</center></b></td>
	</tr>
	
	<tr>
		<td colspan="2"><b><center>Terimakasih</center></b></td>
	</tr>
</table></center>

</div>
</div>
</div>
</div>
</div>
</body>
	<script type="text/javascript">
        window.onafterprint = function(event) {
  		window.location.href = '?page=list_tagihan'
		};
    </script>