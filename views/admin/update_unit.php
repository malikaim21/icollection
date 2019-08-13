<?php 
    $id_unit = $_GET["id_unit"];
    $sql = mysqli_query($koneksi, "SELECT * FROM unit WHERE id_unit='$id_unit'");
    $row = mysqli_fetch_assoc($sql);
 ?>

    <div class="box box-primary box-solid">
    	<div class="box-header with-border">
              <h3 class="box-title">Update Data Unit</h3>
        </div>
    <div class="box-body">
        <div class="row ">
            <div class="col-md-12">
                
                <form action="proses/proses_kelola_unit.php" method="POST">
                    
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="id_unit" value="<?php echo $row['id_unit'] ; ?>"/>
                    </div>

                    <div class="form-group">
                        <label>Merk :</label>
                        <input class="form-control" type="text" name="merk" value="<?php echo $row['merk'] ; ?>"/>
                        <!-- <span>
				        <select class="form-control" name="merk" > -->
                            <?php
                            // $query = mysqli_query($koneksi, "SELECT * FROM unit WHERE id_unit='$id_unit' ");
                            // while ($croot=mysqli_fetch_assoc($query)) {
                            //     if ($id_unit == $croot['id_unit']) {
                            //     echo "<option value='$croot[merk]' selected>$croot[merk]</option>";	
                            //     }else{
                            //     echo "
                            //     <option value='#'>---Pilih Kategori---</option>
                            //     <option value='Suzuki'>Suzuki</option>
                            //     <option value='Nissan'>Nissan</option>
                            //     <option value='Datsun'>Datsun</option>
                            //     <option value='Renault'>Renault</option>
                            //     <option value='Volks Wagen'>Volks Wagen</option>
                            //     <option value='Volvo'>Volvo</option>
                            //     <option value='Audy'>Audy</option>
                            //     <option value='Hino'>Hino</option>
                            //     <option value='Kawasaki'>Kawasaki</option>
                            //     <option value='Honda'>Honda</option>
                            //     <option value='Yamaha'>Yamaha</option>
                            //     <option value='Piagio'>Piagio</option>
                            //     ";
                            //     }
                            // } 
                            ?>
				        <!-- </select>
			            </span> -->
                    </div>
                    
                    <div class="form-group">
                        <label>Type Kendaraan :</label>
                        <input class="form-control" type="text" name="tipe_kendaraan" value="<?php echo $row['tipe_kendaraan'] ; ?>" />
                    </div>

                    <div class="form-group">
                        <label>Nopol :</label>
                        <input class="form-control" name="nopol" value="<?php echo $row['nopol'] ; ?>" readonly/>
                    </div>
                    
                    <div class="form-group">
                        <label>Jenis Kendaraan :</label>
                        <input class="form-control" type="text" name="jenis_kendaraan" value="<?php echo $row['jenis_kendaraan'] ; ?>"/>
                    </div>

                    <div class="form-group">
                        <label>Warna :</label>
                        <input class="form-control" type="text" name="warna" value="<?php echo $row['warna'] ; ?>"/>
                    </div>

                    <div class="form-group">
                        <label>Tahun Kendaraan :</label>
                        <input class="form-control" type="text" name="thn_kendaraan" value="<?php echo $row['thn_kendaraan'] ; ?>" />
                    </div>

                    <div class="form-group">
                        <label>No. Rangka :</label>
                        <input class="form-control" type="text" name="no_rangka" value="<?php echo $row['no_rangka'] ; ?>"/>
                    </div>

                    <div class="form-group">
                        <label>No. Mesin :</label>
                        <input class="form-control" type="text" name="no_mesin" value="<?php echo $row['no_mesin'] ; ?>"/>
                    </div>

                    <div class="form-group">
                        <label>Kondisi :</label>
                        <input class="form-control" type="text" name="kondisi" value="<?php echo $row['kondisi'] ; ?>" />
                    </div>
                    
                    <div>
                        <input type="submit" name="simpan"  value="Ubah" class="btn btn-primary">
                        <a href="?page=view_unit" class="btn btn-danger">Back</a>
                    </div>
                   </form>
                </div>
        </div>
    </div>
    </div>