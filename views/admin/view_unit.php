<a href="?page=view_unit&action=insert" class="btn btn-primary " style="margin-bottom: 5px;">
    Tambah Data
</a>

<div class="box box-primary box-solid">
    <div class="box-header with-border">
         <h3 class="box-title">Data Unit</h3>
    </div>
        <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="example1">
                                    <thead>
                                        <tr>
                                            <!-- <th>Id. Unit</th> -->
                                            <th>No</th>
                                            <th>Merk</th>
                                            <th>Type Kendaraan</th>
                                            <th>Nopol</th>
                                            <th>Warna</th>
                                            <th>Tahun</th>
                                            <th>No.Rangka</th>
                                            <th>No.Mesin</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                      <?php


                                    $sql = mysqli_query($koneksi, "SELECT * FROM unit");
                                    $no=1;
                                    while ($data=mysqli_fetch_assoc($sql)) {
                                        
                                     ?> 
                                    

                                      <tr>
                                        <td><?=$no;?></td>
                                        <td><?php echo $data['merk'];?></td>
                                        <td><?php echo $data['tipe_kendaraan']; ?></td>
                                        <td><?php echo $data['nopol'];?></td>
                                        <td><?php echo $data['warna']; ?></td>
                                        <td><?php echo $data['thn_kendaraan']; ?></td>
                                        <td><?php echo $data['no_rangka']; ?></td>
                                        <td><?php echo $data['no_mesin']; ?></td>                                     
                                        <td>
                                          <a href="index.php?page=view_unit&action=edit&id_unit=<?php echo $data ['id_unit']; ?>" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                          <a href="index.php?page=view_unit&action=delete&id_unit=<?php echo $data ['id_unit']; ?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
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