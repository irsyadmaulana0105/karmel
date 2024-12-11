<!-- Rekomendasi Start -->
<div class="container-fluid service py-5 mt-5">
    <div class="container py-5">
        <div class="section-title mb-5 wow fadeInUp" data-wow-delay="0.2s">
            <?php
            // Include file konfigurasi database
            include './conf/conf.php';

            // Query untuk mengambil data dari tabel wisata
            $sql = "SELECT * FROM rekom";
            $result = $conn->query($sql);
            ?>

            <div class="sub-style">
                <?php while ($row = $result->fetch_assoc()) : ?>
                <h4 class="sub-title px-3 mb-0"><?php echo $row['title']; ?></h4>
                <?php endwhile; ?>
            </div>

            <h1 class="display-3 mb-4">
                <?php $result->data_seek(0); // Reset kursor hasil query 
                ?>
                <?php while ($row = $result->fetch_assoc()) : ?>
                <?php echo $row['sub_title']; ?>
                <?php endwhile; ?>
            </h1>

            <p class="mb-0">
                <?php $result->data_seek(0); // Reset kursor hasil query 
                ?>
                <?php while ($row = $result->fetch_assoc()) : ?>
                <?php echo $row['description']; ?>
                <?php endwhile; ?>
            </p>

            <?php $conn->close(); ?>
        </div>
        <div class="row g-4 justify-content-center">
            <?php
            include './conf/conf.php';

            // Ambil data tempat wisata yang paling banyak diklik
            $sql = "SELECT * FROM tempat_wisata WHERE jumlah_klik > 0 ORDER BY jumlah_klik DESC";
            $result = $conn->query($sql);

            // Ambil ID tempat wisata yang telah diklik oleh pengguna
            $tempat_wisata_pengguna = array();
            if (isset($_COOKIE['tempat_wisata'])) {
                $tempat_wisata_pengguna = unserialize($_COOKIE['tempat_wisata']);
            }

            // Rekomendasikan tempat-tempat wisata yang belum dikunjungi oleh pengguna
            $rekomendasi = array();
            while ($row = $result->fetch_assoc()) {
                if (!in_array($row['id'], $tempat_wisata_pengguna)) {
                    $rekomendasi[] = $row;
                }
            }

            // Tampilkan rekomendasi
            if (!empty($rekomendasi)) {
                foreach ($rekomendasi as $tempat) {
            ?>
            <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item rounded">
                    <div class="service-img rounded-top">
                        <img src="./ad/<?php echo $tempat['gambar']; ?>" class="img-fluid rounded-top w-100" alt="">
                    </div>
                    <div class="service-content rounded-bottom bg-light p-4">
                        <div class="service-content-inner">
                            <h5 class="mb-4 d-flex align-items-center justify-content-between">
                                <?php echo $tempat['nama']; ?>
                                <div class="d-flex align-items-center">
                                    <i class="fa fa-eye ml-2 mx-1"></i>
                                    <span class="ml-1"><?php echo $tempat['jumlah_klik']; ?></span>
                                </div>
                            </h5>
                            <p class="mb-4"><?php echo substr($tempat['deskripsi'], 0, 200); ?>...</p>
                            <!-- <a href="?q=detail&tempat_id=<?php echo $tempat['id']; ?>" class="btn btn-primary rounded-pill text-white py-2 px-4 mb-2">Read More</a> -->
                            <form action="?q=detail" method="post">
                                <input type="hidden" name="tempat_id" value="<?php echo $tempat['id']; ?>">
                                <button type="submit"
                                    class="btn btn-primary rounded-pill text-white py-2 px-4 mb-2">Read More</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
            } else {
                echo "Tidak ada rekomendasi saat ini.";
            }

            $conn->close();
            ?>

        </div>
    </div>
</div>
<!-- Rekomendasi End -->