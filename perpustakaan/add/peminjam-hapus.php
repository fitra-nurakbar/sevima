<?php
include("../include/config.php");

if (isset($_GET['id_peminjam'])) {

    $id_peminjam = $_GET['id_peminjam'];

    $sql = "DELETE FROM peminjam WHERE id_peminjam = '$id_peminjam'";
    $query = mysqli_query($db, $sql);

    if ($query) {
        echo "<script>alert('Data berhasil di hapus.'); document.location.href = '../show/peminjam.php';</script>";
    } else {
        echo "<script>alert('Data gagal di hapus.'); document.location.href = '../show/peminjam.php';</script>";
    }
}
