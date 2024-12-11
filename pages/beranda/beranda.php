<!-- Carousel Start -->
<div class="header-carousel owl-carousel">
    <div class="header-carousel-item">
        <?php
        // Include file konfigurasi database
        include './conf/conf.php';

        // Query untuk mendapatkan data slide dari tabel slides_satu
        $sql = "SELECT * FROM slides_satu";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data dari setiap baris
            while ($row = $result->fetch_assoc()) {
        ?>
                <img src="./ad/<?php echo $row['image_path']; ?>" class="img-fluid w-100" alt="Image">
                <div class="carousel-caption">
                    <div class="carousel-caption-content p-3">

                        <h5 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">
                            <?php echo $row['title']; ?></h5>
                        <h1 class="display-1 text-capitalize text-white mb-4"><?php echo $row['subtitle']; ?></h1>
                        <p class="mb-5 fs-5"><?php echo $row['description']; ?></p>

                        <a class="btn btn-primary rounded-pill text-white py-3 px-5" href="?q=about">Show More</a>
                <?php
            }
        } else {
            echo "0 results";
        }
                ?>
                    </div>
                </div>
    </div>
    <div class="header-carousel-item">
        <?php
        // Include file konfigurasi database
        include './conf/conf.php';

        // Query untuk mendapatkan data slide dari tabel slides_satu
        $sql = "SELECT * FROM slides_dua";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data dari setiap baris
            while ($row = $result->fetch_assoc()) {
        ?>
                <img src="./ad/<?php echo $row['image_path']; ?>" class="img-fluid w-100" alt="Image">
                <div class="carousel-caption">
                    <div class="carousel-caption-content p-3">

                        <h5 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">
                            <?php echo $row['title']; ?></h5>
                        <h1 class="display-1 text-capitalize text-white mb-4"><?php echo $row['subtitle']; ?></h1>
                        <p class="mb-5 fs-5"><?php echo $row['description']; ?></p>

                        <a class="btn btn-primary rounded-pill text-white py-3 px-5" href="#">Show More</a>
                <?php
            }
        } else {
            echo "0 results";
        }
                ?>
                    </div>
                </div>
    </div>
</div>
<!-- Carousel End -->

<!-- About Start -->
<div class="container-fluid about bg-light py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5 wow fadeInLeft" data-wow-delay="0.2s">
                <?php
                // Include file konfigurasi database
                include './conf/conf.php';

                // Query untuk mendapatkan data dari tabel about_us
                $sql = "SELECT * FROM about_us";
                $result = $conn->query($sql);

                // Periksa apakah ada baris yang dikembalikan
                if ($result->num_rows > 0) {
                    // Output data setiap baris
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <div class="about-img pb-5 ps-5">
                            <img src="./ad/<?php echo $row['image_2_path']; ?>" class="img-fluid rounded w-100" style="object-fit: cover;" alt="Image">
                            <div class="about-img-inner">
                                <!-- <img src="./ad/<?php echo $row['image_1_path']; ?>" class="img-fluid rounded-circle w-100 h-100" alt="Image"> -->
                            </div>
                        </div>
            </div>
            <div class="col-lg-7 wow fadeInRight" data-wow-delay="0.4s">
                <div class="section-title text-start mb-5">
                    <h4 class="sub-title pe-3 mb-0"><?php echo $row['sub_title']; ?></h4>
                    <h1 class="display-3 mb-4"><?php echo $row['title']; ?></h1>
                    <p class="mb-4"><?php echo $row['description']; ?></p>
            <?php
                    }
                } else {
                    // Jika tidak ada data yang ditemukan
                    echo "Tidak ada data tentang kami yang tersedia.";
                }
                // Tutup koneksi database
                $conn->close();
            ?>
            <?php
            // Include file konfigurasi database
            include './conf/conf.php';

            // Query untuk mendapatkan data dari tabel additional_info
            $sql = "SELECT * FROM additional_info";
            $result = $conn->query($sql);

            // Periksa apakah ada baris yang dikembalikan
            if ($result->num_rows > 0) {
                // Output data setiap baris
            ?>
                <div class="mb-4">
                    <?php
                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <!-- disini ada radio button -->
                        <!-- <p class="text-secondary"><i class="fa fa-check text-primary me-2"></i><?php echo $row['text']; ?></p> -->
                    <?php
                    }
                    ?>
                </div>
            <?php
            } else {
                // Jika tidak ada data yang ditemukan
                echo "Tidak ada data tambahan yang tersedia.";
            }
            // Tutup koneksi database
            $conn->close();
            ?>

            <a href="?q=rekom" class="btn btn-primary rounded-pill text-white py-3 px-5">Rekomendasi Tempat
                Wisata</a>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- About End -->


