<?php
session_start();
if(!isset($_SESSION['login'])){
    header('location:login.php');
}

include "koneksi.php";
include("fungsi_indotgl.php");
include("fungsi_rupiah.php");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
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
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Admin</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                  
                    <li>
                        <a href="index.php"><i class="fa fa-home pointer mrten mlten"></i> Dashboard</a>
                    </li>
                    
                    <li>
                        <a href="datapasien.php"><i class="fa fa-wheelchair pointer mrten mlten"></i> Data Pasien</a>
                    </li>
                    <li>
                        <a href="datadokter.php"><i class="fa fa-user-md pointer mrten mlten"></i> Data Dokter</a>
                    </li>
                    <li>
                        <a href="dataperawat.php"><i class="fa fa-user pointer mrten mlten"></i> Data Perawat</a>
                    </li>
                    <li>
                        <a href="obat.php"><i class="fa fa-medkit pointer mrten mlten"></i> Obat</a>
                    </li>
                    <li>
                        <a href="kamar.php"><i class="fa fa-hospital-o pointer mrten mlten"></i> Data Kamar</a>
                    </li>
                    <li>
                        <a class="active-menu" href="transaksi.php"><i class="fa fa-book pointer mrten mlten"></i> Transaksi</a>
                    </li>
                    <li>
                        <a href="laporan.php"><i class="fa fa-book pointer mrten mlten"></i> Laporan Transaksi</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Sistem Administrasi Rumah Sakit
                        </h1>
                    </div>
                </div>
                <!-- /. ROW  -->
        <title>Tambah Data Transaksi</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div class="panel panel-default">
    <div class="panel-heading">
    <h1 align="center">Data Transaksi</h1>
    </div> 
    <div class="panel-body">
    <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
   <form method="post" action="">
                            <form method='post' action='aksi_transaksi.php?act=input'>
                                <div class='form-group'>

                                    <label>Pilih No Rekam Medis Inap</label>
                                    <select name='no_rekammedis_inap' class='form-control'>
                                    <?php
                                    $sqlquery = "SELECT * FROM data_pasien";
                                    if ($result = mysqli_query($koneksi, $sqlquery)) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $id = $row["no_rekammedis_inap"];
                                            $nama = $row["nama_pasien"];
                                            echo "<option value='$id'>$id</option>";
                                        }
                                        mysqli_free_result($result);
                                    }
                                    ?>
                                    </select>

                                </div>
                                <div class='form-group'>
                                    <label>Pilih ID kamar</label>
                                    <select name='id_kamar' class='form-control'>
                                    <?php
                                    $sqlquery = "SELECT * FROM kamar";
                                    if ($result = mysqli_query($koneksi, $sqlquery)) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $id_kamar = $row["id_kamar"];
                                            $nama = $row["nama_kamar"];
                                            echo "<option value='$id_kamar'>$id_kamar</option>";
                                        }
                                        mysqli_free_result($result);
                                    }
                                    ?>
                                    </select>
                                    </select>
                                </div>
                                  <div class='form-group'>
                                    <label>Nama ID Obat</label>
                                    <select name='id_obat' class='form-control'>
                                    <?php
                                    $sqlquery = "SELECT * FROM obat";
                                    if ($result = mysqli_query($koneksi, $sqlquery)) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $id = $row["id_obat"];
                                            $nama = $row["nama_obat"];
                                            echo "<option value='$id'>$id</option>";
                                        }
                                        mysqli_free_result($result);
                                    }
                                    ?>
                                    </select>
                                    </select>
                                </div>
                                <div class='form-group'>
                                    <label>Total Hari Dirawat</label>
                                    <input type='number' name='total_hari' class='form-control' required/>
                                </div>
                                <button type='submit' value="simpan" class='btn btn-danger'>Simpan</button>
                            </form>
                            <?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    //variabel dari elemen form
    $id= mysqli_real_escape_string($koneksi, $_POST['no_rekammedis_inap']);
    $kamar = mysqli_real_escape_string($koneksi, $_POST['id_kamar']);
    $obat = mysqli_real_escape_string($koneksi, $_POST['id_obat']);
    $hari = mysqli_real_escape_string($koneksi, $_POST['total_hari']);
    
    if($nama==''){
        echo "Form belum lengkap!!!";
    }else{
        //proses simpan data dokter
        $simpan = mysqli_query($koneksi, "INSERT INTO transaksi(no_rekammedis_inap,id_kamar,id_obat,total_hari) VALUES ('$id','$kamar','$obat','$hari')");
        
        if(!$simpan){
            echo "Simpan data gagal!!";
        }else{
            echo "Data Berhasil Disimpan";
        }
    }
}
?>
 <div class="panel-body">
    <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
       <thead>
       <tr>
           <th>ID Transaksi</th>
           <th>NO Rekam Medis Inap</th>
           <th>ID Kamar</th>
           <th>ID Obat</th>
           <th>Total hari</th>
            <th>Aksi</th>
       </tr>
     </thead>
<?php
  $sql = mysqli_query($koneksi,"SELECT *  FROM transaksi");
  $no=1;
  while($a=mysqli_fetch_array($sql)){
    echo "<tr>
      <td>$a[id_transaksi]</td>
      <td>$a[no_rekammedis_inap]</td>
      <td>$a[id_kamar]</td>
      <td>$a[id_obat]</td>
      <td>$a[total_hari]</td>
      <td>
        <a href='hapus_transaksi.php?id=$a[id_transaksi]'>Hapus</a>
        </td>
    </tr>";
    $no++;
  }
  ?>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
                        </div>
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