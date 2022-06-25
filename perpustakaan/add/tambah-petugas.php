<?php
include('../include/config.php');

if (isset($_POST['tambah'])) {
  $nama_petugas = $_POST['nama_petugas'];
  $id_tugas = $_POST['id_tugas'];
  $id_hari = $_POST['id_hari'];
  $id_shift = $_POST['id_shift'];

  $sql = "INSERT INTO petugas (nama_petugas, id_tugas, id_hari, id_shift) VALUE ('$nama_petugas', '$id_tugas', '$id_hari', '$id_shift')";
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
          <h1>Petugas</h1>
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
              <h3 class="card-title">Tambah Petugas</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="" method="post">
              <div class="card-body">
                <div class="form-group">
                  <label for="nama_petugas">Nama Petugas :</label>
                  <input type="text" class="form-control" name="nama_petugas" id="nama_petugas" placeholder="Nama Petugas" required />
                </div>
                <div class="form-group">
                  <label for="id_tugas">Tugas :</label>
                  <select class="form-control" name="id_tugas" id="id_tugas" required>
                    <option value="" selected>Pilih</option>
                    <?php
                    $sql = "SELECT * FROM tugas";
                    $query = mysqli_query($db, $sql);
                    foreach ($query as $data) :
                    ?>
                      <option value="<?= $data['id_tugas'] ?>">
                        <?= $data['pilih_tugas'] ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="id_hari">Hari :</label>
                  <select class="form-control" name="id_hari" id="id_hari" required>
                    <option value="" selected>Pilih</option>
                    <?php
                    $sql = "SELECT * FROM hari";
                    $query = mysqli_query($db, $sql);
                    foreach ($query as $data) :
                    ?>
                      <option value="<?= $data['id_hari'] ?>">
                        <?= $data['pilih_hari'] ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="id_shift">Shift :</label>
                  <select class="form-control" name="id_shift" id="id_shift" required>
                    <option value="" selected>Pilih</option>
                    <?php
                    $sql = "SELECT * FROM shift";
                    $query = mysqli_query($db, $sql);
                    foreach ($query as $data) :
                    ?>
                      <option value="<?= $data['id_shift'] ?>">
                        <?= $data['pilih_shift'] ?>
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