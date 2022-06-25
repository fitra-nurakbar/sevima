<?php
include('../include/config.php');

if (isset($_POST['tambah'])) {
  $nik = $_POST['nik'];
  $nama_pengunjung = $_POST['nama_pengunjung'];
  $no_hp = $_POST['no_hp'];
  $pekerjaan = $_POST['pekerjaan'];
  $id_petugas = $_POST['id_petugas'];
  
  $sql = "INSERT INTO pengunjung (nik, nama_pengunjung, no_hp, pekerjaan, id_petugas) VALUE ('$nik', '$nama_pengunjung', '$no_hp', '$pekerjaan', '$id_petugas')";
  $query = mysqli_query($db, $sql);

  if ($query) {
    echo "<script>alert('berhasil'); document.location.href = '#';</script>";
  } else {
    echo "<script>alert('Gagal melakukan proses tambah data.'); document.location.href = '#';</script>";
  }
}
?>
<?php include("../add-bar/navbar.php"); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Daftar</h1>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="col">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Pendaftaran pengunjung</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            <form action="" method="post">
              <div class="card-body">
                <div class="form-group">
                  <label for="nik">NIK :</label>
                  <input type="text" class="form-control" name="nik" id="nik" minlength="16"  maxlength="16" placeholder="NIK">
                </div>
                <div class="form-group">
                  <label for="nama_pengunjung">Nama Pengunjung :</label>
                  <input type="text" class="form-control" name="nama_pengunjung" id="nama_pengunjung" placeholder="Nama Pengunjung">
                </div>
                <div class="form-group">
                  <label for="no_hp">Number HP :</label>
                  <input type="text" class="form-control" name="no_hp" id="no_hp" minlength="11" maxlength="13" placeholder="Number HP">
                </div>
                <div class="form-group">
                  <label for="pekerjaan">Pekerjaan :</label>
                  <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan">
                </div>
                <div class="form-group">
                  <label for="id_petugas">Nama Petugas :</label>
                  <select class="form-control" name="id_petugas" id="id_petugas"  required>
                    <option value="" selected>Pilih</option>
                    <?php
                      $sql = "SELECT * FROM petugas";
                      $query = mysqli_query($db, $sql);
                      foreach($query as $data) :
                    ?>
                      <option value="<?= $data['id_petugas']; ?>">
                        <?= $data['nama_petugas']; ?>
                      </option>
                      <?php endforeach; ?>
                    </select>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <input type="submit" class="btn btn-primary" name="tambah" value="Tambah">
                <input type="reset" class="btn btn-warning" name="reset" value="Reset">
              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<?php include("../add-bar/footer.php"); ?>