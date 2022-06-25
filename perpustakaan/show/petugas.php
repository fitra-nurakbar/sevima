<?php include("../show-bar/navbar.php"); ?>
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
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Table Petugas</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>NO</th>
                    <th>ID PETUGAS</th>
                    <th>NAMA PETUGAS</th>
                    <th>TUGAS</th>
                    <th>HARI</th>
                    <th>SHIFT</th>
                    <th>KELOLA</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql = "SELECT * FROM petugas NATURAL JOIN tugas NATURAL JOIN hari NATURAL JOIN shift ";
                  $query = mysqli_query($db, $sql);
                  $no = 1;
                  while ($petugas = mysqli_fetch_array($query)) :
                  ?>
                    <tr>
                      <th><?= $no; ?></th>
                      <td><?= $petugas['id_petugas']; ?></td>
                      <td><?= $petugas['nama_petugas']; ?></td>
                      <td><?= $petugas['pilih_tugas']; ?></td>
                      <td><?= $petugas['pilih_hari']; ?></td>
                      <td><?= $petugas['pilih_shift']; ?></td>
                      <td>
                        <a class="badge bg-success" href="../add/petugas-edit.php?id_petugas=<?= $petugas['id_petugas'] ?>">Edit</a>
                        <a class="badge bg-danger" href="../add/petugas-hapus.php?id_petugas=<?= $petugas['id_petugas'] ?>" onclick="return confirm('Apakah data mau di hapus?')">Hapus</a>
                      </td>
                    </tr>
                  <?php
                    $no++;
                  endwhile;
                  ?>

                </tbody>
                <tfoot>
                  <tr>
                    <th>NO</th>
                    <th>ID PETUGAS</th>
                    <th>NAMA PETUGAS</th>
                    <th>TUGAS</th>
                    <th>HARI</th>
                    <th>SHIFT</th>
                    <th>KELOLA</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include("../show-bar/footer.php"); ?>