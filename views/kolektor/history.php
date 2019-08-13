<?php
$no_kontrak = $_GET['no_kontrak'];
$nama_konsumen = $_GET['nama_konsumen'];
?>

<div class="box box-primary box-solid">
    <div class="box-header with-border">
         <h3 class="box-title">
             <?php
             echo "History Followup : " .$no_kontrak. " - " .$nama_konsumen;
             ?>
         </h3>
    </div>
        <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                  
                                  <thead>
                                    <tr>
                                        <th>No.</td></th>
                                        <th>Kondisi Konsumen</td></th>
                                        <th>Kondisi Konsumen</th>
                                        <th>Realisasi</th>
                                        <th>Tanggal Janji Bayar</th>
                                        <th>Via</th>
                                        <th>Tanggal Followup</th>
                                    </tr>
                                  </thead>

                                  <tbody>

                                    <?php
                                    $no=1;
                                    $sql = mysqli_query($koneksi,"SELECT * FROM followup a LEFT JOIN daftar_tagihan b 
                                    ON b.id_tagihan = a.id_tagihan LEFT JOIN angsuran c ON c.id_angsuran = b.id_angsuran LEFT JOIN konsumen d 
                                    ON d.no_kontrak = c.no_kontrak LEFT JOIN unit e ON e.id_unit = c.id_unit WHERE c.no_kontrak=$no_kontrak ");
                                    while ($row=mysqli_fetch_assoc($sql)) {
                                    
                                    ?> 
                                    
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $row['konsumen']; ?></td>
                                        <td><?php echo $row['kondisi_unit']; ?></td>
                                        <td><?php echo $row['realisasi'];?></td>
                                        <td>
                                        <?php
                                            if ($row['tgl_janji_bayar']) {
                                                echo date ("d-m-Y", strtotime($row['tgl_janji_bayar']));      
                                            } else {
                                            echo "";
                                            }
                                         ?>
                                        </td>
                                        <td><?php echo $row['via']; ?></td>
                                        <td><?php echo date ("d-m-Y (H:i:s)", strtotime($row['tgl_followup'])); ?></td>
                                    </tr>
                                      
                                 <?php $no++;} ?>   
                                  </tbody>
                                </table>
                                        <div>
                                        <input type="submit" name="kirim" id='back'  value="Back" class="btn btn-danger">
                                        </div>
                            </div>
                      </div>
               </div>
        </div>
    </div>

    <script defer="defer">
        
        $(function() {

            $('#back').on('click', function() {
                window.history.go(-1)
            })
            
        });
    </script>