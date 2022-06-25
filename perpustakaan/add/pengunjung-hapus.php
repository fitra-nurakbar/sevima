<?php 
include("../include/config.php");

if( isset($_GET['id_pengunjung'])){

    $id_pengunjung = $_GET['id_pengunjung'];

    $sql = "DELETE FROM pengunjung WHERE id_pengunjung = $id_pengunjung";
    $query = mysqli_query($db, $sql);

    if($query){
        echo "<script>alert('Data berhasil di hapus.'); document.location.href = '../show/pengunjung.php';</script>";
    } else {
        echo "<script>alert('Data gagal di hapus.'); document.location.href = '../show/pengunjung.php';</script>";
    }
}

?>