    <div class="box box-primary box-solid">
    	<div class="box-header with-border">
              <h3 class="box-title">Tambah Data Angsuran</h3>
        </div>
    <div class="box-body">
        <div class="row ">
            <div class="col-md-12">
                
                <form action="proses/proses_kelola_pengajuan.php" method="POST">

                    <div class="form-group">
		                <label>Admin Yang Menginput</label>
                        <input class="form-control" type="text" name="<?php echo $id_admin ; ?>" value="<?php echo $nama ; ?>" readonly/>    
              		</div>
                    
                    <div class="form-group">
		                <label>List Konsumen</label>
		                <select class="form-control select2" name="no_kontrak" style="width: 100%;" required>
		                <?php 
		                	$query = mysqli_query($koneksi, "SELECT no_kontrak,nama_konsumen FROM konsumen WHERE no_kontrak NOT IN (SELECT no_kontrak FROM angsuran )" );
                            while($data=mysqli_fetch_array($query)){
                            echo "<option value='".$data['no_kontrak']."'>".$data['no_kontrak']." - ".$data['nama_konsumen']."</option>";
                            }
		                 ?>
		                </select>
              		</div>  

                    <div class="form-group">
		                <label>List Unit</label>
		                <select class="form-control select2" name="id_unit" style="width: 100%;" required>
		                <?php 
		                	$query1 = mysqli_query($koneksi, "SELECT id_unit,tipe_kendaraan, nopol FROM unit WHERE id_unit NOT IN (SELECT id_unit FROM angsuran ) ");
                            while($data1=mysqli_fetch_array($query1)){
                            echo "<option value='".$data1['id_unit']."'> ".$data1['tipe_kendaraan']." - ".$data1['nopol']."</option>";
                            }
		                 ?>
		                </select>
              		</div>


                    <div class="form-group">
                        <label>Tenor :</label>
                        <input class="form-control" type="text" name="tenor" required
                        oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong !')" oninput="setCustomValidity('')"/>
                    </div>

                    <div class="form-group">
                        <label>Nilai Angsuran :</label>
                        <input class="form-control" type="text" name="nilai_angsuran" required
                        oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong !')" oninput="setCustomValidity('')"/>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Jatuh Tempo:</label>
                        <input class="form-control" type="text" name="tgl_jt_tempo" required
                        oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong !')" oninput="setCustomValidity('')"/>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Mulai Angsuran:</label>
                        <input class="form-control" type="date" name="tgl_mulai_angsuran" required
                        oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong !')" oninput="setCustomValidity('')"/>
                    </div>
                    
                    <div>
                        <input type="submit" name="simpan"  value="simpan" class="btn btn-primary">
                    </div>
                   </form>
                </div>
        </div>
    </div>
    </div>

    <script>
    	$( document ).ready(function() {
		    console.log( "ready!" );
    		$('.select2').select2()
		});
    </script>