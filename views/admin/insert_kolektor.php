    <div class="box box-primary box-solid">
    	<div class="box-header with-border">
              <h3 class="box-title">Tambah User</h3>
        </div>
    <div class="box-body">
        <div class="row ">
            <div class="col-md-12">
                
                <form action="proses/proses_kelola_kolektor.php" method="POST">
                    <div class="form-group">
                        <label>NIK :</label>
                        <input class="form-control" name="nik" required/>
                    </div>  

                    <div class="form-group">
                        <label>Nama Kolektor :</label>
                        <input class="form-control" name="nama_kolektor" required/>
                    </div>

                    <div class="form-group">
                        <label>Alamat :</label>
                        <textarea name="alamat" class="form-control" required></textarea>
                    </div>

                    <div class="form-group">
                        <label>No. HP:</label>
                        <input class="form-control" type="text" name="no_hp" required/>
                    </div>

                    <div class="form-group">
                        <label>Username:</label>
                        <input class="form-control" type="text" name="username" required/>
                    </div>

                    <div class="form-group">
                        <label>Password:</label>
                        <input type="password" class="form-control" type="text" name="password" required/>
                    </div>

                    
                    <div>
                        <input type="submit" name="simpan"  value="simpan" class="btn btn-primary">
                        <a href="?page=view_kolektor&action=insert" class="btn btn-warning">Clear</a>\
                        <a href="?page=view_kolektor" class="btn btn-danger">Back</a>
                    </div>
                   </form>
                </div>
        </div>
    </div>
    </div>