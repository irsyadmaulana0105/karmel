<?php
include './conf/conf.php';

// ID pengguna (ubah sesuai dengan ID pengguna yang sebenarnya)
$user_id = 1;

// Ambil data tempat wisata yang sudah dikunjungi pengguna
$sql = "SELECT tempat_id FROM kunjungan WHERE user_id = $user_id";
$result = $conn->query($sql);

$tempat_wisata_pengguna = [];
while ($row = $result->fetch_assoc()) {
    $tempat_wisata_pengguna[] = $row['tempat_id'];
}

// Ambil data untuk kategori kuliner
$sql = "SELECT * FROM rekomendasi_bitung WHERE kategori = 'kuliner' ORDER BY jumlah_klik DESC";
$result = $conn->query($sql);

$rekomendasi = [];
while ($row = $result->fetch_assoc()) {
    if (!in_array($row['id'], $tempat_wisata_pengguna)) {
        $rekomendasi[] = $row;
    }
}

// Menampilkan rekomendasi tempat wisata
if (!empty($rekomendasi)) {
    foreach ($rekomendasi as $tempat) {
        echo "<div class='col-md-6 col-lg-4 col-xl-3 wow fadeInUp' data-wow-delay='0.1s'>";
        echo "<div class='service-item rounded'>";
        echo "<div class='service-img rounded-top'>";
        echo "<img src='./ad/" . $tempat['gambar'] . "' class='img-fluid rounded-top w-100' alt=''>";
        echo "</div>";
        echo "<div class='service-content rounded-bottom bg-light p-4'>";
        echo "<div class='service-content-inner'>";
        echo "<h5 class='mb-4 d-flex align-items-center justify-content-between'>" . $tempat['nama'];
        echo "<div class='d-flex align-items-center'><i class='fa fa-eye ml-2 mx-1'></i><span class='ml-1'>" . $tempat['jumlah_klik'] . "</span></div></h5>";
        echo "<p class='mb-4'>" . substr($tempat['deskripsi'], 0, 200) . "...</p>";
        echo "<form action='?q=detail' method='post'>";
        echo "<input type='hidden' name='tempat_id' value='" . $tempat['id'] . "'>";
        echo "<button type='submit' class='btn btn-primary rounded-pill text-white py-2 px-4 mb-2'>Read More</button>";
        echo "</form></div></div></div></div>";
    }
} else {
    echo "Tidak ada tempat wisata untuk kategori kuliner.";
}

$conn->close();
?>
