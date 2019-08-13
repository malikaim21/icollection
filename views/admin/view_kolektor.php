<a href="?page=view_kolektor&action=insert" class="btn btn-primary " style="margin-bottom: 5px;">
    Tambah Data
</a>

<div class="box box-primary box-solid">
    <div class="box-header with-border">
         <h3 class="box-title">Data Kolektor</h3>
    </div>
        <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nik</th>
                                            <th>Nama Lengkap</th>
                                            <th>Alamat</th>
                                            <th>No. Hp</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                      <?php

                                    $no=1;
                                    $sql = mysqli_query($koneksi, "SELECT * FROM kolektor");
                                    while ($data=mysqli_fetch_assoc($sql)) {
                                        
                                     ?> 
                                    

                                      <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $data['nik']; ?></td>
                                        <td><?php echo $data['nama'];?></td>
                                        <td><?php echo $data['alamat'];?></td>
                                        <td><?php echo $data['no_hp']; ?></td>
                                        <td class="text-center">
                                          <a href="index.php?page=view_kolektor&action=edit&nik=<?php echo $data ['nik']; ?>" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                          <a href="index.php?page=view_kolektor&action=delete&nik=<?php echo $data ['nik']; ?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
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