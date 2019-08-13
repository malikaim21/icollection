 <!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>INDOMOBIL GROUP</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="resources/css/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="resources/css/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="resources/css/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="resources/css/bower_components/select2/dist/css/select2.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="resources/css/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="resources/css/dist/css/AdminLTE.min.css">
 
  <link rel="stylesheet" href="resources/css/dist/css/skins/skin-blue.min.css">
  <script src="resources/css/bower_components/jquery/dist/jquery.min.js" ></script>
</head>



  <header class=" main-header">

    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <?php 
      if ($id_admin) {
          echo "<span class='logo-lg'><b>Admin</b>IMFI</span>";
      }elseif($nik){
        echo "<span class='logo-lg'><b>COLL</b>IMFI</span>";
      }

       ?>
      
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="resources/css/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">
                
                <?php
                if ($id_admin) {
                 echo $nama; 
                }
                elseif ($nik) {
                 echo $nik." - ".$nama;
                }
                ?>

                </span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="resources/css/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php
                if ($id_admin) {
                 echo $nama; 
                }
                elseif ($nik) {
                 echo $nik." - ".$nama;
                }
                ?>
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
            
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <?php 
                  if ($id_admin) {
                      echo "<a href='?page=change_pass' class='btn btn-default btn-flat'>Change Passwords</a>";
                  }
                  elseif($nik){
                      // echo "<a href='?page=change_pass_kolektor' class='btn btn-default btn-flat'>Change Passwords</a>";
                  }
                   ?>
                  
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>