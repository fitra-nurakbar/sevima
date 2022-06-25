<?php include("../show-bar/navbar.php"); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Peminjam</h1>
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
              <h3 class="card-title">Data Table Peminjaman</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>NO</th>
                    <th>NIK</th>
                    <th>NAMA PEMINJAM</th>
                    <th>TANGGAL PEMINJAMAN</th>
                    <th>SERIAL</th>
                    <th>KELOLA</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql = "SELECT * FROM peminjam NATURAL JOIN pengunjung NATURAL JOIN buku";
                  $query = mysqli_query($db, $sql);
                  $no = 1;
                  while ($peminjam = mysqli_fetch_array($query)) :
                  ?>
                    <tr>
                      <th><?= $no; ?></th>
                      <td><?= $peminjam['nik']; ?></td>
                      <td><?= $peminjam['nama_pengunjung']; ?></td>
                      <td><?= $peminjam['tanggal_pinjam']; ?></td>
                      <td><?= $peminjam['serial']; ?></td>
                      <td>
                        <a class="badge bg-success" href="../add/peminjam-edit.php?id_peminjam=<?= $peminjam['id_peminjam'] ?>">Edit</a>
                        <a class="badge bg-danger" href="../add/peminjam-hapus.php?id_peminjam=<?= $peminjam['id_peminjam'] ?>" onclick="return confirm('Apakah data mau di hapus?')">Hapus</a>
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
                    <th>NAMA PEMINJAM</th>
                    <th>TANGGAL PEMINJAMAN</th>
                    <th>SERIAL</th>
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