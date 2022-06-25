<?php
include('../include/config.php');

if (isset($_POST['tambah'])) {
  $serial = $_POST['serial'];
  $judul_buku = $_POST['judul_buku'];
  $pengarang = $_POST['pengarang'];
  $penerbit = $_POST['penerbit'];
  $tahun_terbit = $_POST['tahun_terbit'];
  $id_stack = $_POST['id_stack'];

  $sql = "INSERT INTO buku (serial, judul_buku, pengarang, penerbit, tahun_terbit, id_stack) VALUE ('$serial', '$judul_buku', '$pengarang', '$penerbit', '$tahun_terbit', '$id_stack')";
  $query = mysqli_query($db, $sql);

  if ($query) {
    echo "<script>alert('berhasil'); document.location.href = '#';</script>";
  } else {
    echo "<script>alert('Gagal melakukan proses tambah data.'); document.location.href = '#';</script>";
  }
} ?>
<?php include("../add-bar/navbar.php"); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Buku</h1>
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
              <h3 class="card-title">Tambah Buku</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            <form action="" method="post">
              <div class="card-body">
                <div class="form-group">
                  <label for="serial">Serial number:</label>
                  <input type="text" class="form-control" name="serial" id="serial" placeholder="Serial number">
                </div>
                <div class="form-group">
                  <label for="id_stack">Nama Stack :</label>
                  <select class="form-control" name="id_stack" id="id_stack" required>
                    <option value="" selected>Pilih</option>
                    <?php
                    $sql = "SELECT * FROM stack";
                    $query = mysqli_query($db, $sql);
                    foreach($query as $data):
                    ?>
                      <option value="<?= $data['id_stack']; ?>">
                        <?= $data['nama_stack']; ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="judul_buku">Judul Buku :</label>
                  <input type="text" class="form-control" name="judul_buku" id="judul_buku" placeholder="Judul Buku">
                </div>
                <div class="form-group">
                  <label for="pengarang">Pengarang :</label>
                  <input type="text" class="form-control" name="pengarang" id="pengarang" placeholder="Pengarang">
                </div>
                <div class="form-group">
                  <label for="penerbit">Penerbit :</label>
                  <input type="text" class="form-control" name="penerbit" id="penerbit" placeholder="Penerbit">
                </div>
                <div class="form-group">
                  <label for="tahun_terbit">Tahun Terbit :</label>
                  <input type="date" class="form-control" name="tahun_terbit" id="tahun_terbit">
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