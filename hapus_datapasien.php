<?php
	include "koneksi.php";
	$hapus = mysqli_query($koneksi, "DELETE FROM data_pasien WHERE no_rekammedis_inap='$_GET[id]'");
	
	if($hapus){
		header('location:datapasien.php');
	}else{
		echo "Hapus data gagal<br>
			<a href='datapasien.php'><<< Kembali</a>";
}
?>