<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">Detail</h3>
        <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="?q=beranda">Home</a></li>
            <li class="breadcrumb-item active text-primary">Detail</li>
        </ol>
    </div>
</div>
<?php
include './conf/conn.php';

if ($conn) {
    $tempat_id = $_POST['tempat_id'] ?? '';

    if (!empty($tempat_id)) {
        $query = mysqli_prepare($conn, "SELECT * FROM rekomendasi_bitung WHERE id = ?");
        mysqli_stmt_bind_param($query, "i", $tempat_id);
        mysqli_stmt_execute($query);
        $result = mysqli_stmt_get_result($query);
        $tempat = mysqli_fetch_assoc($result);
        // $kona = $tempat['encrypted_id'];

        if ($tempat) {
            $sql_update = "UPDATE rekomendasi_bitung SET jumlah_klik = jumlah_klik + 1 WHERE id = ?";
            $stmt_update = mysqli_prepare($conn, $sql_update);
            mysqli_stmt_bind_param($stmt_update, "i", $tempat_id);
            mysqli_stmt_execute($stmt_update);
?>
            <div class="container-fluid about bg-light py-5">
                <div class="container py-5">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-5 wow fadeInLeft" data-wow-delay="0.2s">
                            <div class="about-img pb-5 ps-5">
                                <img src="./ad/<?php echo $tempat['gambar']; ?>" class="img-fluid rounded w-100" style="object-fit: cover;" alt="Image">
                                <!-- <div class="about-experience">15 years experience</div> -->
                            </div>
                        </div>
                        <div class="col-lg-7 wow fadeInRight" data-wow-delay="0.4s">
                            <div class="section-title text-start mb-5">
                                <h4 class="sub-title pe-3 mb-0">Detail</h4>
                                <h1 class="display-3 mb-4"><?php echo $tempat['nama']; ?></h1>
                                <p class="mb-4"><?php echo $tempat['deskripsi']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php
        } else {
            echo "Tempat wisata tidak ditemukan.";
        }
    } else {
        echo "ID tempat wisata tidak valid.";
    }
} else {
    echo "Koneksi ke database gagal.";
}
?>