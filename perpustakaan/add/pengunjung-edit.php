<?php
include('../include/config.php');

if (isset($_GET['id_pengunjung']))

    $id_pengunjung = $_GET['id_pengunjung'];

$sql = "SELECT * FROM pengunjung WHERE id_pengunjung = $id_pengunjung";
$query = mysqli_query($db, $sql);

if (mysqli_num_rows($query) == 0) {
    echo '<script>alert("data tidak ditemukan"); document.location="../show/pengunjung.php"</script>';
    exit();
} else {
    $pengunjung = mysqli_fetch_assoc($query);
}

if (isset($_POST['simpan'])) {
    $nik = $_POST['nik'];
    $nama_pengunjung = $_POST['nama_pengunjung'];
    $no_hp = $_POST['no_hp'];
    $pekerjaan = $_POST['pekerjaan'];

    $sql = "UPDATE pengunjung SET nik='$nik', nama_pengunjung='$nama_pengunjung', no_hp='$no_hp',pekerjaan='$pekerjaan' WHERE id_pengunjung = $id_pengunjung";
    $query = mysqli_query($db, $sql);

    if ($query) {
        echo '<script>alert("berhasil"); document.location="../show/pengunjung.php"</script>';
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
                            <h3 class="card-title">Ubah Info Pengunjung</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nik">NIK :</label>
                                    <input type="text" class="form-control" name="nik" id="nik" minlength="16" maxlength="16" value="<?= $pengunjung['nik']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="nama_pengunjung">Nama Pengunjung :</label>
                                    <input type="text" class="form-control" name="nama_pengunjung" id="nama_pengunjung" value="<?= $pengunjung['nama_pengunjung']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="no_hp">Number HP :</label>
                                    <input type="text" class="form-control" name="no_hp" id="no_hp" minlength="11" maxlength="13" value="<?= $pengunjung['no_hp']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="pekerjaan">Pekerjaan :</label>
                                    <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" value="<?= $pengunjung['pekerjaan']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="id_petugas">ID Petugas :</label>
                                    <input class="form-control" name="id_petugas" id="id_petugas" value="<?= $pengunjung['id_petugas']; ?>" disabled>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
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