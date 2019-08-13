<?php 
  
  session_start();
  include_once "koneksi.php";

  $old= md5($_POST['old']);
  $new= md5($_POST['new']);
  $re_new= md5($_POST['re_new']);
  $id_admin=isset($_SESSION['id_admin'])?($_SESSION['id_admin']): "";
  
  $query = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_admin='$id_admin'" );
  $row = mysqli_fetch_assoc($query);    
  
  // var_dump("SELECT * FROM admin WHERE user_id='$user_id'");
  // die();
  
  if ($old != $row['password']) {
    header("location:../index.php?page=change_pass&action=alert&notif=PassOldWrong");
   }elseif ($new==$old){
     header("location:../index.php?page=change_pass&action=alert&notif=PassNewWrong");
   }elseif($re_new!=$new){
     header("location:../index.php?page=change_pass&action=alert&notif=PassRenewWrong");
  }else{
  mysqli_query($koneksi, "UPDATE admin SET password='$new' WHERE id_admin='$id_admin'");  
  ?>
  <script type="text/javascript">
    alert ("Data Berhasil Disimpan")
    window.location ="../index.php";
  </script>
  <?php
  }
  // header("location:../index.php");



 ?>