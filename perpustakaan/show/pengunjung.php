<?php include("../show-bar/navbar.php"); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Pengunjung</h1>
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
              <h3 class="card-title">Data Table Pengunjung</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>NO</th>
                    <th>NIK</th>
                    <th>NAMA PENGUNJUNG</th>
                    <th>NO HP</th>
                    <th>PEKERJAAN</th>
                    <th>KELOLA</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql = "SELECT * FROM pengunjung";
                  $query = mysqli_query($db, $sql);
                  $no = 1;
                  while ($pengunjung = mysqli_fetch_array($query)) :
                  ?>
                    <tr>
                      <th><?= $no; ?></th>
                      <td><?= $pengunjung['nik']; ?></td>
                      <td><?= $pengunjung['nama_pengunjung']; ?></td>
                      <td><?= $pengunjung['no_hp']; ?></td>
                      <td><?= $pengunjung['pekerjaan']; ?></td>
                      <td>
                        <a class="badge bg-success" href="../add/pengunjung-edit.php?id_pengunjung=<?= $pengunjung['id_pengunjung'] ?>">Edit</a>
                        <a class="badge bg-danger" href="../add/pengunjung-hapus.php?id_pengunjung=<?= $pengunjung['id_pengunjung'] ?>" onclick="return confirm('Apakah data mau di hapus?')">Hapus</a>
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
                    <th>NIK</th>
                    <th>NAMA PENGUNJUNG</th>
                    <th>NO HP</th>
                    <th>PEKERJAAN</th>
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