<div class="container-fluid about bg-light py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-12 wow fadeInRight" data-wow-delay="0.4s">
                <div id="section_dua_slide" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="img/wisata/1.png" class="d-block img-fluid rounded" alt="">
                        </div>
                        <div class="carousel-item">
                            <img src="img/wisata/bitung.jpeg" class="d-block img-fluid rounded" alt="">
                        </div>
                        <div class="carousel-item">
                            <img src="img/wisata/yesus.jpg" class="d-block img-fluid rounded" alt="">
                        </div>
                        <div class="carousel-item">
                            <img src="img/wisata/batuangus.jpg" class="d-block img-fluid rounded" alt="">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#section_dua_slide" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#section_dua_slide" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="row align-items-center mt-3">
            <div class="col-lg-12 wow fadeInRight" data-wow-delay="0.4s">
                <div class="text-start mb-2">
                    <p class="text-secondary">Di jantung Kota Bitung,
                        Sulawesi
                        Utara, berdiri kokoh Dinas Pariwisata Kota Bitung, sebuah gerbang menuju pesona alam dan
                        budaya
                        yang
                        tak
                        terlupakan. Lebih dari sekadar instansi pemerintah, Dinas Pariwisata Kota Bitung adalah
                        pemandu
                        handal
                        bagi para penjelajah yang ingin merasakan keajaiban Sulawesi Utara.
                        Dinas ini bagaikan peta harta karun yang membuka rahasia pesona Bitung. Di sini, Anda akan
                        menemukan
                        informasi lengkap tentang berbagai destinasi wisata yang memukau, mulai dari pantai berpasir
                        putih
                        yang
                        berkilauan, hutan tropis yang rimbun, hingga pulau-pulau kecil yang eksotis.
                        Dinas Pariwisata Kota Bitung bukan hanya panduan wisata, tetapi juga jembatan budaya. Mereka
                        dengan
                        penuh antusias membantu para pelancong untuk memahami dan menikmati kekayaan budaya lokal.
                        Anda
                        akan
                        diajak untuk mempelajari tradisi unik Suku Minahasa, mencicipi kuliner khas yang lezat, dan
                        bahkan
                        terlibat dalam berbagai festival dan acara budaya yang semarak.

                    </p>

                </div>
            </div>
        </div>
        <div class="row g-5 align-items-center">
            <div class="col-lg-12 wow fadeInRight" data-wow-delay="0.4s">
                <div class=" text-start mb-5">
                    <p class="text-secondary">Lebih dari itu, Dinas
                        Pariwisata
                        Kota
                        Bitung berkomitmen untuk memajukan pariwisata yang berkelanjutan. Mereka bekerja sama dengan
                        masyarakat
                        lokal untuk menjaga kelestarian alam dan budaya, serta memastikan bahwa pariwisata memberikan
                        manfaat
                        bagi semua pihak.

                        Bagi para pelancong yang mencari pengalaman wisata yang tak terlupakan, Dinas Pariwisata Kota
                        Bitung
                        adalah kunci yang membuka pintu menuju surga tersembunyi di Sulawesi Utara. Dapatkan informasi
                        lengkap,
                        rasakan keramahan, dan ciptakan kenangan indah yang tak terhapuskan di Bitung.

                        Jelajahi pesona alam yang memukau, rasakan kekayaan budaya yang unik, dan ciptakan petualangan
                        tak
                        terlupakan bersama Dinas Pariwisata Kota Bitung.</p>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- Services Start -->
