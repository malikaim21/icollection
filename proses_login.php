<?php 
	
	include_once "proses/koneksi.php";

	$username = isset($_POST['username']) ? $_POST['username'] : "";
	$password = md5($_POST['password']) ;
	
	$queryadmin = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
	$rowadmin = mysqli_fetch_assoc($queryadmin);
	$queryuser = mysqli_query($koneksi, "SELECT * FROM kolektor WHERE username='$username' AND password='$password'");
	$rowuser = mysqli_fetch_assoc($queryuser);

	if($rowadmin['username']==$username) {
		session_start();
		$_SESSION['id_admin'] = $rowadmin['id_admin'];
		$_SESSION['nama'] = $rowadmin['nama'];
		$_SESSION['username'] = $rowadmin['username'];
		
		header("location:index.php");	
	}
	elseif($rowuser['username']==$username) {
		session_start();
		$_SESSION['nik'] = $rowuser['nik'];
		$_SESSION['nama'] = $rowuser['nama'];
		$_SESSION['username'] = $rowuser['username'];
		
		header("location:index.php");
	}
	else{
	  ?>
	  <script type="text/javascript">
	    alert ("Maaf Username Atau Password Anda Salah !")
	    window.location ="login.php";
	  </script>
  	<?php
	}

 ?>