<?php
$server = "localhost";
$user = "udacoding";
$password = "123123";
$nama_database = "perpustakaan";

$db = mysqli_connect($server, $user, $password, $nama_database);
?>
<?php if( !$db ) : ?>
    <script>alert("ERROR : koneksi database gagal!!!")</script>;
<?php endif; ?>
