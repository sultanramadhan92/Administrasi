<?php
include("koneksi.php");
include("fungsi_indotgl.php");
include("fungsi_rupiah.php");
?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administrasi Rumah Sakit</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	</head>
	<body>
	 <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
		<div class='container' style='margin-top:70px'>
			<div class='row' style='min-height:1200px'>
				<div class='col-md-12'>
					<div class='panel panel-success'>
						<div class='panel-heading'> <a href="print_transaksi.php">Cetak Laporan</a></div>
						<div class='panel-body'>
							<center>
								<h3></h3>
								<h3>Laporan Administrasi Rawat Inap Rumah Sakit</h3>
								<p>&nbsp;</p>
							</center>

							<table class="table table-hover table-bordered">
							  <thead>
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
						</div>
					</div>
				</div>
			</div>
		</div>
	<script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.metisMenu.js"></script>
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <script src="assets/js/custom-scripts.js"></script>
	</body>
</html>