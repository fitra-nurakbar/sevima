<?php include("../show-bar/navbar.php"); ?>
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
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Table Buku</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>NO</th>
                    <th>SERIAL</th>
                    <th>STACK</th>
                    <th>JUDUL BUKU</th>
                    <th>PENGARANG</th>
                    <th>PENERBIT</th>
                    <th>TAHUN TERBIT</th>
                    <th>KELOLA</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql = "SELECT * FROM buku NATURAL JOIN stack";
                  $query = mysqli_query($db, $sql);
                  $no = 1;
                  while ($buku = mysqli_fetch_array($query)) :
                  ?>
                    <tr>
                      <th><?= $no; ?></th>
                      <td><?= $buku['serial']; ?></td>
                      <td><?= $buku['nama_stack']; ?></td>
                      <td><?= $buku['judul_buku']; ?></td>
                      <td><?= $buku['pengarang']; ?></td>
                      <td><?= $buku['penerbit']; ?></td>
                      <td><?= $buku['tahun_terbit']; ?></td>
                      <td>
                        <a class="badge bg-success" href="../add/buku-edit.php?id_buku=<?= $buku['id_buku']; ?>">Edit</a>
                        <a class="badge bg-danger" href="../add/buku-hapus.php?id_buku=<?= $buku['id_buku']; ?>" onclick="return confirm('Apakah data mau di hapus?')">Hapus</a>
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
                    <th>SERIAL</th>
                    <th>STACK</th>
                    <th>JUDUL BUKU</th>
                    <th>PENGARANG</th>
                    <th>PENERBIT</th>
                    <th>TAHUN TERBIT</th>
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