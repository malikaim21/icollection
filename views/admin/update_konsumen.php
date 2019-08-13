<?php 
    $no_kontrak = $_GET["no_kontrak"];
    $sql = mysqli_query($koneksi, "SELECT * FROM konsumen WHERE no_kontrak='$no_kontrak'");
    $row = mysqli_fetch_assoc($sql);
 ?>

<div class="box box-primary box-solid">
	<div class="box-header with-border">
          <h3 class="box-title">Update Data Konsumen</h3>
    </div>
      <div class="box-body">
        <div class="row ">
            <div class="col-md-12">
                
                <form action="proses/proses_kelola_konsumen.php" method="POST">
                    <div class="form-group">
                        <label>No. Kontrak :</label>
                        <input class="form-control" name="no_kontrak" value="<?php echo $row['no_kontrak'] ; ?>" readonly />
                    </div>  

                    <div class="form-group">
                        <label>Nama Konsumen :</label>
                        <input class="form-control" name="nama_konsumen" value="<?php echo $row['nama_konsumen'] ; ?>" />
                    </div>
                     
                    <div class="form-group">
                        <label>Alamat :</label>
                        <textarea name="alamat" class="form-control"><?php echo $row['alamat'] ; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label>Kelurahan :</label>
                        <input class="form-control" type="text" name="kelurahan" value="<?php echo $row['kelurahan'] ; ?>" />
                    </div>

                    <div class="form-group">
                        <label>Kecamatan :</label>
                        <input class="form-control" type="text" name="kecamatan" value="<?php echo $row['kecamatan'] ; ?>" />
                    </div>

                    <div class="form-group">
                        <label>No. HP:</label>
                        <input class="form-control" type="text" name="no_tlp" value="<?php echo $row['no_tlp'] ; ?>" />
                    </div>

                    <!-- <div class="form-group">
                        <label>Username:</label>
                        <input class="form-control" type="text" name="username" value="<?php echo $row['username'] ; ?>"/>
                    </div>

                    <div class="form-group">
                        <label>Password:</label>
                        <input type="password" class="form-control" type="text" name="password" value="<?php echo $row['password'] ; ?>"/>
                    </div> -->

                    
                    <div>
                        <input type="submit" name="simpan"  value="ubah" class="btn btn-primary">
                        <a href="?page=view_konsumen" class="btn btn-danger">Back</a>
                    </div>
                   </form>
                </div>
        </div>
    </div>
    </div>