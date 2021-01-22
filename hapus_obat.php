<?php
	include "koneksi.php";
	$hapus = mysqli_query($koneksi, "DELETE FROM obat WHERE id_obat='$_GET[id]'");
	
	if($hapus){
		header('location:obat.php');
	}else{
		echo "Hapus data gagal<br>
			<a href='obat.php'><<< Kembali</a>";
}
?>