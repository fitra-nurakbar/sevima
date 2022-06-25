<?php
include('../include/config.php');

if (isset($_GET['id_peminjam']))

    $id_peminjam = $_GET['id_peminjam'];

$sql = "SELECT * FROM peminjam WHERE id_peminjam = $id_peminjam";
$query = mysqli_query($db, $sql);

if (mysqli_num_rows($query) == 0) {
    echo '<script>alert("data tidak ditemukan"); document.location="../show/peminjam.php"</script>';
    exit();
} else {
    $peminjam = mysqli_fetch_assoc($query);
}

if (isset($_POST['simpan'])) {
    $id_pengunjung = $_POST['id_pengunjung'];
    $id_buku = $_POST['id_buku'];

    $sql = "UPDATE peminjam SET id_pengunjung='$id_pengunjung', id_buku='$id_buku' WHERE id_peminjam = $id_peminjam";
    $query = mysqli_query($db, $sql);

    if ($query) {
        echo '<script>alert("berhasil"); document.location="../show/peminjam.php"</script>';
    } else {
        echo '<script>alert("Gagal melakukan proses ubah data.")</script>';
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
                    <h1>Edit</h1>
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
                            <h3 class="card-title">Ubah Info peminjam</h3>
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
                                        <option value="<?= $peminjam['id_buku']; ?>" selected></option>
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
                                <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
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