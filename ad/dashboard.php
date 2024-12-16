<?php

session_start();
include('conf/conf.php');
if(empty($_SESSION['username'])){
header("location:login.php");
}

include '../conf/conn.php';

// $nk1 = mysqli_query($conn,"SELECT * FROM tempat_wisata WHERE id = '9'");
// $nk2 = mysqli_query($conn,"SELECT * FROM tempat_wisata WHERE id = '10'");
// $nk3 = mysqli_query($conn,"SELECT * FROM tempat_wisata WHERE id = '11'");
// $nk4 = mysqli_query($conn,"SELECT * FROM tempat_wisata WHERE id = '12'");
// $nk5 = mysqli_query($conn,"SELECT * FROM tempat_wisata WHERE id = '13'");
// $nk6 = mysqli_query($conn,"SELECT * FROM tempat_wisata WHERE id = '14'");
// $nk7 = mysqli_query($conn,"SELECT * FROM tempat_wisata WHERE id = '15'");
// $nk8 = mysqli_query($conn,"SELECT * FROM tempat_wisata WHERE id = '16'");
// $nk9 = mysqli_query($conn,"SELECT * FROM tempat_wisata WHERE id = '17'");
// $nk10 = mysqli_query($conn,"SELECT * FROM tempat_wisata WHERE id = '18'");
// $nk11 = mysqli_query($conn,"SELECT * FROM tempat_wisata WHERE id = '19'");
// $nk12 = mysqli_query($conn,"SELECT * FROM tempat_wisata WHERE id = '20'");
// $nk13 = mysqli_query($conn,"SELECT * FROM tempat_wisata WHERE id = '21'");
// $nk14 = mysqli_query($conn,"SELECT * FROM tempat_wisata WHERE id = '22'");

$nk1 = mysqli_query($conn,"SELECT * FROM rekomendasi_bitung WHERE id = '11'");
$nk2 = mysqli_query($conn,"SELECT * FROM rekomendasi_bitung WHERE id = '14'");
$nk3 = mysqli_query($conn,"SELECT * FROM rekomendasi_bitung WHERE id = '15'");
$nk4 = mysqli_query($conn,"SELECT * FROM rekomendasi_bitung WHERE id = '22'");
$nk5 = mysqli_query($conn,"SELECT * FROM rekomendasi_bitung WHERE id = '23'");
$nk6 = mysqli_query($conn,"SELECT * FROM rekomendasi_bitung WHERE id = '23'");

$data1 = mysqli_fetch_assoc($nk1);
$data2 = mysqli_fetch_assoc($nk2);
$data3 = mysqli_fetch_assoc($nk3);
$data4 = mysqli_fetch_assoc($nk4);
$data5 = mysqli_fetch_assoc($nk5);
$data6 = mysqli_fetch_assoc($nk6);

// $data7 = mysqli_fetch_assoc($nk7);
// $data8 = mysqli_fetch_assoc($nk8);
// $data9 = mysqli_fetch_assoc($nk9);
// $data10 = mysqli_fetch_assoc($nk10);
// $data11 = mysqli_fetch_assoc($nk11);
// $data12 = mysqli_fetch_assoc($nk12);

// $data13 = mysqli_fetch_assoc($nk13);
// $data14 = mysqli_fetch_assoc($nk14);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dispar - Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
    <link rel="shortcut icon" href="assets/images/favicon-dispar.png" />
    <!-- <link rel="shortcut icon" href="../img/logo bitung.png" /> -->
</head>

<body>

    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <!-- <a class="navbar-brand brand-logo" href="my"><img src="assets/images/logo.svg" alt="logo" /></a> -->
            <a href="dashboard.php"><img src="../img/logo/12.png" width="70%" alt="" /></a>
            <a class="navbar-brand brand-logo-mini" href="dashboard.php"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="mdi mdi-menu"></span>
            </button>
            <!-- <div class="search-field d-none d-md-block">
                <form class="d-flex align-items-center h-100" action="#">
                    <div class="input-group">
                        <div class="input-group-prepend bg-transparent">
                            <i class="input-group-text border-0 mdi mdi-magnify"></i>
                        </div>
                        <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
                    </div>
                </form>
            </div> -->

            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item d-none d-lg-block full-screen-link">
                    <a class="nav-link">
                        <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                    </a>
                </li>
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="nav-profile-img">
                            <img src="../img/logo/logo bitung.png" alt="image">
                            <span class="availability-status online"></span>
                        </div>
                        <div class="nav-profile-text">
                            <p class="mb-1 text-black">Admin</p>
                        </div>
                    </a>
                    <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                        <!-- <a class="dropdown-item" href="#">
                            <i class="mdi mdi-cached me-2 text-success"></i> Activity Log </a> -->
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">
                            <i class="mdi mdi-logout me-2 text-primary"></i> Logout </a>
                    </div>
                </li>


            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    <img src="../img/logo/logo bitung.png" alt="profile">
                    <span class="login-status online"></span>
                    <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold">Admin</span>
                    <span class="text-secondary text-small">Admin</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="?q=pesan">
                <span class="menu-title">Pesan</span>
                <i class="mdi mdi-image-filter menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Header</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="?q=kontakinf">Kontak Informasi</a></li>
                    <li class="nav-item"> <a class="nav-link" href="?q=sosialmedia">Sosial Media</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="?q=slide_satu">
                <span class="menu-title">Slide Satu</span>
                <i class="mdi mdi-account-card-details menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="?q=slide_dua">
                <span class="menu-title">Slide Dua</span>
                <i class="mdi mdi-airplay menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="?q=wisata">
                <span class="menu-title">Wisata</span>
                <i class="mdi mdi-car menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="?q=rekom">
                <span class="menu-title">Rekomendasi</span>
                <i class="mdi mdi-image-filter menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="?q=t_kami">
                <span class="menu-title">Tentang Kami</span>
                <i class="mdi mdi-account-switch menu-icon"></i>
            </a>
        </li>
    </ul>
</nav>

        <!-- partial -->
        <div class="main-panel">

            <?php include 'link.php'; ?>

            <!-- partial:partials/_footer.html -->
            <footer class="footer">
                <div class="container-fluid d-flex justify-content-between">
                    <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright ©
                        Karmel</span>
                    <span class="float-none float-sm-end mt-1 mt-sm-0 text-end"> Made By Karmel
                </div>
            </footer>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/chart.umd.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <script src="assets/js/jquery.cookie.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- <script src="assets/js/chart.js"></script> -->
    <!-- <script src="assets/js/charts.js"></script> -->
    <!-- <script src="assets/js/jchart.js"></script> -->
    <!-- <script src="assets/js/barchart.js"></script> -->
    <!-- End custom js for this page -->
</body>

<script>

var data = {
    labels: ["<?= $data1['nama'] ?>", "<?= $data2['nama'] ?>", "<?= $data3['nama'] ?>", "<?= $data4['nama'] ?>", "<?= $data5['nama'] ?>", "<?= $data6['nama'] ?>"],
    datasets: [{
    //   label: 'Jumlah Klik Pengunjung',
      data: [<?= $data1['jumlah_klik'] ?>, <?= $data2['jumlah_klik'] ?>, <?= $data3['jumlah_klik'] ?>, <?= $data4['jumlah_klik'] ?>, <?= $data5['jumlah_klik'] ?>, <?= $data6['jumlah_klik'] ?>],
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)'
      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
      ],
      borderWidth: 1,
      fill: false
    }]
  };


</script>

</html>



