<html>
<head>
	<title>Print Data</title>
</head>
<body>
	<center>
		<h4>DATA PASIEN RUMAH SAKIT</a></h4>
	</center>
	<?php 
	include 'koneksi.php';
	?>

	<table border="1" style="width: 100%">
		<tr>
		   <th width="1%">No</th>
		   <th>No Rekam Medis Inap</th>
           <th>Nama Pasien</th>
           <th>Jenis Kelamin</th>
           <th>Alamat</th>
           <th>Umur</th>
           <th>Tanggal Masuk</th>
           <th>Penanggung Jawab</th>
           <th>Telepon Penanggung Jawab</th>
		</tr>
	 <?php 
            $no = 1;
            $sql = mysqli_query($koneksi,"select * from data_pasien");
            while($data = mysqli_fetch_array($sql)){
            ?>
            <tr>
                <td align="center"><?php echo $no++; ?></td>
                <td align="center"><?php echo $data['no_rekammedis_inap']; ?></td>
                <td align="center"><?php echo $data['nama_pasien']; ?></td>
                <td align="center"><?php echo $data['jenis_kelamin']; ?></td>
                <td align="center"><?php echo $data['alamat']; ?></td>
                <td align="center"><?php echo $data['umur']; ?></td>
                <td align="center"><?php echo $data['tgl_masuk']; ?></td>
                <td align="center"><?php echo $data['penanggung_jawab']; ?></td>
                <td align="center"><?php echo $data['telepon_penanggungjawab']; ?></td>
            </tr> 
            <?php 
            }
            ?>
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
</table>
	<script>
		window.print();
	</script>

</body>
</html>