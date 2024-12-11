<?php
include './conf/conf.php';

$sql = "SELECT * FROM tempat_wisata";
$result = $conn->query($sql);
$jumlah_tempat_wisata = mysqli_num_rows($result);

$sql1 = "SELECT SUM(jumlah_klik) AS total_klik FROM tempat_wisata";
$result1 = $conn->query($sql1);
$jumlah_pengunjung = mysqli_fetch_assoc($result1);

$sql2 = "SELECT * FROM pesan";
$result2 = $conn->query($sql2);
$jumlah_pesan = mysqli_num_rows($result2);
?>

<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-home"></i>
            </span> Dashboard
        </h3>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                </li>
            </ul>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3"><strong>Daftar Tempat Wisata </strong><i
                            class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h4>
                    <!-- <h2 class="mb-5">$ 15,0000</h2> -->
                    <h1 class="mb-5"><?= $jumlah_tempat_wisata ?></h1>
                    <!-- <h6 class="card-text">Increased by 60%</h6> -->
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Total Jumlah Klik Pengujung <i
                            class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5"><?= $jumlah_pengunjung['total_klik'] ?></h2>
                    <!-- <h6 class="card-text">Decreased by 10%</h6> -->
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Jumlah Pesan <i
                            class="mdi mdi-diamond mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5"><?= $jumlah_pesan ?></h2>
                    <!-- <h6 class="card-text">Increased by 5%</h6> -->
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Jumlah Pengunjung Tempat Wisata Bitung</h4>
                    <canvas id="barChart" style="height:230px"></canvas>
                  </div>
                </div>
    </div>
    <!-- <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">"</h4>
                    <canvas id="barChartSatu" style="height:230px"></canvas>
                  </div>
                </div>
    </div>
    <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Jumlah Pengunjung Tempat Wisata Bitung</h4>
                    <canvas id="barChartDua" style="height:230px"></canvas>
                  </div>
                </div> -->
</div>

<?php
// $k1 = mysqli_query($connect,"SELECT kategori.kategori_id, file.rak, file.map, file.box, file.urut FROM kategori INNER JOIN file ON kategori.kategori_id=file.file_kategori WHERE kategori_id = '1'");
// $k2 = mysqli_query($connect,"SELECT kategori.kategori_id, file.rak, file.map, file.box, file.urut FROM kategori INNER JOIN file ON kategori.kategori_id=file.file_kategori WHERE kategori_id = '3'");
// $k3 = mysqli_query($connect,"SELECT kategori.kategori_id, file.rak, file.map, file.box, file.urut FROM kategori INNER JOIN file ON kategori.kategori_id=file.file_kategori WHERE kategori_id = '4'");
// $k4 = mysqli_query($connect,"SELECT kategori.kategori_id, file.rak, file.map, file.box, file.urut FROM kategori INNER JOIN file ON kategori.kategori_id=file.file_kategori WHERE kategori_id = '5'");
// $k5 = mysqli_query($connect,"SELECT kategori.kategori_id, file.rak, file.map, file.box, file.urut FROM kategori INNER JOIN file ON kategori.kategori_id=file.file_kategori WHERE kategori_id = '6'");
// $k6 = mysqli_query($connect,"SELECT kategori.kategori_id, file.rak, file.map, file.box, file.urut FROM kategori INNER JOIN file ON kategori.kategori_id=file.file_kategori WHERE kategori_id = '7'");
// $k7 = mysqli_query($connect,"SELECT kategori.kategori_id, file.rak, file.map, file.box, file.urut FROM kategori INNER JOIN file ON kategori.kategori_id=file.file_kategori WHERE kategori_id = '8'");
// $k8 = mysqli_query($connect,"SELECT kategori.kategori_id, file.rak, file.map, file.box, file.urut FROM kategori INNER JOIN file ON kategori.kategori_id=file.file_kategori WHERE kategori_id = '10'");

// $nk1 = mysqli_query($connect,"SELECT * FROM tempat_wisata WHERE id = '9'");
// $nk2 = mysqli_query($connect,"SELECT * FROM tempat_wisata WHERE id = '10'");
// $nk3 = mysqli_query($connect,"SELECT * FROM tempat_wisata WHERE id = '11'");
// $nk4 = mysqli_query($connect,"SELECT * FROM tempat_wisata WHERE id = '12'");
// $nk5 = mysqli_query($connect,"SELECT * FROM tempat_wisata WHERE id = '13'");
// $nk6 = mysqli_query($connect,"SELECT * FROM tempat_wisata WHERE id = '14'");
// $nk7 = mysqli_query($connect,"SELECT * FROM tempat_wisata WHERE id = '15'");
// $nk8 = mysqli_query($connect,"SELECT * FROM tempat_wisata WHERE id = '16'");
// $nk9 = mysqli_query($connect,"SELECT * FROM tempat_wisata WHERE id = '17'");
// $nk10 = mysqli_query($connect,"SELECT * FROM tempat_wisata WHERE id = '18'");
// $nk11 = mysqli_query($connect,"SELECT * FROM tempat_wisata WHERE id = '19'");
// $nk12 = mysqli_query($connect,"SELECT * FROM tempat_wisata WHERE id = '20'");
// $nk13 = mysqli_query($connect,"SELECT * FROM tempat_wisata WHERE id = '21'");
// $nk14 = mysqli_query($connect,"SELECT * FROM tempat_wisata WHERE id = '22'");

// $data1 = mysqli_fetch_assoc($nk1);
// $data2 = mysqli_fetch_assoc($nk2);
// $data3 = mysqli_fetch_assoc($nk3);
// $data4 = mysqli_fetch_assoc($nk4);
// $data5 = mysqli_fetch_assoc($nk5);
// $data6 = mysqli_fetch_assoc($nk6);
// $data7 = mysqli_fetch_assoc($nk7);
// $data8 = mysqli_fetch_assoc($nk8);
// $data9 = mysqli_fetch_assoc($nk9);
// $data10 = mysqli_fetch_assoc($nk10);
// $data11 = mysqli_fetch_assoc($nk11);
// $data12 = mysqli_fetch_assoc($nk12);
// $data13 = mysqli_fetch_assoc($nk13);
// $data14 = mysqli_fetch_assoc($nk14);

?>