<?php
// Include file konfigurasi database
include './conf/conf.php';

// Query untuk mengambil data dari tabel wisata
$sql = "SELECT * FROM wisata";
$result = $conn->query($sql);
?>
<div class="container-fluid service py-5">
    <div class="container py-5">
        <div class="section-title mb-5 wow fadeInUp" data-wow-delay="0.2s">
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

        <?php
        include './conf/conn.php';

        if ($conn) {
            // Fungsi untuk menghitung cosine similarity antara dua dokumen
            function cosine_similarity($doc1, $doc2)
            {
                // Pecah dokumen menjadi token (kata-kata)
                $tokens1 = explode(" ", strtolower($doc1));
                $tokens2 = explode(" ", strtolower($doc2));

                // Hitung frekuensi kemunculan kata-kata dalam masing-masing dokumen
                $wordFreq1 = array_count_values($tokens1);
                $wordFreq2 = array_count_values($tokens2);

                // Hitung dot product dari dua vektor
                $dotProduct = 0;
                foreach ($wordFreq1 as $word => $freq1) {
                    if (isset($wordFreq2[$word])) {
                        $dotProduct += $freq1 * $wordFreq2[$word];
                    }
                }

                // Hitung magnitudo dari masing-masing vektor
                $mag1 = sqrt(array_sum(array_map(function ($x) {
                    return pow($x, 2);
                }, $wordFreq1)));
                $mag2 = sqrt(array_sum(array_map(function ($x) {
                    return pow($x, 2);
                }, $wordFreq2)));

                // Hitung cosine similarity
                if ($mag1 != 0 && $mag2 != 0) {
                    return $dotProduct / ($mag1 * $mag2);
                } else {
                    return 0;
                }
            }

            function getTempatWisata()
    {
        global $conn;
        // Query untuk mengambil tempat wisata dengan jumlah klik lebih dari 10
        $sql = "SELECT * FROM rekomendasi_bitung WHERE jumlah_klik >= 10";
        $result = $conn->query($sql);
        $tempatWisata = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $tempatWisata[] = $row;
            }
        }
        return $tempatWisata;
    }

            $tempatWisata = getTempatWisata();
            if (!isset($_SESSION['rekomendasi_bitung'])) {
                $_SESSION['rekomendasi_bitung'] = $tempatWisata;
            }
        ?>
            <div class="row g-4 justify-content-center">
                <?php foreach ($tempatWisata as $tempat) { ?>
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


                                    <p class="mb-4"><?php echo substr($tempat['deskripsi'], 0, 100); ?>..</p>
                                    <form action="?q=detail" method="post">
                                        <input type="hidden" name="tempat_id" value="<?php echo $tempat['id']; ?>">
                                        <button type="submit" class="btn btn-primary rounded-pill text-white py-2 px-4 mb-2">Read
                                            More</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="col-12 text-center wow fadeInUp mt-5" data-wow-delay="0.2s">
                <a class="btn btn-primary rounded-pill text-white py-3 px-5" href="?q=rekom">Lihat Destinasi Tempat
                    Wisata
                    ..</a>
            </div>
        <?php
            $conn->close();
        } else {
            echo "Koneksi ke database gagal.";
        }
        ?>

    </div>
</div>


<!-- Services End -->

