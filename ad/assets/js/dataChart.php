<?php
include '../../../conf/conn.php';

$nk1 = mysqli_query($conn,"SELECT * FROM tempat_wisata WHERE id = '9'");
$nk2 = mysqli_query($conn,"SELECT * FROM tempat_wisata WHERE id = '10'");
$nk3 = mysqli_query($conn,"SELECT * FROM tempat_wisata WHERE id = '11'");
$nk4 = mysqli_query($conn,"SELECT * FROM tempat_wisata WHERE id = '12'");
$nk5 = mysqli_query($conn,"SELECT * FROM tempat_wisata WHERE id = '13'");
$nk6 = mysqli_query($conn,"SELECT * FROM tempat_wisata WHERE id = '14'");
$nk7 = mysqli_query($conn,"SELECT * FROM tempat_wisata WHERE id = '15'");
$nk8 = mysqli_query($conn,"SELECT * FROM tempat_wisata WHERE id = '16'");
$nk9 = mysqli_query($conn,"SELECT * FROM tempat_wisata WHERE id = '17'");
$nk10 = mysqli_query($conn,"SELECT * FROM tempat_wisata WHERE id = '18'");
$nk11 = mysqli_query($conn,"SELECT * FROM tempat_wisata WHERE id = '19'");
$nk12 = mysqli_query($conn,"SELECT * FROM tempat_wisata WHERE id = '20'");
$nk13 = mysqli_query($conn,"SELECT * FROM tempat_wisata WHERE id = '21'");
$nk14 = mysqli_query($conn,"SELECT * FROM tempat_wisata WHERE id = '22'");

$data1 = mysqli_fetch_assoc($nk1);
$data2 = mysqli_fetch_assoc($nk2);
$data3 = mysqli_fetch_assoc($nk3);
$data4 = mysqli_fetch_assoc($nk4);
$data5 = mysqli_fetch_assoc($nk5);
$data6 = mysqli_fetch_assoc($nk6);
$data7 = mysqli_fetch_assoc($nk7);
$data8 = mysqli_fetch_assoc($nk8);

// Menggabungkan data menjadi satu array
$data = [
    'data1' => $data1['jumlah_klik'],
    'data2' => $data2['jumlah_klik'],
    'data3' => $data3['jumlah_klik'],
    'data4' => $data4['jumlah_klik'],
    'data5' => $data5['jumlah_klik'],
    'data6' => $data6['jumlah_klik'],
    'data7' => $data7['jumlah_klik'],
    'data8' => $data8['jumlah_klik'],
];

// Mengkonversi data menjadi format JSON
$json_data = json_encode($data);

// Mengirimkan header untuk menunjukkan bahwa respons adalah JSON
header('Content-Type: application/json');

// Mencetak data JSON
echo $json_data;
?>
