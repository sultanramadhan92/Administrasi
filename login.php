<?php include "header_login.php" ?>

<body class="bg-white">
    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                        <img class="align-content" src="" alt="">
                    </a>
                </div>
                <div class="login-form">
                    <form method="post" action="">
            <table>
                <h4>LOGIN</h4>
                <form>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                            <label class="pull-right">
                                <a href="reset.php">Forgotten Password?</a>
                            </label>

                        </div>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                         <div class="register-link m-t-15 text-center">
                            <p>Don't have account ? <a href="register.php"> Sign Up Here</a></p>
                        </div>
            </table>
        </form>
        <?php
        if($_SERVER['REQUEST_METHOD']=='POST'){
            //variabel untuk menyimpan kiriman dari form
            $user = $_POST['username'];
            $pass = $_POST['password'];
            
            if($user=='' || $pass==''){
                echo "Form belum lengkap!!";
            }else{
                include "koneksi.php";
                $sqlLogin = mysqli_query($koneksi, "SELECT * FROM admin 
                                WHERE username='$user' AND password='$pass'");
                $jml = mysqli_num_rows($sqlLogin);
                $d=mysqli_fetch_array($sqlLogin);
                if($jml > 0){
                    session_start();
                    $_SESSION['login']  = true;
                    $_SESSION['id']     = $d['id_admin'];
                    $_SESSION['username']=$d['username'];
                    
                    header('location:./index.php');
                }else{
                    echo "Username dan Password anda Salah!!!";
                }
            }
        }
        ?>
        
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>
</html>
