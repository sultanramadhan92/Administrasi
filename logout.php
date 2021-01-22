<?php
session_start();
session_destroy();

//kembali/redirect ke halaman login.php
('location:logout.php');
?>