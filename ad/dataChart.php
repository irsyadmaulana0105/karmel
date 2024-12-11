<?php

include '../conf/conn.php';


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

// Data dari hasil kueri database PHP
$areaData = [
    'labels' => ["2013", "2014", "2015", "2016", "2017"],
    'datasets' => [
        [
            'label' => 'jumlah klik',
            'data' => [
                1,
                1,
                1,
                3,
                3,
                3,
                3,
                3,
            ],
            'backgroundColor' => [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            'borderColor' => [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            'borderWidth' => 1,
            'fill' => true,
        ],
    ],
];
