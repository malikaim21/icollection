<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <?php   
        if ($page=="input_tagihan") {echo "Input Tagihan";}
        else if ($page=="view_konsumen") {echo "Data Konsumen";}
        else if ($page=="view_unit") {echo "Data Unit";}
        else if ($page=="insert_pengajuan_kredit") {echo "Input Angsuran";}
        else if ($page=="history_pembayaran") {echo "Histori Pembayaran Konsumen";}
        else if ($page=="view_kolektor") {echo "Data Staff Kolektor";}
        else if ($page=="list_tagihan") {echo "Daftar Tagihan Harian";}
        else if ($page=="change_pass_kolektor") {echo "Ubah Password Kolektor";}
        else {echo "Dashboard <small>Optional description</small>";}
        ?> 
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
    <?php 
        $page = isset($_GET['page']) ? $_GET['page'] : "";
        $action = isset($_GET['action']) ? $_GET['action'] : ""; 
        $anu = isset($_GET['anu']) ? $_GET['anu'] : 1;   
          if ($page=="") {
            if ($id_admin) {
              include "views/admin/dashboard.php";
            }
            elseif ($nik) {
              echo "<center><img src='resources/css/dist/img/i-coll.png'/><br>
              <h3>I-COLL V 1.0</h3></center>";
            }
        } elseif ($page == "view_kolektor") {
            if ($action == "") {
              include "views/admin/view_kolektor.php";
            }
            if ($action == "insert") {
              include "views/admin/insert_kolektor.php";            
            }
            if ($action == "edit") {
              include "views/admin/update_kolektor.php";            
            } 
            if ($action == "delete") {
              include "views/admin/delete_kolektor.php";
            }         
        } elseif ($page == "change_pass") {
          if ($action == "") {
          include "views/admin/change_pass.php";
          }
          if ($action == "alert") {
            include "views/admin/change_pass.php";
          }
        } elseif ($page == "change_pass_kolektor") {
          if ($action == "") {
            include "views/kolektor/change_pass_kolektor.php";
          }
          if ($action == "alert") {
            include "views/kolektor/change_pass_kolektor.php";
          }
        } elseif ($page == "input_tagihan") {
            if ($action == "") {
            include "views/admin/input_tagihan.php";
            } if ($action == "history") {
              include "views/kolektor/history.php";            
            }
        } elseif ($page == "list_tagihan") {
            if ($action == "") {
            include "views/kolektor/list_tagihan.php";
            } if ($action == "detail") {
            include "views/kolektor/detail_tagihan.php";            
            } if ($action == "followup") {
            include "views/kolektor/followup.php";            
            } if ($action == "history") {
              include "views/kolektor/history.php";            
            } if ($action == 'nota') {
              include "views/kolektor/nota.php";
            } if ($action == 'report') {
              include "views/kolektor/report.php";
            }
        } elseif ($page == "view_konsumen") {
           if ($action == "") {
            include "views/admin/view_konsumen.php";
            }
            if ($action == "insert") {
              include "views/admin/insert_konsumen.php";            
            }
            if ($action == "edit") {
              include "views/admin/update_konsumen.php";            
            } 
            if ($action == "delete") {
              include "views/admin/delete_konsumen.php";
            }         
        } elseif ($page == "view_unit") {
            if ($action == "") {
            include "views/admin/view_unit.php";
            }
            if ($action == "insert") {
              include "views/admin/insert_unit.php";            
            }
            if ($action == "edit") {
              include "views/admin/update_unit.php";            
            } 
            if ($action == "delete") {
              include "views/admin/delete_unit.php";
            }         
        } elseif ($page == "insert_pengajuan_kredit") {
            include "views/admin/insert_pengajuan_kredit.php";
        } elseif ($page == "view_hasil") {
            if ($action == "") {
            include "views/admin/view_hasil.php";
            }
            if ($action == "detail_result") {
            include "views/admin/detail_result.php";
            }
        }
     ?>
      
    </section>
    <!-- /.content -->
  </div>
