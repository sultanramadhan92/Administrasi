<html>
<head>
	<title>Print Data</title>
</head>
<body>

	<center>

		<h4>Laporan Administrasi Rumah Sakit Rawat Inap</a></h4>

	</center>

	<?php 
	include 'koneksi.php';
	include("fungsi_indotgl.php");
	include("fungsi_rupiah.php");
	?>

	<table border="1" style="width: 100%">
								<tr>
								  <th>No</th>
								  <th>Nama Pasien</th>
								  <th>Alamat</th>
								  <th>Nama Kamar</th>
								  <th>Tarif</th>
								  <th>Total Hari</th>
								  <th>Nama Obat</th>
								  <th>Harga Obat</th>					
								  <th>Total</th>
								</tr>
							  </thead>
							  <tbody>
								<?php
									$no = 1;
									$total_semua = 0;
									$sqlquery = ("SELECT transaksi.total_hari,data_pasien.nama_pasien,data_pasien.alamat,kamar.nama_kamar,kamar.tarif,transaksi.total_hari,obat.nama_obat,obat.harga
									from transaksi
									inner join data_pasien on transaksi.no_rekammedis_inap=data_pasien.no_rekammedis_inap
									inner join kamar on transaksi.id_kamar=kamar.id_kamar
									inner join obat on transaksi.id_obat=obat.id_obat");
									if ($result = mysqli_query($koneksi, $sqlquery)) {
										while ($row = mysqli_fetch_assoc($result)) {
										$total = ($row["tarif"] * $row["total_hari"] + $row["harga"]);
										$total_semua += $total;
								?>
								<tr>
								<td><?php echo $no ?></td>
								<td><?php echo $row["nama_pasien"];?></td>
								<td><?php echo $row["alamat"];?></td>
								<td><?php echo $row["nama_kamar"];?></td>
								<td><?php echo rupiah($row["tarif"]);?></td>
								<td><?php echo $row["total_hari"];?></td>
								<td><?php echo $row["nama_obat"];?></td>
								<td><?php echo rupiah($row["harga"]);?></td>
								<td><?php echo rupiah($total);?></td>
								</tr>
								<?php
									$no++;}
								?>
								<tr>
								<td colspan='8'>Jumlah Total</td>
								<td colspan='2'><?php echo rupiah($total_semua); ?></td>
								</tr>
								<?php
										mysqli_free_result($result);
									}
									mysqli_close($koneksi);
									?>
							  </tbody>
							</table>
		<table width="100%">
		<tr>
		<td></td>
		<td></td>
		<td width="200px">
			<p> Rumah Sakit, <?php echo date('d/m/y') ?><br/>
			Administrasi,</p>
			<br/>
			<br/>
			<p>__________________</p>
		</td>
	</tr>
	</div>
	<script>
		window.print();
	</script>

</body>
</html>