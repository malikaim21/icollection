<div class="box box-primary box-solid">
  <div class="box-header with-border">
    <h3 class="box-title">Ubah Password</h3>
  </div>

  <div class="box-body">
    <div class="row">
      <div class="col-md-12">
    <?php 
    $notif = isset($_GET['notif']) ? $_GET['notif']: false;

      if ($notif) {
        if ($notif == "PassOldWrong") {
          echo "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
          Maaf Password Lama Anda Salah</div>";
        } else if ($notif == "PassNewWrong") {
          echo "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
          Maaf Password Baru Anda Tidak Boleh Sama Dengan Password Lama Anda</div>";
        } else if ($notif == "PassRenewWrong") {
          echo "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
          Maaf Konfirmsi Ulang Password Baru Anda Tidak Sesuai</div>";
        }
      }
    ?>
<form action="proses/proses_change_password.php" method="POST">

  <div class="form-group">
    <label for="exampleInputPassword1">Old Password</label>
    <input type="password" name="old" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">New Password</label>
    <input type="password" name="new" class="form-control" id="exampleInputPassword1" placeholder="New Password" required>
  </div>	

  <div class="form-group">
    <label for="exampleInputPassword1">Re-Type New Password</label>
    <input type="password" name="re_new" class="form-control" id="exampleInputPassword1" placeholder="Re-Type New Password" required>
  </div>

  <button type="submit" name="simpan" value="pass_admin" class="btn btn-primary">Submit</button>
  <a href="index.php" class="btn btn-danger">Back</a>
    </form>
    </div>
  </div>
 </div>
</div>	