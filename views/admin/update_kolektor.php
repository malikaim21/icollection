<?php 
    $nik = $_GET["nik"];
    $sql = mysqli_query($koneksi, "SELECT * FROM kolektor WHERE nik='$nik'");
    $row = mysqli_fetch_assoc($sql);
 ?>

<div class="box box-primary box-solid">
	<div class="box-header with-border">
          <h3 class="box-title">Update Data Kolektor</h3>
    </div>
      <div class="box-body">
        <div class="row ">
            <div class="col-md-12">
                
                <form action="proses/proses_kelola_kolektor.php" method="POST">
                    <div class="form-group">
                        <label>NIK :</label>
                        <input class="form-control" name="nik" value="<?php echo $row['nik'] ; ?>" readonly/>
                    </div>  

                    <div class="form-group">
                        <label>Nama Kolektor :</label>
                        <input class="form-control" name="nama_kolektor"value="<?php echo $row['nama'] ; ?>" />
                    </div>

                    <div class="form-group">
                        <label>Alamat :</label>
                        <textarea name="alamat" class="form-control"><?php echo $row['alamat'] ; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label>No. HP:</label>
                        <input class="form-control" type="text" name="no_hp"value="<?php echo $row['no_hp'] ; ?>" />
                    </div>

                    <div class="form-group">
                        <label>Username:</label>
                        <input class="form-control" type="text" name="username" value="<?php echo $row['username'] ; ?>"/>
                    </div>

                    <div class="form-group">
                        <label>Password:</label>
                        <input type="password" class="form-control" type="text" name="password" value="<?php echo $row['password'] ; ?>"/>
                    </div>

                    
                    <div>
                        <input type="submit" name="simpan"  value="edit" class="btn btn-primary">
                        <a href="?page=view_kolektor" class="btn btn-danger">Back</a>
                    </div>
                   </form>
                </div>
        </div>
    </div>
    </div>