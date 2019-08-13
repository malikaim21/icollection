  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="resources/css/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><i class="fa fa-circle text-success"></i> <?php echo $nama; ?></p>
          <!-- Status -->
          <a href="#"></a>
        </div>
      </div>


      <!-- Sidebar Menu -->

      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Main Menu</li>
        <!-- Optionally, you can add icons to the links -->
        <?php
        $page= isset($_GET['page']) ? $_GET['page'] : "";
        if ($id_admin) {
          ?>  
              <li <?php if ($page=="") {echo "class='active'";} ?>><a href='index.php'><i class='fa fa-dashboard'>
              </i> <span>Dasboard</span></a></li>
              <li <?php if ($page=="input_tagihan") {echo "class='active'";} ?>><a href='?page=input_tagihan'><i class='fa fa-keyboard-o'>
              </i> <span>Input Data Tagihan</span></a></li>
              <li <?=$page=="view_konsumen"?"class='active'":null;?>><a href='?page=view_konsumen'><i class='fa fa-book'></i> <span>Data Konsumen</span></a></li>
              <li <?=$page=="view_unit"?"class='active'":null;?>><a href='?page=view_unit'><i class='fa fa-database'></i> <span>Data Unit</span></a></li>
              <li <?=$page=="insert_pengajuan_kredit"?"class='active'":null;?>><a href='?page=insert_pengajuan_kredit'><i class='fa fa-keyboard-o'></i> <span>Input Data Angsuran</span></a></li>
              <!-- <li <?=$page=="history_pembayaran"?"class='active'":null;?>><a href='?page=history_pembayaran'><i class='fa fa-book'></i> <span>History Pembayaran</span></a></li> -->
              <!-- <li <?=$page=="view_hasil"?"class='active'":null;?>><a href='?page=view_hasil'><i class='fa fa-eye'></i> <span>Hasil Kerja Kolektor</span></a></li> -->
              <li <?=$page=="view_kolektor"?"class='active'":null;?>><a href='?page=view_kolektor'><i class='fa fa-list'></i> <span>Data Staff Kolektor</span></a></li>
          <?php
          }elseif($nik){
            ?>
            <li <?=$page=="list_tagihan"?"class='active'":null;?>><a href='?page=list_tagihan'><i class='fa fa-keyboard-o'></i> <span>List Data Tagihan</span></a></li>
            <li <?=$page=="change_pass_kolektor"?"class='active'":null;?>><a href='?page=change_pass_kolektor'><i class='fa fa-lock'></i> <span>Ubah Password</span></a></li>
            <!-- <li><a href='#'><i class='fa fa-close'></i> <span>Close Day</span></a></li> -->
            <?php
          }else{
            
          }?>
        
        ?>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>




   <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                    <span class="label label-danger pull-right">70%</span>
                  </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>