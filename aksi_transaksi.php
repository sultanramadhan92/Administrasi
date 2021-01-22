<?php
include("koneksi.php");

$act=$_GET['act'];

if ($act=='input'){
	$id = $_POST['no_rekammedis_inap'];
	$id_kamar = $_POST['id_kamar'];
	$id_obat = $_POST['id_obat']
	$hari = $_POST['total_hari'];

	$sql = "INSERT INTO transaksi VALUES ('','$id','$id_kamar','id_obat', '$hari')";
	$aksi =mysqli_query($koneksi, $sql);

	if($aksi)
	{
	header('location:laporan.php');
	}
	else {echo "gagal";}

}
