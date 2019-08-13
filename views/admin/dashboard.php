<?php 
    $result=mysqli_query($koneksi, "SELECT count(*) as total from konsumen");
    $data=mysqli_fetch_assoc($result);

    $result1=mysqli_query($koneksi, "SELECT count(*) as total from unit");
    $data1=mysqli_fetch_assoc($result1);

    $result2=mysqli_query($koneksi, "SELECT count(*) as total from kolektor");
    $data2=mysqli_fetch_assoc($result2);
    // echo $data['total'];
 ?>
<section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?=$data['total']?></h3>

              <p>Total Data Konsumen</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="?page=view_konsumen" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?=$data1['total']?><sup style="font-size: 20px"></sup></h3>

              <p>Total Data Unit</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="?page=view_unit" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?=$data2['total']?></h3>

              <p>Jumlah Staff Kolektor</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="?page=view_kolektor" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?=$data1['total']?></h3>

              <p>Total Data Tagihan</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="?page=input_tagihan" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      <!-- </div> -->
    </section>
    <!-- /.content -->