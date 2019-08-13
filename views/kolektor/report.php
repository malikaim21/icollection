<style>
@media print {
    footer{
        display: none !important;
    }
}</style>

<body onload="window.print()">
  <b>Tanggal FU    : <?=$date = date('d - m - Y'); ?></b><br>
  <b>Nama Cabang   : Tangerang</b><br>
  <b>Nama Kolektor : <?=$nama;?></b><br>
 <div class="box box-primary box-solid">
    <div class="box-header with-border">
        <center><h3 class="box-title">Daftar Tagihan Harian</h3></center> 
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
                                      <!-- <th>Angsuran-ke</th> -->
                                      <th>Tenor</th>
                                      <th class="text-center">Nilai Angsuran</th>
                                      <th>OVD</th>
                                      <!-- <th class="text-center">Konsumen</th>
                                      <th class="text-center">Unit</th>
                                      <th class="text-center">Realisasi</th> -->
                                  </tr>
                              </thead>
                              <tbody>
                              
                              <?php
                                  $sql = mysqli_query($koneksi, "SELECT * FROM daftar_tagihan A 
                                        LEFT JOIN kolektor B ON B.nik = A.nik
                                        LEFT JOIN angsuran D ON D.id_angsuran = A.id_angsuran
                                        LEFT JOIN konsumen E ON E.no_kontrak = D.no_kontrak
                                        LEFT JOIN unit F ON F.id_unit = D.id_unit
                                        WHERE A.nik = $nik AND DATE(a.tgl_input) = CURDATE() ORDER BY A.id_tagihan DESC");
                                  // var_dump("SELECT * FROM daftar_tagihan JOIN angsuran ON daftar_tagihan.id_angsuran=angsuran.id_angsuran WHERE nik=$nik AND DATE(tgl_input) = CURDATE() ORDER BY id_tagihan DESC");
                                  
                                  $urutan=1;
                                  while ($data=mysqli_fetch_assoc($sql)) {
                                    ?> 

                          
                                
                                <tr>
                                  <td><?=$urutan;?></td>
                                  <td><?php echo $data['no_kontrak']; ?></td>
                                  <td><?php echo $data['nama_konsumen'];?></td>
                                  <td>

                                  <?php                                  
                                  // $id_angsuran = $data['id_angsuran'];

                                  // $sql = "SELECT COUNT(*) as total FROM pembayaran
                                  //         WHERE id_angsuran = $id_angsuran";
                                  // $result = mysqli_query($koneksi,$sql);
                                  // $result1 = mysqli_fetch_assoc($result);
                                  // $angsuran_terakhir = $result1['total'];
                                  // echo $angsuran_terakhir+1;
                                  echo $data['tenor'];
                                  ?>
                                  
                                  </td>
                                  <td class="text-center"><?php echo rupiah ($data['nilai_angsuran']); ?></td>
                                  <td>
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
                                      if ($ts-$jmlTanggalDalamBulanTerbayar <= 0) {
                                        echo "-";
                                      }else {
                                        echo $ts-$jmlTanggalDalamBulanTerbayar;
                                      }
                                      ?>
                                      </td>
                                  <!-- <td class="text-center">
                                  </td>
                                  
                                    
                                 <td class="text-center">
                                 
                                  </td> -->
                                </tr>
                                    
                           <?php $urutan++;} ?>
                        </tbody>
                      </table>     
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