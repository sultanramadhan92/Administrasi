
<?php
$koneksi = mysqli_connect("localhost","root","","administrasi_rumah_sakit");

if (mysqli_connect_error()) {
	echo "koneksi database gagal :". mysqli_connect_error();
}
?>