<!DOCTYPE html>
<html>
<head>
	<title>CRUD PHP dan MySQLi</title>
</head>
<body>

	<h2>CRUD DATA PASIEN </h2>	
	<table border="1">
		<tr>
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
  $sql = mysqli_query($koneksi,"SELECT *  FROM data_pasien");
  $no=1;
  while($a=mysqli_fetch_array($sql)){
    echo "<tr>
      <td>$a[no_rekammedis_inap]</td>
      <td>$a[nama_pasien]</td>
      <td>$a[jenis_kelamin]</td>
      <td>$a[alamat]</td>
      <td>$a[umur]</td>
      <td>$a[tgl_masuk]</td>
      <td>$a[penanggung_jawab]</td>
      <td>$a[telepon_penanggungjawab]</td>
      <td> Edit | Delete </td>
      
    </tr>";
    $no++;
  }
  ?>
	</table>
</body>
</html>