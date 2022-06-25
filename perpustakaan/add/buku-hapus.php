<?php 
include("../include/config.php");

if( isset($_GET['id_buku'])){

    $id_buku = $_GET['id_buku'];

    $sql = "DELETE FROM buku WHERE id_buku = $id_buku";
    $query = mysqli_query($db, $sql);

    if($query){
        echo "<script>alert('Data berhasil di hapus.'); document.location.href = '../show/buku.php';</script>";
    } else {
        echo "<script>alert('Data gagal di hapus.'); document.location.href = '../show/buku.php';</script>";
    }
}

?>