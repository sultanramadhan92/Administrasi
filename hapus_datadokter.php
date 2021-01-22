<?php
	include "koneksi.php";
	$hapus = mysqli_query($koneksi, "DELETE FROM data_dokter WHERE id_dokter='$_GET[id]'");
	
	if($hapus){
		header('location:datadokter.php');
	}else{
		echo "Hapus data gagal<br>
			<a href='datadokter.php'><<< Kembali</a>";
}
?>