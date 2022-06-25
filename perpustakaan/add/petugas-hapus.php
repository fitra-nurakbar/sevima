<?php 
include("../include/config.php");

if( isset($_GET['id_petugas'])){

    $id_petugas = $_GET['id_petugas'];

    $sql = "DELETE FROM petugas WHERE id_petugas = '$id_petugas'";
    $query = mysqli_query($db, $sql);

    if($query){
        echo "<script>alert('Data berhasil di hapus.'); document.location.href = '../show/petugas.php';</script>";
    } else {
        echo "<script>alert('Data gagal di hapus.'); document.location.href = '../show/petugas.php';</script>";
    }
}

?>