<!-- Testimonial Start -->
<div class="container-fluid testimonial py-5 wow zoomInDown" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="section-title mb-5">
            <div class="sub-style">
                <h4 class="sub-title text-white px-3 mb-0">Dinas Pariwisata</h4>
            </div>
            <h1 class="display-3 mb-4 text-white">Kota Bitung</h1>
        </div>
        <div class="testimonial-carousel owl-carousel">
            <div class="testimonial-item">
                <div class="testimonial-inner p-5">
                    <div class="testimonial-inner-img mb-4">
                        <img src="img/logo/logo bitung.png" class="img-fluid rounded-circle" alt="">
                    </div>
                    <p class="text-white fs-7">"Temukan keajaiban alam dan kekayaan budaya di Kota Bitung, pintu
                        gerbang
                        ke Selat Lembeh yang mempesona. Dinas Pariwisata Kota Bitung mengundang Anda untuk
                        menjelajahi
                        keindahan bawah laut yang tak tertandingi, menikmati kuliner lokal yang lezat, dan merasakan
                        keramahan masyarakat kami. Bergabunglah dalam petualangan yang tak terlupakan di kota
                        pelabuhan
                        internasional kami yang ramah lingkungan dan penuh inovasi. Bitung menanti Anda!"
                    </p>
                    <div class="text-center">
                        <!-- <h5 class="mb-2">John Abraham</h5>
                        <p class="mb-2 text-white-50">New York, USA</p> -->
                        <div class="d-flex justify-content-center">
                            <i class="fas fa-star text-secondary"></i>
                            <i class="fas fa-star text-secondary"></i>
                            <i class="fas fa-star text-secondary"></i>
                            <i class="fas fa-star text-secondary"></i>
                            <i class="fas fa-star text-secondary"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-item">
                <div class="testimonial-inner p-5">
                    <div class="testimonial-inner-img mb-4">
                        <img src="img/logo/logo bitung.png" class="img-fluid rounded-circle" alt="">
                    </div>
                    <p class="text-white fs-7">Dinas Pariwisata Kota Bitung telah mencapai berbagai prestasi di
                        tahun
                        2023, termasuk pengakuan sebagai Kota Kreatif Sub Sektor Kuliner oleh Kementerian Pariwisata
                        dan
                        Ekonomi Kreatif RI1. Selain itu, mereka telah berhasil mempromosikan Festival Pesona Selat
                        Lembeh (FPSL) yang masuk dalam Kharisma Event Nusantara1, serta berhasil membawa sejumlah
                        kapal
                        pesiar untuk berwisata di Kota Bitung. Di tahun 2024, dijadwalkan akan ada 5 kapal pesiar
                        berstandar internasional yang akan berkunjung ke kota ini.
                    </p>
                    <div class="text-center">
                        <!-- <h5 class="mb-2">John Abraham</h5>
                        <p class="mb-2 text-white-50">New York, USA</p> -->
                        <div class="d-flex justify-content-center">
                            <i class="fas fa-star text-secondary"></i>
                            <i class="fas fa-star text-secondary"></i>
                            <i class="fas fa-star text-secondary"></i>
                            <i class="fas fa-star text-secondary"></i>
                            <i class="fas fa-star text-secondary"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-item">
                <div class="testimonial-inner p-5">
                    <div class="testimonial-inner-img mb-4">
                        <img src="img/logo/logo bitung.png" class="img-fluid rounded-circle" alt="">
                    </div>
                    <p class="text-white fs-7">"Jelajahi keindahan Kota Bitung, gerbang menuju Selat Lembeh yang
                        memukau. Dinas Pariwisata Kota Bitung mengajak Anda untuk mengalami petualangan bawah laut
                        yang
                        tak terlupakan, menikmati kuliner khas yang menggugah selera, dan merasakan keramahan yang
                        tulus
                        dari warga kami. Datang dan saksikan sendiri mengapa Bitung menjadi destinasi yang harus
                        dikunjungi oleh para pelancong dari seluruh dunia. Bitung bukan hanya sebuah destinasi,
                        tetapi
                        sebuah pengalaman yang akan mengubah pandangan Anda tentang keindahan!"
                    </p>
                    <div class="text-center">
                        <!-- <h5 class="mb-2">John Abraham</h5>
                        <p class="mb-2 text-white-50">New York, USA</p> -->
                        <div class="d-flex justify-content-center">
                            <i class="fas fa-star text-secondary"></i>
                            <i class="fas fa-star text-secondary"></i>
                            <i class="fas fa-star text-secondary"></i>
                            <i class="fas fa-star text-secondary"></i>
                            <i class="fas fa-star text-secondary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->