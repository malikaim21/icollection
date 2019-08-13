<?php
$no_kontrak = $_GET['no_kontrak'];
$nama_konsumen = $_GET['nama_konsumen'];

$id_angsuran = isset($_GET['id_angsuran']) ? $_GET['id_angsuran'] : "";

$sql = "SELECT COUNT(*) as total FROM pembayaran WHERE id_angsuran = $id_angsuran";
// $sql= "select count(*) as total from angsuran where no_kontrak= $id_angsuran";
$result = mysqli_query($koneksi, $sql);
$result1 = mysqli_fetch_assoc($result);
$angsuran_terakhir = $result1['total'];


$sql = mysqli_query($koneksi, "SELECT * FROM daftar_tagihan a LEFT JOIN angsuran b ON b.id_angsuran =
                                    a.id_angsuran LEFT JOIN konsumen c ON c.no_kontrak = b.no_kontrak LEFT JOIN unit d ON d.id_unit = 
                                    b.id_unit LEFT JOIN pembayaran e ON e.id_angsuran = b.id_angsuran WHERE b.no_kontrak=$no_kontrak
                                    ORDER BY e.nominal_denda DESC");
$data = mysqli_fetch_assoc($sql);


$date1 = $data['tgl_mulai_angsuran'];
$date2 = date('Y-m-d');

$ts1 = strtotime($date1);
$ts2 = strtotime($date2);

$year1 = date('Y', $ts1);
$year2 = date('Y', $ts2);

$month1 = date('m', $ts1);
$month2 = date('m', $ts2);

$day1 = date('d', $ts1);
$day2 = date('d', $ts2);

$number = cal_days_in_month(CAL_GREGORIAN, $month1, $year1);
$ts  = ($ts2 - $ts1) / (60 * 60 * 24) - $number;

$angsuran_ke = (($year2 - $year1) * 12) + ($month2 - $month1) + (($day1 <= $day2) ? 0 : -1);

$nominal_tunggakan = (($angsuran_ke - $angsuran_terakhir) * $data['nilai_angsuran']);
$denda = $data['nilai_angsuran'] * 0.005;
$total_denda = $denda * $ts;



if (isset($_POST['kirim'])) {

    $id_tagihan = isset($_GET['id_tagihan']) ? $_GET['id_tagihan'] : "";
    $konsumen = isset($_POST['konsumen']) ? $_POST['konsumen'] : "";
    $kondisi_unit = isset($_POST['kondisi_unit']) ? $_POST['kondisi_unit'] : "";
    $realisasi = isset($_POST['realisasi']) ? $_POST['realisasi'] : "";
    $tgl_janji_bayar = isset($_POST['tgl_janji_bayar']) ? $_POST['tgl_janji_bayar'] : "";
    $via = isset($_POST['via']) ? $_POST['via'] : "";
    $nominal_pembayaran = isset($_POST['nominal_pembayaran']) ? $_POST['nominal_pembayaran'] : "";
    $angsuran_ke = isset($_POST['angsuran_ke']) ? $_POST['angsuran_ke'] : "";
    $nominal_denda = isset($_POST['nominal_denda']) ? $_POST['nominal_denda'] : "";
    $denda = isset($_POST['denda']) ? $_POST['denda'] : "";

    if ($realisasi == "Janji Bayar") {
        mysqli_query($koneksi, "INSERT INTO followup (id_tagihan, konsumen, kondisi_unit, realisasi, tgl_janji_bayar, via)
                                    VALUES ('$id_tagihan', '$konsumen', '$kondisi_unit', '$realisasi', '$tgl_janji_bayar', '$via') ");
    } else if ($realisasi == "Sudah Bayar") {
        mysqli_query($koneksi, "INSERT INTO followup (id_tagihan, konsumen, kondisi_unit, realisasi)
                                    VALUES ('$id_tagihan', '$konsumen', '$kondisi_unit', '$realisasi') ");
    } else if ($realisasi == "Bayar Via Kolektor") {
        mysqli_query($koneksi, "INSERT INTO followup (id_tagihan, konsumen, kondisi_unit, realisasi)
                                    VALUES ('$id_tagihan', '$konsumen', '$kondisi_unit', '$realisasi') ");

        $query = mysqli_query($koneksi, "SELECT * FROM angsuran LEFT JOIN pembayaran ON angsuran.id_angsuran=pembayaran.id_angsuran
                                         WHERE angsuran.id_angsuran=$id_angsuran ORDER BY nominal_denda DESC");
        $row = mysqli_fetch_assoc($query);

        $total_deposit = $nominal_pembayaran + $row['deposit'];
        $nilai_angsuran = $row['nilai_angsuran'];
        $tambah_denda = $denda + $row['nominal_denda'];

        if ($nominal_pembayaran < $nilai_angsuran) {
            if ($row['deposit']) {
                if ($total_deposit >= $nilai_angsuran) {
                    mysqli_query($koneksi, "UPDATE angsuran SET deposit='0' WHERE id_angsuran=$id_angsuran");
                    mysqli_query($koneksi, "INSERT INTO pembayaran (id_angsuran, nominal_pembayaran, nominal_denda)
                                            VALUES ('$id_angsuran', '$nilai_angsuran', '$nominal_denda') ");
                } else {
                    mysqli_query($koneksi, "UPDATE angsuran SET deposit='$total_deposit' WHERE id_angsuran=$id_angsuran");
                }
            } else {
                mysqli_query($koneksi, "UPDATE angsuran SET deposit='$nominal_pembayaran' WHERE id_angsuran=$id_angsuran");
            }
        } else if ($nominal_pembayaran == $nilai_angsuran) {
            if ($row['nominal_denda']) {
                mysqli_query($koneksi, "INSERT INTO pembayaran (id_angsuran, nominal_pembayaran, nominal_denda)
                                          VALUES ('$id_angsuran', '$nominal_pembayaran', '$tambah_denda') ");
                //   var_dump("INSERT INTO pembayaran (id_angsuran, nominal_pembayaran, nominal_denda)
                //   VALUES ('$id_angsuran', '$nominal_pembayaran', '$tambah_denda') ");die;
            } else {
                mysqli_query($koneksi, "INSERT INTO pembayaran (id_angsuran, nominal_pembayaran, nominal_denda)
                                          VALUES ('$id_angsuran', '$nominal_pembayaran', '$denda') ");
            }
        } else if ($nominal_pembayaran > $nilai_angsuran) {
            $sisa_depo = $nominal_pembayaran % $nilai_angsuran;
            $deposit = $row['deposit'];
            $total_deposit1 = $sisa_depo + $deposit;

            if ($sisa_depo) {
                if ($total_deposit1 >= $nilai_angsuran) {
                    mysqli_query($koneksi, "UPDATE angsuran SET deposit='$0' WHERE id_angsuran=$id_angsuran");
                    $angsuran_terbayar = 0;

                    $uang = $nominal_pembayaran + $total_deposit1;
                    do {
                        $uang = $uang - $nilai_angsuran;
                        $angsuran_terbayar++;
                    } while ($uang >= $nilai_angsuran);


                    for ($angsuran_terbayar; $angsuran_terbayar > 0; $angsuran_terbayar--) {
                        $sql = mysqli_query($koneksi, "INSERT INTO pembayaran (id_angsuran, nominal_pembayaran, nominal_denda)
                                                                VALUES ('$id_angsuran', '$total_deposit1', '$nominal_denda') ");
                    }
                } else {
                    mysqli_query($koneksi, "UPDATE angsuran SET deposit='$total_deposit1' WHERE id_angsuran=$id_angsuran");
                    $angsuran_terbayar = 0;

                    $uang = $nominal_pembayaran;

                    do {
                        $uang = $uang - $nilai_angsuran;
                        $angsuran_terbayar++;
                    } while ($uang >= $nilai_angsuran);


                    for ($angsuran_terbayar; $angsuran_terbayar > 0; $angsuran_terbayar--) {
                        $sql = mysqli_query($koneksi, "INSERT INTO pembayaran (id_angsuran, nominal_pembayaran, nominal_denda)
                                                                VALUES ('$id_angsuran', '$nilai_angsuran', '$nominal_denda') ");
                    }
                }
            } else {
                $angsuran_terbayar = 0;

                $uang = $nominal_pembayaran;

                do {
                    $uang = $uang - $nilai_angsuran;
                    $angsuran_terbayar++;
                } while ($uang >= $nilai_angsuran);


                for ($angsuran_terbayar; $angsuran_terbayar > 0; $angsuran_terbayar--) {
                    $sql = mysqli_query($koneksi, "INSERT INTO pembayaran (id_angsuran, nominal_pembayaran, nominal_denda)
                                                                VALUES ('$id_angsuran', '$nilai_angsuran', '$nominal_denda') ");
                }
            }
        }
    }

    ?>
    <script type="text/javascript">
        window.location = "?page=list_tagihan";
    </script>

<?php } ?>


<!-- AWAL BOX -->
<div class="box box-primary box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">
            <?php
            echo $no_kontrak . " - " . $nama_konsumen;

            // $sql = mysqli_query($koneksi, "SELECT * FROM pembayaran 
            //                               JOIN angsuran ON pembayaran.id_angsuran = angsuran.id_angsuran ");
            // $row = mysqli_fetch_assoc($sql);

            ?>

        </h3>
    </div>
    <div class="box-body">
        <div class="row ">
            <div class="col-md-12">

                <form method="POST">

                    <div class="form-group">
                        <label>Kondisi Konsumen :</label>
                        <select name="konsumen" class="form-control">
                            <option value="Ada">---Pilih Kondisi Unit---</option>
                            <option value="Ada">Ada</option>
                            <option value="Tidak Ada">Tidak Ada</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Kondisi Unit :</label>
                        <select name="kondisi_unit" class="form-control">
                            <option value="Ada">---Pilih Kondisi Unit---</option>
                            <option value="Ada">Ada</option>
                            <option value="Tidak Ada">Tidak Ada</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Realisasi :</label>
                        <select name="realisasi" class="form-control" id="realisasi">
                            <option value="#">---Pilih Kategori---</option>
                            <option value="Bayar Via Kolektor">Bayar Via Kolektor</option>
                            <option value="Janji Bayar">Janji Bayar</option>
                            <option value="Sudah Bayar">Sudah Bayar</option>
                        </select>
                    </div>

                    <div class="form-group" id="form-tanggal-janji" style="display: none">
                        <label>Tanggal Janji Bayar</label>
                        <input type="date" class="form-control" name="tgl_janji_bayar" id="tgl_janji_bayar" />
                    </div>

                    <div class="form-group" id="form-via" style="display: none">
                        <label>Via</label>
                        <select name="via" class="form-control" id="via">
                            <option value="Payment Point">Payment Point</option>
                            <option value="Transfer">Transfer</option>
                            <option value="Cash">Cash</option>
                        </select>
                    </div>

                    <div class="form-group" id="form-tunggak-angsuran" style="display: none">
                        <label>Jumlah Angsuran Tertunggak</label>
                        <input type="text" class="form-control" name="nominal_tunggakan" id="nominal_tunggakan" readonly value="<?= rupiah($nominal_tunggakan) ?>" />
                    </div>

                    <div class="form-group" id="form-denda-angsuran" style="display: none">
                        <label>Denda Keterlambatan</label>
                        <input type="text" class="form-control" name="nominal_denda" id="nominal_denda" readonly value="<?= rupiah($total_denda - $data['nominal_denda']) ?>" />
                    </div>

                    <div class="form-group" id="form-deposit" style="display: none">
                        <label>Nilai Deposit</label>
                        <input type="text" class="form-control" name="deposit" id="deposit" readonly value="<?= rupiah($data['deposit']) ?>" />
                    </div>

                    <div class="form-group" id="form-bayar-angsuran" style="display: none">
                        <label>Nominal Yang Dibayarkan</label>
                        <input type="text" class="form-control" name="nominal_pembayaran" id="nominal_pembayaran" />
                    </div>

                    <div class="form-group" id="form-angsuran-ke" style="display: none">
                        <label>Pembayaran Angsuran Ke-</label>
                        <input type="text" class="form-control" name="angsuran_ke" id="angsuran_ke" />
                    </div>

                    <div class="form-group" id="form-bayar-denda" style="display: none">
                        <label>Bayar Denda</label>
                        <input type="text" class="form-control" name="denda" id="denda" />
                    </div>

                    <div>
                        <input type="submit" name="kirim" id='kirim' value="Kirim Data" class="btn btn-primary">
                        <input type="submit" name="kirim" id='back' value="Back" class="btn btn-danger">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script defer="defer">
    // A $( document ).ready() block.
    $(function() {

        $('#realisasi').on('change', function() {
            // console.log(this)
            let realisasi = $(this).val()
            // alert(realisasi)
            if (realisasi === 'Janji Bayar') {
                $('#form-tunggak-angsuran').hide()
                $('#form-denda-angsuran').hide()
                $('#form-deposit').hide()
                $('#form-bayar-angsuran').hide()
                $('#form-angsuran-ke').hide()
                $('#form-bayar-denda').hide()
                $('#form-tanggal-janji').show()
                $('#form-via').show()
            } else if (realisasi === 'Bayar Via Kolektor') {
                $('#form-tanggal-janji').hide()
                $('#form-via').hide()
                $('#form-tunggak-angsuran').show()
                $('#form-denda-angsuran').show()
                $('#form-deposit').show()
                $('#form-bayar-angsuran').show()
                $('#form-angsuran-ke').show()
                $('#form-bayar-denda').show()
            } else {
                $('#form-tunggak-angsuran').hide()
                $('#form-denda-angsuran').hide()
                $('#form-deposit').hide()
                $('#form-bayar-angsuran').hide()
                $('#form-angsuran-ke').hide()
                $('#form-bayar-denda').hide()
                $('#form-tanggal-janji').hide()
                $('#form-via').hide()
            }
        })
    });
    $('#kirim').on('click', function() {
        var a = "<?= isset($_GET['id_tagihan']) ? $_GET['id_tagihan'] : ""; ?>"
        var b = $('#angsuran_ke').val()
        var c = $('#nominal_pembayaran').val()
        var d = $('#denda').val()
        let realisasi = $('#realisasi').val()
        if (realisasi === 'Bayar Via Kolektor') {
            window.open(`?page=list_tagihan&action=nota&id_tagihan=${a}&angsuran_ke=${b}&nominal_pembayaran=${c}&denda=${d}`)
        }
    })
    $('#back').on('click', function() {
        window.history.go(-1)
    })
</script>