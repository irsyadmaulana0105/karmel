  <!-- Header Start -->
  <div class="container-fluid bg-breadcrumb">
      <div class="container text-center py-5" style="max-width: 900px;">
          <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">Tentang Kami</h1>
              <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item"><a href="#">Pages</a></li>
                  <li class="breadcrumb-item active text-primary">About</li>
              </ol>
      </div>
  </div>
  <!-- Header End -->

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
                      <img src="./ad/<?php echo $row['image_2_path']; ?>" class="img-fluid" alt="Image">
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
                          <p class="text-secondary"><i
                                  class="fa fa-check text-primary me-2"></i><?php echo $row['text']; ?></p>
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

                      <!-- <a href="#" class="btn btn-primary rounded-pill text-white py-3 px-5">Discover More</a> -->
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- About End -->