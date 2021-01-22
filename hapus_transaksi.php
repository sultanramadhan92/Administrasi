<?php
	include "koneksi.php";
	$hapus = mysqli_query($koneksi, "DELETE FROM transaksi WHERE id_transaksi='$_GET[id]'");
	
	if($hapus){
		header('location:transaksi.php');
	}else{
		echo "Hapus data gagal<br>
			<a href='transaksi.php'><<< Kembali</a>";
}
?>