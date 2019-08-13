<?php 
  
  session_start();
  include_once "koneksi.php";

  $old= md5($_POST['old']);
  $new= md5($_POST['new']);
  $re_new= md5($_POST['re_new']);
  $nik=isset($_SESSION['nik'])?($_SESSION['nik']): "";
  
  $query = mysqli_query($koneksi, "SELECT * FROM kolektor WHERE nik='$nik'" );
  $row = mysqli_fetch_assoc($query);    
  
  // var_dump("SELECT * FROM admin WHERE user_id='$user_id'");
  // die();
  
  if ($old != $row['password']) {
   header("location:../index.php?page=change_pass_kolektor&action=alert&notif=PassOldWrong");
  }elseif ($new==$old){
    header("location:../index.php?page=change_pass_kolektor&action=alert&notif=PassNewWrong");
  }elseif($re_new!=$new){
    header("location:../index.php?page=change_pass_kolektor&action=alert&notif=PassRenewWrong");
  }else{
  mysqli_query($koneksi, "UPDATE kolektor SET password='$new' WHERE nik='$nik'");  
  ?>
  <script type="text/javascript">
    alert ("Data Berhasil Disimpan")
    window.location ="../index.php";
  </script>
  <?php
  // header("location:../index.php");
  }



 ?>