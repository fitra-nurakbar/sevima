<?php
include('../include/config.php');

if (isset($_POST['tambah'])) {
  $id_pengunjung = $_POST['id_pengunjung'];
  $tanggal_pinjam = date('Y/m/d H:i:s');
  $id_buku = $_POST['id_buku'];

  $sql = "INSERT INTO peminjam (id_pengunjung, tanggal_pinjam, id_buku) VALUE ('$id_pengunjung', '$tanggal_pinjam', '$id_buku')";
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
              <h3 class="card-title">Pinjam Buku</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            <form action="" method="post">
              <div class="card-body">
                <div class="form-group">
                  <label for="id_pengunjung">Nama Peminjam :</label>
                  <select class="form-control" name="id_pengunjung" id="id_pengunjung" required>
                    <option value="" selected>Pilih</option>
                    <?php 
                    $sql = "SELECT * FROM pengunjung";
                    $query = mysqli_query($db, $sql);
                    foreach($query as $data) :
                    ?>
                    <option value="<?= $data['id_pengunjung']; ?>">
                      <?= $data['nama_pengunjung']; ?>
                      <?= $data['no_hp']; ?>
                    </option>
                    <?php endforeach; ?>     
                  </select>
                </div>
                <div class="form-group">
                  <label for="id_buku">Serial Buku :</label>
                  <select class="form-control" name="id_buku" id="id_buku">
                    <option value="" selected>Pilih</option>
                    <?php 
                    $sql = "SELECT * FROM buku";
                    $query = mysqli_query($db, $sql);
                    foreach($query as $data) :
                    ?>
                      <option value="<?= $data['id_buku'] ?>">
                        <?= $data['serial']; ?>
                        <?= $data['judul_buku']; ?>
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