<?php
	include "koneksi.php";
	$hapus = mysqli_query($koneksi, "DELETE FROM kamar WHERE id_kamar='$_GET[id]'");
	
	if($hapus){
		header('location:kamar.php');
	}else{
		echo "Hapus data gagal<br>
			<a href='kamar.php'><<< Kembali</a>";
}
?>