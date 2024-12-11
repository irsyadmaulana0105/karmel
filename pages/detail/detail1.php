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
    include '../conf/conf.php';

    function decrypt_id($ciphertext, $key)
    {
        list($encrypted_data, $iv) = explode('::', base64_decode($ciphertext), 2);
        return openssl_decrypt($encrypted_data, 'AES-128-CBC', $key, 0, $iv);
    }

    $encryption_key = "1515";

    if (isset($_GET['id'])) {
        $decrypted_id = decrypt_id($_GET['id'], $encryption_key);

        if ($decrypted_id !== false) {
            $sql = "SELECT * FROM tempat_wisata WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $decrypted_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $tempat = $result->fetch_assoc();

                $sql_update = "UPDATE tempat_wisata SET jumlah_klik = jumlah_klik + 1 WHERE id = ?";
                $stmt_update = $conn->prepare($sql_update);
                $stmt_update->bind_param("i", $decrypted_id);
                $stmt_update->execute();
                var_dump($stmt_update->affected_rows); // Melihat jumlah baris yang terpengaruh
    ?>
                <!-- Kode HTML untuk menampilkan detail tempat wisata di sini -->
                <div class="container-fluid about bg-light py-5">
                    <div class="container py-5">
                        <div class="row g-5 align-items-center">
                            <div class="col-lg-5 wow fadeInLeft" data-wow-delay="0.2s">
                                <div class="about-img pb-5 ps-5">
                                    <img src="<?php echo $tempat['gambar']; ?>" class="img-fluid rounded w-100" style="object-fit: cover;" alt="Image">
                                    <div class="about-img-inner">
                                        <img src="img/about-2.jpg" class="img-fluid rounded-circle w-100 h-100" alt="Image">
                                    </div>
                                    <div class="about-experience">15 years experience</div>
                                </div>
                            </div>
                            <div class="col-lg-7 wow fadeInRight" data-wow-delay="0.4s">
                                <div class="section-title text-start mb-5">
                                    <h4 class="sub-title pe-3 mb-0">About Us</h4>
                                    <h1 class="display-3 mb-4"><?php echo $tempat['nama']; ?></h1>
                                    <p class="mb-4"><?php echo $tempat['deskripsi']; ?></p>
                                    <div class="mb-4">
                                        <p class="text-secondary"><i class="fa fa-check text-primary me-2"></i> Refresing to get
                                            such a personal touch.</p>
                                        <p class="text-secondary"><i class="fa fa-check text-primary me-2"></i> Duis aute irure
                                            dolor in reprehenderit in voluptate.</p>
                                        <p class="text-secondary"><i class="fa fa-check text-primary me-2"></i> Velit esse cillum
                                            dolore eu fugiat nulla pariatur.</p>
                                    </div>
                                    <a href="#" class="btn btn-primary rounded-pill text-white py-3 px-5">Discover More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Detail End -->
    <?php
            } else {
                echo "Tempat wisata tidak ditemukan.";
            }
        } else {
            echo "ID tempat wisata tidak valid.";
        }
    } else {
        echo "ID tempat wisata tidak diberikan.";
    }
    $conn->close();
    ?>