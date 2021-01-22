<?php include "koneksi.php"; ?>
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
                        <a  class="active-menu" href="kamar.php"><i class="fa fa-hospital-o pointer mrten mlten"></i> Data Kamar</a>
                    </li>
                    <li>
                        <a href="transaksi.php"><i class="fa fa-book pointer mrten mlten"></i> Transaksi</a>
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
    <div class="panel panel-default">
    <div class="panel-heading">
    <h1 align="center">Data Kamar</h1>
    </div> 
    <div class="panel-body">
    <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
     <?php
        $sqledit=mysqli_query($koneksi, "SELECT * FROM kamar WHERE id_kamar='$_GET[id]'");
        $e=mysqli_fetch_array($sqledit);
        ?>
        <h3>Edit Data Kamar</h3>
        <form method="post" action="">
            <input type="hidden" name="id_kamar" value="<?php echo $e['id_kamar']; ?>" />
            <table>

                <tr>
                    <td>Nama Kamar</td>
                    <td><input type="text" name="nama_kamar" value="<?php echo $e['nama_kamar']; ?>" /></td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td><input type="text" name="kelas" value="<?php echo $e['kelas']; ?>" /></td>
                </tr>
                <tr>
                    <td>Tarif</td>
                    <td><input type="text" name="tarif" value="<?php echo $e['tarif']; ?>" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Update" /></td>
                </tr>
                <tr>
                     <td><a href="kamar.php">Kembali ke Data Kamar</a></td>
                </tr>
            </table>
        </form>

        <?php
        if($_SERVER['REQUEST_METHOD']=='POST'){
            //variabel dari elemen form
            $id     = $_POST['id_kamar'];
            $nama   = $_POST['nama_kamar'];
            $kelas   = $_POST['kelas'];
            $tarif   = $_POST['tarif'];
            
            if($nama==''){
                echo "Form belum lengkap!!!";
            }else{
                //proses edit data dokter
                $edit = mysqli_query($koneksi, "UPDATE kamar SET nama_kamar='$nama' WHERE id_kamar='$id'");
                $edit = mysqli_query($koneksi, "UPDATE kamar SET kelas='$kelas' WHERE id_kamar='$id'");
                $edit = mysqli_query($koneksi, "UPDATE kamar SET tarif='$tarif' WHERE id_kamar='$id'");
                
                if(!$edit){
                    echo "Edit data gagal!!";
                }else{
                    echo "Data Berhasil Dirubah Silahkan Kembali ke Data Kamar";
                }
            }
        }
        ?>
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