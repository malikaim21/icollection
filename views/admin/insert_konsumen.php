    <div class="box box-primary box-solid">
    	<div class="box-header with-border">
              <h3 class="box-title">Tambah Data Konsumen</h3>
        </div>
    <div class="box-body">
        <div class="row ">
            <div class="col-md-12">
                
                <form action="proses/proses_kelola_konsumen.php" method="POST">
                    <div class="form-group">
                        <label>No. Kontrak :</label>
                        <input class="form-control" name="no_kontrak" required
                        oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong !')" oninput="setCustomValidity('')"/>
                    </div>  

                    <div class="form-group">
                        <label>Nama Konsumen :</label>
                        <input class="form-control" name="nama_konsumen" required
                        oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong !')" oninput="setCustomValidity('')"/>
                    </div>


                    <div class="form-group">
                        <label>Kelurahan :</label>
                        <input class="form-control" type="text" name="kelurahan" required
                        oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong !')" oninput="setCustomValidity('')"/>
                    </div>

                    <div class="form-group">
                        <label>Kecamatan :</label>
                        <input class="form-control" type="text" name="kecamatan" required
                        oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong !')" oninput="setCustomValidity('')"/>
                    </div>

                    <div class="form-group">
                        <label>Alamat :</label>
                        <textarea name="alamat" class="form-control" required
                        oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong !')" oninput="setCustomValidity('')"></textarea>
                    </div>

                    <div class="form-group">
                        <label>No. HP:</label>
                        <input class="form-control" type="text" name="no_tlp" required
                        oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong !')" oninput="setCustomValidity('')"/>
                    </div>
                    
                    <div>
                        <input type="submit" name="simpan"  value="simpan" class="btn btn-primary">
                        <a href="?page=view_konsumen&action=insert" class="btn btn-warning">Clear</a>
                        <a href="?page=view_konsumen" class="btn btn-danger">Back</a>
                    </div>
                   </form>
                </div>
        </div>
    </div>
    </div>