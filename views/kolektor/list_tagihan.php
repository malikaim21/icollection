  <!-- <div class="alert alert-info alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-warning"></i> Info!</h4>
    Klik Icon Ceklis Pada Kolom Pilih Status Jika Sudah Mem-Followup Konsumen
  </div> -->

<div class="box box-primary box-solid">
    <div class="box-header with-border">
         <h3 class="box-title">Data Konsumen</h3>
    </div>
        <div class="row">
            <div class="col-md-12">
              <!-- Advanced Tables -->
                  <div class="box-body">
                      <div class="table-responsive">
                          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                              <thead>
                                  <tr>
                                      <th>NO</th>
                                      <th>No Kontrak</th>
                                      <th>Nama Konsumen</th>
                                      <th>UNIT</th>
                                      <th>NOPOL</th>
                                      <th class="text-center">Alamat</th>
                                      <th>No. Hp</th>
                                      <th>OVD</th>
                                      <!-- <th>Status</th>
                                      <th>Pilih Status</th> -->
                                      <th class="text-center">Aksi</th>
                                  </tr>
                              </thead>
                              <tbody>
                              
                              <?php
                                  $sql = mysqli_query($koneksi, "SELECT * FROM daftar_tagihan a LEFT JOIN angsuran b 
                                  ON b.id_angsuran = a.id_angsuran LEFT JOIN konsumen c ON c.no_kontrak = b.no_kontrak LEFT JOIN unit d 
                                  ON d.id_unit = b.id_unit WHERE a.nik = $nik AND DATE(a.tgl_input) = CURDATE() ORDER BY id_tagihan DESC");
                                  // var_dump("SELECT * FROM daftar_tagihan JOIN angsuran ON daftar_tagihan.id_angsuran=angsuran.id_angsuran WHERE nik=$nik AND DATE(tgl_input) = CURDATE() ORDER BY id_tagihan DESC");
                                  
                                  $urutan=1;
                                  while ($data=mysqli_fetch_assoc($sql)) {
                              ?> 
                                
                                <tr>
                                  <td><?=$urutan;?></td>
                                  <td><?php echo $data['no_kontrak']; ?></td>
                                  <td><?php echo $data['nama_konsumen'];?></td>
                                  <td><?php echo $data['tipe_kendaraan']; ?></td>
                                  <td><?php echo $data['nopol']; ?></td>
                                  <td><?php echo $data['alamat'];?></td>
                                  <td><?php echo $data['no_tlp']; ?></td>
                                  <td class="text-center">
                                  <?php
                                      $date1 = $data['tgl_mulai_angsuran'];
                                      $date2 = date('Y-m-d');

                                      $ts1 = strtotime($date1);
                                      $ts2 = strtotime($date2);
                                      $year1 = date('Y', $ts1);
                                      $month1 = date('m', $ts1);

                                      $number = cal_days_in_month(CAL_GREGORIAN, $month1, $year1);
                                      $ts  = ($ts2-$ts1) / (60 * 60 * 24) - $number;

                                      // echo "<pre>";

                                      $no = 1;
                                      $idAngsuran = $data['id_angsuran'];
                                      $jmlTanggalDalamBulanTerbayar = 0;
                                      $sql1 = mysqli_query($koneksi, "SELECT * FROM pembayaran WHERE id_angsuran= $idAngsuran");
                                      foreach($sql1 as $anu) {

                                        $tgl_mulai = (string)$date1. " +" . (string)$no . " Month";
                                        // echo $string;
                                        $timeStamp = strtotime((string)$tgl_mulai );
                                        // $timeStamp = strtotime("2013-01-01  +1 Month");
                                        $number = cal_days_in_month(CAL_GREGORIAN, date('m', $timeStamp), date('y', $timeStamp) );
                                        $jmlTanggalDalamBulanTerbayar += $number;

                                        $no++;
                                      }
                                      if ($ts-$jmlTanggalDalamBulanTerbayar < 0) {
                                        echo "-";
                                      }else {
                                        echo $ts-$jmlTanggalDalamBulanTerbayar;
                                      }
                                    ?>
                                    </td>
                                  
                                  <!-- <form method="GET">
                                      <input type="hidden" name="page" value="list_tagihan"> -->
                                      <?php
                                      // if (isset($_GET['button'])) {
                                      //     echo "<td class='text-center'><i class='fa fa-check-square'  style='color: #00BFFF;'></i></td>";
                                      //   }else{ 
                                      //     echo "<td class='text-center'><i class='fa fa-times-rectangle'  style='color: red;'></i></td>";
                                      //   }  
                                      ?>
                                      <!-- <td><center><span style="color: red;"><i class="fa fa-times-rectangle"></i></span></center></td> -->
                                      <!-- <td class="text-center"><button class="btn btn-info" name="button"><i class="fa fa-check-square"></i></button></td>
                                  </form> -->
                                    
                                    <td class="text-center">
                                    <a href="index.php?page=list_tagihan&action=detail&no_kontrak=<?php echo $data ['no_kontrak']; ?>&id_angsuran=<?=$data['id_angsuran']?>" class="btn btn-success" >View </a>
                                    <a href="index.php?page=list_tagihan&action=history&no_kontrak=<?php echo $data ['no_kontrak']; ?>&nama_konsumen=<?php echo $data ['nama_konsumen']; ?>" class="btn btn-info" >History </a>
                                    <a href="index.php?page=list_tagihan&action=followup&no_kontrak=<?php echo $data ['no_kontrak']; ?>&nama_konsumen=<?php echo $data ['nama_konsumen']; ?>&id_tagihan=<?php echo $data ['id_tagihan']; ?>&id_angsuran=<?php echo $data ['id_angsuran']; ?>" class="btn btn-primary">Followup</a>
                                  </td>
                                </tr>
                                    
                           <?php $urutan++;} ?>
                        </tbody>
                      </table>
                      <center>
                      <!-- <a href="index.php?page=list_tagihan&action=report&nik=<?php echo $nik; ?>" class="btn btn-warning" >Report To PDF </a> -->
                      </center>     
                    </div>
            </div>
      </div>
  </div>
</div>