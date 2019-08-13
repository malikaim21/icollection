    <?php 
    $cari_kecamatan = '';
    $cari = '';
    $cari_kelurahan = '';
 
        if(isset($_GET['filter'])){
        $cari = isset($_GET['cari']) ? $_GET['cari'] : '';
        $cari_kelurahan = isset($_GET['cari_kelurahan']) ? $_GET['cari_kelurahan'] : '';
        $cari_kecamatan = isset($_GET['cari_kecamatan']) ? $_GET['cari_kecamatan'] : '';
        // echo "<b>Hasil pencarian : ".$cari."</b>";
        }
    ?>
    <!-- awal box search -->
    <div class="box box-warning box-solid">
        <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-search"></i>Filter List</h3>
             
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
        </div>

        <div class="box-body">   
                <form>
                    <input type="hidden" name="page" value="input_tagihan">
                    
                    <div class="row">

                        <div class="col-md-3">
                            <div class="form-group">
                            <label>Nama Konsumen :</label>
                            <input class="form-control" name="cari" value="<?php echo $cari; ?>" >
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                            <label>Kelurahan :</label>
                            <input class="form-control" name="cari_kelurahan" value="<?php echo $cari_kelurahan; ?>" >
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                            <label>Kecamatan :</label>
                            <input class="form-control" name="cari_kecamatan" value="<?php echo $cari_kecamatan; ?>">
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-3">
                            <input type="submit" class="btn btn-primary" name="filter" value="Filter" />
        
                            <a href="?page=input_tagihan" class="btn btn-danger">Clear</a>
                        </div>

                    </div>

             </form>
            
        </div>
    </div>
    <!-- akhir box search -->


    <!-- awal box input tagihan -->
    <div class="box box-primary box-solid">
        <div class="box-header with-border">
              <h3 class="box-title"></i>Kirim Data</h3>
              <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
             </div>
        </div>
    <div class="box-body">
        <div class="row ">
            <div class="col-md-12">
                
                <form action="proses/proses_kelola_tagihan.php" method="POST">
                    <div class="form-group">
                        <label>NIK :</label>
                            <select class="form-control" name="nik">
                                <?php
                                    $query = mysqli_query($koneksi, "SELECT nik,nama FROM kolektor ORDER BY nama ASC" );
                                    while($data=mysqli_fetch_array($query)){
                                    echo "<option value='".$data['nik']."'>".$data['nik']." - ".$data['nama']."</option>";
                                    }
                                ?>
                            </select>
                    </div>
                    

                    <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Check</th>
                                            <th>No Kontrak</th>
                                            <th>Nama Konsumen</th>
                                            <th>Kelurahan</th>
                                            <th>Kecamatan</th>
                                            <th class="text-center">OVD</th>
                                            <th class="text-center">History Followup</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                    
                        <?php

                        $limit = 5; // Jumlah data per halamannya
                      
                        // Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
                        $limit_start = ($anu - 1) * $limit;

                        if(isset($_GET['filter'])){

                        $sql = mysqli_query($koneksi, "SELECT * FROM angsuran a LEFT JOIN konsumen b ON b.no_kontrak = a.no_kontrak 
                        LEFT JOIN unit c ON c.id_unit = a.id_unit WHERE a.id_angsuran NOT IN ( SELECT id_angsuran FROM 
                        daftar_tagihan d WHERE DATE(d.tgl_input) = CURDATE() ) AND b.kecamatan
                        LIKE '%".$cari_kecamatan."%'  AND b.nama_konsumen LIKE '%".$cari."%' 
                        AND b.kelurahan LIKE '%".$cari_kelurahan."%' ");
                        }
                        else{
                        $sql = mysqli_query($koneksi, "SELECT * FROM angsuran a LEFT JOIN konsumen b ON b.no_kontrak = a.no_kontrak 
                        LEFT JOIN unit c ON c.id_unit = a.id_unit WHERE a.id_angsuran NOT IN ( SELECT id_angsuran FROM 
                        daftar_tagihan d WHERE DATE(d.tgl_input) = CURDATE() ) LIMIT $limit_start, $limit "); 
                        } 
                       
                        $no=$limit_start + 1;
                        while($data1=mysqli_fetch_assoc($sql)){
                        
                        ?>
                    
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><input type='checkbox' name='angsuran[]' value='<?=$data1["id_angsuran"]?>'></td>
                            <td><?php echo $data1['no_kontrak']; ?></td>
                            <td><?php echo $data1['nama_konsumen'];?></td>
                            <td><?php echo $data1['kelurahan'];?></td>
                            <td><?php echo $data1['kecamatan'];?></td>
                            <td class="text-center">
                                <?php 
                                  $date1 = $data1['tgl_mulai_angsuran'];
                                  $date2 = date('Y-m-d');

                                  $ts1 = strtotime($date1);
                                  $ts2 = strtotime($date2);

                                  $year1 = date('Y', $ts1);
                                  $year2 = date('Y', $ts2);

                                  $month1 = date('m', $ts1);
                                  $month2 = date('m', $ts2);

                                  $day1 = date('d', $ts1);
                                  $day2 = date('d', $ts2);

                                  $number = cal_days_in_month(CAL_GREGORIAN, $month1, $year1);
                                  $ts  = ($ts2-$ts1) / (60 * 60 * 24) - $number;

                                  // echo "<pre>";

                                  $nomor = 1;
                                  $idAngsuran = $data1['id_angsuran'];
                                  $jmlTanggalDalamBulanTerbayar = 0;
                                  $sql1 = mysqli_query($koneksi, "SELECT * FROM pembayaran WHERE id_angsuran= $idAngsuran");
                                  foreach($sql1 as $ana) {

                                    $tgl_mulai = (string)$date1. " +" . (string)$nomor . " Month";
                                    // echo $string;
                                    $timeStamp = strtotime((string)$tgl_mulai );
                                    // $timeStamp = strtotime("2013-01-01  +1 Month");
                                    $number = cal_days_in_month(CAL_GREGORIAN, date('m', $timeStamp), date('y', $timeStamp) );
                                    $jmlTanggalDalamBulanTerbayar += $number;

                                    $nomor++;
                                  }
                                  if ($ts-$jmlTanggalDalamBulanTerbayar < 0) {
                                    echo "-";
                                  }else {
                                    echo $ts-$jmlTanggalDalamBulanTerbayar;
                                  }
                                ?>
                            </td>
                            <td>
                            <center>
                                <a href="index.php?page=input_tagihan&action=history&no_kontrak=<?php echo $data1 ['no_kontrak']; ?>&nama_konsumen=<?php echo $data1 ['nama_konsumen']; ?>" class="btn btn-info" >Cek History</a>
                            </center>
                            </td>
                        </tr>
                                    
                         <?php $no++; } ?>
                                    </tbody>
                            </table>
                        </div>
                        
                    <div>
                        <center><input type="submit" name="simpan"  value="kirim" class="btn btn-primary"></center>
                        <?php
                        if(isset($_POST['simpan'])){
                        ?>
                        <script type="text/javascript">
                            alert ("Data Berhasil Dikirim")
                        </script>
                        <?php
                        }
                        ?>
                    </div>
                  
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                      <ul class="pagination pagination-sm no-margin pull-right">
                        <!-- LINK FIRST AND PREV -->
                        <?php 
                        if($anu == 1){ 
                        ?>
                        <li class="disabled"><a href="#">First</a></li>
                        <li class="disabled"><a href="#">&laquo;</a></li>
                        <?php 
                        }else{
                        $link_prev = ($anu > 1)? $anu - 1 : 1;    
                        ?>
                        <li><a href="index.php?page=input_tagihan&anu=1">First</a></li>
                        <li><a href="index.php?page=input_tagihan&anu=<?php echo $link_prev; ?>">&laquo;</a></li>
                        <?php 
                        }
                        ?>

                        <!-- LINK NUMBER -->
                        <?php 
                        
                        $sql2 = mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah FROM angsuran a 
                        LEFT JOIN konsumen b ON b.no_kontrak = a.no_kontrak 
                        LEFT JOIN unit c ON c.id_unit = a.id_unit WHERE a.id_angsuran NOT IN ( SELECT id_angsuran FROM 
                        daftar_tagihan d WHERE DATE(d.tgl_input) = CURDATE() ) ");
                        $get_jumlah = mysqli_fetch_assoc($sql2);

                        $jumlah_page = ceil($get_jumlah['jumlah'] / $limit); // Hitung jumlah halamannya
                        $jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
                        $start_number = ($anu > $jumlah_number)? $anu - $jumlah_number : 1; // Untuk awal link number
                        $end_number = ($anu < ($jumlah_page - $jumlah_number))? $anu + $jumlah_number : $jumlah_page; // Untuk akhir link number
                        for($i = $start_number; $i <= $end_number; $i++){
                        $link_active = ($anu == $i) ?  'class="active"' : '';
                        
                        ?>
                        <li <?php echo $link_active; ?> ><a href="index.php?page=input_tagihan&anu=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                        <?php } ?>

                        <!-- LINK NEXT AND LAST -->
                        <?php
                        // Jika page sama dengan jumlah page, maka disable link NEXT nya
                        // Artinya page tersebut adalah page terakhir 
                        if($anu == $jumlah_page){ // Jika page terakhir
                        ?>
                          <li class="disabled"><a href="#">&raquo;</a></li>
                          <li class="disabled"><a href="#">Last</a></li>
                        <?php
                        }else{ // Jika Bukan page terakhir
                          $link_next = ($anu < $jumlah_page)? $anu + 1 : $jumlah_page;
                        ?>
                          <li><a href="index.php?page=input_tagihan&anu=<?php echo $link_next; ?>">&raquo;</a></li>
                          <li><a href="index.php?page=input_tagihan&anu=<?php echo $jumlah_page; ?>">Last</a></li>
                        <?php
                        }
                        ?>
                      </ul>
                    </div>
                  <!-- /.box -->

                   </form>
                </div>
        </div>
    </div>
    </div>
    <!-- akhir box input tagihan -->