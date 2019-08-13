    <div class="box box-primary box-solid">
    	<div class="box-header with-border">
              <h3 class="box-title">Tambah Data Unit</h3>
        </div>
    <div class="box-body">
        <div class="row ">
            <div class="col-md-12">
                
                <form action="proses/proses_kelola_unit.php" method="POST">
                    

                    <div class="form-group">
                        <label>Merk :</label>
                        <select name="merk" class="form-control" id="merk">
                            <option value="#">---Pilih Kategori---</option>
                            <option value="Suzuki">Suzuki</option>
                            <option value="Nissan">Nissan</option>
                            <option value="Datsun">Datsun</option>
                            <option value="Renault">Renault</option>
                            <option value="Volks Wagen">Volks Wagen</option>
                            <option value="Volvo">Volvo</option>
                            <option value="Audy">Audy</option>
                            <option value="Hino">Hino</option>
                            <option value="Kawasaki">Kawasaki</option>
                            <option value="Honda">Honda</option>
                            <option value="Yamaha">Yamaha</option>
                            <option value="Piagio">Piagio</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Type Kendaraan :</label>
                        <input class="form-control" type="text" name="tipe_kendaraan" required/>
                    </div>

                    <div class="form-group">
                        <label>Nopol :</label>
                        <input class="form-control" name="nopol" />
                    </div>

                    <div class="form-group">
                        <label>Jenis Kendaraan :</label>
                        <select name="jenis_kendaraan" class="form-control" id="jenis_kendaraan">
                            <option value="#">---Pilih Kategori---</option>
                            <option value="R2">R2</option>
                            <option value="R4">R4</option>
                            <option value="CV">CV</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Warna :</label>
                        <input class="form-control" type="text" name="warna" required/>
                    </div>

                    <div class="form-group">
                        <label>Tahun Kendaraan :</label>
                        <input class="form-control" type="text" name="thn_kendaraan" required/>
                    </div>

                    <div class="form-group">
                        <label>No. Rangka :</label>
                        <input class="form-control" type="text" name="no_rangka" required/>
                    </div>

                    <div class="form-group">
                        <label>No. Mesin :</label>
                        <input class="form-control" type="text" name="no_mesin" required/>
                    </div>

                    <div class="form-group">
                        <label>Kondisi :</label>
                        <select name="kondisi" class="form-control" id="kondisi">
                            <option value="#">---Pilih Kategori---</option>
                            <option value="BARU">BARU</option>
                            <option value="BEKAS">BEKAS</option>
                        </select>
                    </div>
                    
                    <div>
                        <input type="submit" name="simpan"  value="simpan" class="btn btn-primary">
                        <a href="?page=view_unit&action=insert" class="btn btn-warning">Clear</a>
                        <a href="?page=view_unit" class="btn btn-danger">Back</a>
                    </div>
                   </form>
                </div>
        </div>
    </div>
    </div>