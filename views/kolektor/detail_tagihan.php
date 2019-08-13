<div class="box box-primary box-solid">
    <div class="box-header with-border">
         <h3 class="box-title">Detail Konsumen</h3>
    </div>
        <div class="row">
                <div class="col-md-6">
                    <!-- Advanced Tables -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <tbody>

                                    <?php

                                    // rumus mendapatkan angsuran konsumen
                                    $id_angsuran = $_GET['id_angsuran'];

                                    $sql = "SELECT COUNT(*) as total FROM pembayaran
                                            WHERE id_angsuran = $id_angsuran";
                                    $result = mysqli_query($koneksi,$sql);
                                    $result1 = mysqli_fetch_assoc($result);
                                    $angsuran_terakhir = $result1['total'];

                                    $no_kontrak = $_GET['no_kontrak'];
                                    $sql = mysqli_query($koneksi,"SELECT * FROM daftar_tagihan a LEFT JOIN angsuran b ON b.id_angsuran =
                                    a.id_angsuran LEFT JOIN konsumen c ON c.no_kontrak = b.no_kontrak LEFT JOIN unit d ON d.id_unit = 
                                    b.id_unit LEFT JOIN pembayaran e ON e.id_angsuran = b.id_angsuran WHERE b.no_kontrak=$no_kontrak 
                                    ORDER BY e.nominal_denda DESC ");
                                    $row=mysqli_fetch_assoc($sql);

                                    $sql1 = mysqli_query($koneksi, "SELECT * FROM pembayaran WHERE id_angsuran=$id_angsuran ORDER BY tgl_bayar DESC");
                                    $row1 = mysqli_fetch_assoc($sql1);

                                    $date1 = $row['tgl_mulai_angsuran'];
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

                                    $jmlTanggalDalamBulanTerbayar = 0;
                                    $no = 1;

                                    foreach($sql1 as $data) {

                                      $tgl_mulai = (string)$date1. " +" . (string)$no . " Month";
                                      $timeStamp = strtotime((string)$tgl_mulai );
                                      $number = cal_days_in_month(CAL_GREGORIAN, date('m', $timeStamp), date('y', $timeStamp) );
                                      $jmlTanggalDalamBulanTerbayar += $number;

                                      $no++;
                                    }
                                  
                                    $angsuran_ke = (($year2 - $year1) * 12) + ($month2 - $month1) + (( $day1 <= $day2 ) ? 0 : -1);

                                    $denda= $row['nilai_angsuran'] * 0.005;

                                    $total_denda = $denda * $ts;
                                        
                                     ?> 
                                    

                                      <tr>
                                        <td>No Kontrak</td>
                                        <td>:</td>
                                        <td><?php echo $row['no_kontrak']; ?></td>   
                                      </tr>

                                      <tr>
                                        <td>Nama Konsumen</td>
                                        <td>:</td>
                                        <td><?php echo $row['nama_konsumen']; ?></td>   
                                      </tr>

                                      <tr>
                                        <td>Type Kendaraan</td>
                                        <td>:</td>
                                        <td><?php echo $row['tipe_kendaraan']; ?></td>   
                                      </tr>

                                      <tr>
                                        <td>Warna</td>
                                        <td>:</td>
                                        <td><?php echo $row['warna']; ?></td>   
                                      </tr>


                                      <tr>
                                        <td>Nopol</td>
                                        <td>:</td>
                                        <td><?php echo $row['nopol']; ?></td>   
                                      </tr>

                                      <tr>
                                        <td>Alamat</td>
                                        <td>:</td>
                                        <td><?php echo $row['alamat']; ?></td>   
                                      </tr>

                                      <tr>
                                        <td>Kelurahan</td>
                                        <td>:</td>
                                        <td><?php echo $row['kelurahan']; ?></td>   
                                      </tr>

                                      <tr>
                                        <td>Kecamatan</td>
                                        <td>:</td>
                                        <td><?php echo $row['kecamatan']; ?></td>   
                                      </tr>

                                      <tr>
                                        <td>No. Telefon</td>
                                        <td>:</td>
                                        <td><?php echo $row['no_tlp']; ?></td>   
                                      </tr>

                                      <tr>
                                        <td>Tanggal Terima Kendaraan</td>
                                        <td>:</td>
                                        <td><?php echo date ("d-m-Y", strtotime($row['tgl_mulai_angsuran'])); ?></td>   
                                      </tr>

                                      <tr>
                                        <td>Tanggal Jatuh Tempo</td>
                                        <td>:</td>
                                        <td><?php echo $row['tgl_jt_tempo']; ?></td>   
                                      </tr>

                                      <tr>
                                        <td>Overdue</td>
                                        <td>:</td>
                                        <td><?php
                                            if ($ts-$jmlTanggalDalamBulanTerbayar < 0) {
                                              echo "-";
                                            }else {
                                              echo $ts-$jmlTanggalDalamBulanTerbayar;
                                            }
                                             ?></td>   
                                      </tr>

                                      <tr>
                                        <td>Angsuran Tertunggak </td>
                                        <td>:</td>
                                        <td>
                                          <?php
                                            echo ($angsuran_ke - $angsuran_terakhir);
                                          ?> 
                                        </td>   
                                      </tr>

                                      <tr>
                                        <td>Angsuran Terakhir Masuk Ke-</td>
                                        <td>:</td>
                                        <td>
                                          <?php
                                          if ($row['tgl_bayar']) {
                                            echo $angsuran_terakhir;
                                          }else{
                                            echo "-";
                                          }
                                          ?>
                                        </td>   
                                      </tr>

                                      <tr>
                                        <td>Tanggal Pembayaran Angsuran Terakhir</td>
                                        <td>:</td>
                                        <td>
                                          <?php
                                          if ($row1['tgl_bayar']) {
                                            echo date ("d-m-Y H:i:s", strtotime($row1['tgl_bayar']));
                                          }else{
                                            echo "-";
                                          }
                                          ?>
                                        </td>   
                                      </tr>

                                      <tr>
                                        <td>Lama Angsuran</td>
                                        <td>:</td>
                                        <td><?php echo $row['tenor']; ?></td>   
                                      </tr>

                                      <tr>
                                        <td>Nilai Angsuran Pe-rbulan</td>
                                        <td>:</td>
                                        <td><?php echo rupiah($row['nilai_angsuran']); ?></td>   
                                      </tr>

                                      <tr>
                                        <td>Nilai Angsuran Tertunggak</td>
                                        <td>:</td>
                                        <td>
                                         <?php 
                                            echo (rupiah(($angsuran_ke - $angsuran_terakhir) * $row['nilai_angsuran'])  );
                                          ?>
                                        </td>   
                                      </tr>

                                      <tr>
                                        <td>Denda Per-Hari</td>
                                        <td>:</td>
                                        <td><?php 
                                                  if ($total_denda - $row['nominal_denda'] == "0") { 
                                                      echo "-";
                                                  }else{ echo rupiah($denda);} ?></td>   
                                      </tr>

                                      <tr>
                                        <td>Total Denda Keterlambatan</td>
                                        <td>:</td>
                                        <td><?=rupiah($total_denda - $row['nominal_denda'])?></td>   
                                      </tr>

                                  </tbody>
                                </table>
                                        <div>
                                          <a href="?page=list_tagihan" class="btn btn-danger">Back</a>
                                        </div>
                            </div>
                      </div>
               </div>
        </div>
    </div>