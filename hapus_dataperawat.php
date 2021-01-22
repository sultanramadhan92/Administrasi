<?php
	include "koneksi.php";
	$hapus = mysqli_query($koneksi, "DELETE FROM data_perawat WHERE id_perawat='$_GET[id]'");
	
	if($hapus){
		header('location:dataperawat.php');
	}else{
		echo "Hapus data gagal<br>
			<a href='dataper.php'><<< Kembali</a>";
}
?>