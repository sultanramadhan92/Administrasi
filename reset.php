
<?php include "koneksi.php" ?>
<?php include "header_login.php" ?>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="" class="h1"><b>RESET THE </b>PASSWORD</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Tulis Username dan Password Baru Untuk Melakukan Reset Password.</p>
      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="username">
        <div class="input-group-append">
     </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
        <div class="input-group-append">
     </div>
   </div>
</div>

<div class="row">
  <div class="col-12">
    <button type="submit" class="btn btn-primary btn-block">Submit</button>
   </div>
  </div>
</form>
     
<?php
  if($_SERVER['REQUEST_METHOD']=='POST'){
  //variabel dari elemen form
  $user = mysqli_real_escape_string($koneksi, $_POST['username']);
  $pass = mysqli_real_escape_string($koneksi, $_POST['password']);

    if($user==''){
      echo "Form belum lengkap!!!";
        }else{
        //proses simpan data
        $edit = mysqli_query($koneksi, "UPDATE admin SET password='$pass' WHERE username='$user'");
        if(!$edit){
          echo "Simpan data gagal!!";
            }else{
              echo'<script type="text/javascript"> 
                   alert("Data Berhasil Disimpan Silahkan Kembali Ke From Login"); document.location.href = "login.php";
                   </script>';     
            }
        }
    }
?>
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>

                       
    
    

