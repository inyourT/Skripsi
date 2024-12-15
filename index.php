<?php
session_start();

// koneksi database
include "config.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPD</title>

    <!-- boostrap css -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- datatables css -->
    <link rel="stylesheet" href="assets/css/datatables.min.css">
    <!-- font awasome  -->
    <link rel="stylesheet" href="assets/css/all.css">
    <!-- chosen -->
    <link rel="stylesheet" href="assets/css/bootstrap-chosen.css">
    <!--  -->
    <link rel="stylesheet" href="assets\css\style.css">
    <!-- cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>
<body>
    
<!-- navbar -->
<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
  <ul class="navbar-nav"><li class="nav-item active">
      <a class="nav-link" href="index.php">SehatManis</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="index.php">Home</a>
    </li>

<!-- setting hak akses Dokter -->
    <?php
        if($_SESSION['role']=="Dokter"){
    ?>
    <li class="nav-item active">
      <a class="nav-link" href="?page=gejala">Gejala</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="?page=penyakit">Penyakit</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="?page=aturan">Basis Aturan</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="?page=konsultasiadm">Riwayat Konsultasi</a>
    </li>

<!-- hak akses role ADmin -->
<?php
        }elseif($_SESSION['role']=="Admin"){
?>
    <li class="nav-item active">
      <a class="nav-link" href="?page=users">Pengguna</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="?page=konsultasiadm">Riwayat Konsultasi</a>
    </li>
    
<!-- hak akses pasien -->
 <?php
        }else{
 ?>

    <li class="nav-item active">
      <a class="nav-link" href="?page=konsultasi">Konsultasi</a>
    </li>

<?php
        }
?>
    <li class="nav-item active">
      <a class="nav-link" href="?page=logout">Logout</a>
    </li>
  </ul>
</nav>

<!-- cek status login -->
<?php 
    if($_SESSION['status']!="y"){
        header("Location:login.php");
    }
?>

<!-- container -->
<div class="container mt-2 mb-2">

    <!-- setting menu -->
    <?php

    $page = isset($_GET['page']) ? $_GET['page'] : "";
    $action = isset($_GET['action']) ? $_GET['action'] : "";

    if ($page==""){
        include "welcome.php";
    }elseif ($page=="gejala"){
        if ($action==""){
            include "gejala/tampil_gejala.php";
        }elseif ($action=="tambah"){
            include "gejala/tambah_gejala.php";
        }elseif ($action=="update"){
            include "gejala/update_gejala.php";
        }else{
            include "gejala/hapus_gejala.php";
        }
    }elseif ($page=="penyakit"){
        if ($action==""){
            include "penyakit/tampil_penyakit.php";
        }elseif ($action=="tambah"){
            include "penyakit/tambah_penyakit.php";
        }elseif ($action=="update"){
            include "penyakit/update_penyakit.php";
        }else{
            include "penyakit/hapus_penyakit.php";
        }
    }elseif ($page=="aturan"){
        if ($action==""){
            include "aturan/aturan_tampil.php";
        }elseif ($action=="tambah"){
            include "aturan/tambah_aturan.php";
        }elseif ($action=="detail"){
            include "aturan/detail_aturan.php";
        }elseif ($action=="update"){
            include "aturan/update_aturan.php";
        }elseif ($action=="hapus_gejala"){
            include "aturan/hapus_detail_gejala.php";
        }else{
            include "aturan/hapus_aturan.php";
        }
    }elseif ($page=="konsultasi"){
        if ($action==""){
            include "ks/tampil_konsultasi.php";
        }else{
            include "ks/hasil_konsultasi.php";
        }
    }elseif ($page=="konsultasiadm"){
        if ($action==""){
            include "ksa/tampil_konsultasiadm.php";
        }else{
            include "ksa/detail_konsultasiadm.php";
        }
    }elseif ($page=="users"){
        if ($action==""){
            include "user/tampil_users.php";
        }elseif ($action=="tambah"){
            include "user/tambah_users.php";
        }elseif ($action=="update"){
            include "user/update_users.php";
        }else{
            include "user/hapus_users.php";
        }
    }else{
        include "logout.php";
    }
    ?>
</div>

    <!-- jquery -->
    <script src="assets/js/jquery-3.7.0.min.js"></script>
    <!-- boosrap js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- datatables js -->
    <script src="assets/js/datatables.min.js"></script>
    <script>
      $(document).ready(function() {
            $('#myTable').DataTable();
      } );
  </script>

<!-- font -->
<script src="assets/js/all.js"></script>
<!-- chosen -->
<script src="assets/js/chosen.jquery.min.js"></script>
<script>
      $(function() {
        $('.chosen').chosen();
      });
</script>


</body>
</html>