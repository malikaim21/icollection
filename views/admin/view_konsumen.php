<a href="?page=view_konsumen&action=insert" class="btn btn-primary " style="margin-bottom: 5px;">
    Tambah Data
</a>

<div class="box box-primary box-solid">
    <div class="box-header with-border">
         <h3 class="box-title">Data Konsumen</h3>
    </div>
        <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="example1">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>No. Kontrak</th>
                                            <th>Nama Konsumen</th>
                                            <th>Kelurahan</th>
                                            <th>Kecamatan</th>
                                            <th>Alamat</th>
                                            <th>No. Tlp</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                      <?php


                                    $sql = mysqli_query($koneksi, "SELECT * FROM konsumen");
                                    $no=1;
                                    while ($data=mysqli_fetch_assoc($sql)) {
                                        
                                     ?> 
                                    

                                      <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $data['no_kontrak']; ?></td>
                                        <td><?php echo $data['nama_konsumen'];?></td>
                                        <td><?php echo $data['kelurahan']; ?></td>
                                        <td><?php echo $data['kecamatan'];?></td>
                                        <td><?php echo $data['alamat'];?></td>
                                        <td><?php echo $data['no_tlp']; ?></td>
                                        <td>
                                          <a href="index.php?page=view_konsumen&action=edit&no_kontrak=<?php echo $data ['no_kontrak']; ?>" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                          <a href="index.php?page=view_konsumen&action=delete&no_kontrak=<?php echo $data ['no_kontrak']; ?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                      </tr>
                                    
                                    <?php $no++;} ?>
                                  </tbody>
                                </table>
                            </div>
                      </div>
               </div>
        </div>
    </div>

