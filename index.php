<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dinas Pariwisata Kota Bitung</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Playfair+Display:wght@400;500;600&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style2.css" rel="stylesheet">
    <link href="css/baru1.css" rel="stylesheet">
    <link href="css/slider.css" rel="stylesheet">
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-dark px-5 d-none d-lg-block">
        <div class="row gx-0 align-items-center" style="height: 45px;">
            <div class="col-lg-8 text-center text-lg-start mb-lg-0">
                <?php
                // Include file konfigurasi database
                include './conf/conf.php';

                // Query untuk mendapatkan data dari tabel ContactInfo
                $sql = "SELECT * FROM contactinfo";
                $result = $conn->query($sql);

                // Memeriksa apakah ada baris yang dikembalikan
                if ($result->num_rows > 0) {
                    // Ambil data pertama (asumsikan hanya ada satu baris data)
                    $row = $result->fetch_assoc();

                    // Menyimpan data ke dalam variabel
                    $location = $row['location'];
                    $phone_number = $row['phone_number'];
                    $email = $row['email'];
                } else {
                    // Jika tidak ada data, atur nilai default
                    $location = "Location not found";
                    $phone_number = "Phone number not found";
                    $email = "Email not found";
                }
                ?>
                <div class="d-flex flex-wrap">
                    <a href="#" class="text-light me-4"><i
                            class="fas fa-map-marker-alt text-primary me-2"></i><?php echo $location; ?></a>
                    <a href="#" class="text-light me-4"><i
                            class="fas fa-phone-alt text-primary me-2"></i><?php echo $phone_number; ?></a>
                    <!-- <a href="#" class="text-light me-0"><i
                            class="fas fa-envelope text-primary me-2"></i><?php echo $email; ?></a> -->
                    </p>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-flex align-items-center justify-content-end">
                    <?php
                    // Include file konfigurasi database
                    include './conf/conf.php';

                    // Query untuk mendapatkan data dari tabel socialmedia
                    $sql = "SELECT * FROM socialmedia";
                    $result = $conn->query($sql);

                    // Memeriksa apakah ada baris yang dikembalikan
                    if ($result->num_rows > 0) {
                        // Output data setiap baris
                        while ($row = $result->fetch_assoc()) {
                            // Menyimpan data ke dalam variabel
                            $facebook = $row['facebook'];
                            $twitter = $row['twitter'];
                            $instagram = $row['instagram'];
                            $tiktok = $row['tiktok'];

                            // Menampilkan tombol ikon media sosial dengan tautan yang sesuai
                    ?>
                    <a href="<?php echo $facebook; ?>"
                        class="btn btn-light btn-square border rounded-circle nav-fill me-3"><i
                            class="fab fa-facebook-f"></i></a>
                    <a href="<?php echo $twitter; ?>"
                        class="btn btn-light btn-square border rounded-circle nav-fill me-3"><i
                            class="fab fa-twitter"></i></a>
                    <a href="<?php echo $instagram; ?>"
                        class="btn btn-light btn-square border rounded-circle nav-fill me-3"><i
                            class="fab fa-instagram"></i></a>
                    <a href="<?php echo $tiktok; ?>"
                        class="btn btn-light btn-square border rounded-circle nav-fill me-0"><i
                            class="fab fa-tiktok"></i></a>
                    <?php
                        }
                    } else {
                        echo "No social media data found.";
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar & Hero Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-white px-4 px-lg-5 py-3 py-lg-0">
            <a href="./" class="navbar-brand p-0">
                <img src="img/logo/12.png" alt="Terapia Logo" class="img-fluid">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="?q=beranda"
                        class="nav-item nav-link <?php echo ((empty($_GET) || (isset($_GET['q']) && $_GET['q'] == 'beranda'))) ? 'active' : ''; ?>">Beranda</a>
                    <a href="?q=about"
                        class="nav-item nav-link <?php echo ((isset($_GET['q']) && $_GET['q'] == 'about')) ? 'active' : ''; ?>">Tentang
                        Kami</a>
                    <a href="?q=rekom"
                        class="nav-item nav-link <?php echo ((isset($_GET['q']) && $_GET['q'] == 'rekom')) ? 'active' : ''; ?>">Destinasi</a>
                    <a href="?q=contact"
                        class="nav-item nav-link <?php echo ((isset($_GET['q']) && $_GET['q'] == 'contact')) ? 'active' : ''; ?>">Hubungi
                        Kami</a>

                    <!-- <a href="?q=pesan" class="nav-item nav-link <?php echo ((isset($_GET['q']) && $_GET['q'] == 'pesan')) ? 'active' : ''; ?>">Hubungi Kami</a>
                <a href="?q=kontakinf" class="nav-item nav-link <?php echo ((isset($_GET['q']) && $_GET['q'] == 'kontakinf')) ? 'active' : ''; ?>">Hubungi Kami</a>
                <a href="?q=sosialmedia" class="nav-item nav-link <?php echo ((isset($_GET['q']) && $_GET['q'] == 'sosialmedia')) ? 'active' : ''; ?>">Hubungi Kami</a>
                <a href="?q=slide_satu" class="nav-item nav-link <?php echo ((isset($_GET['q']) && $_GET['q'] == 'slide_satu')) ? 'active' : ''; ?>">Hubungi Kami</a>
                <a href="?q=slide_dua" class="nav-item nav-link <?php echo ((isset($_GET['q']) && $_GET['q'] == 'slide_dua')) ? 'active' : ''; ?>">Hubungi Kami</a>
                <a href="?q=wisata" class="nav-item nav-link <?php echo ((isset($_GET['q']) && $_GET['q'] == 'wisata')) ? 'active' : ''; ?>">Hubungi Kami</a>
                <a href="?q=rekom" class="nav-item nav-link <?php echo ((isset($_GET['q']) && $_GET['q'] == 'rekom')) ? 'active' : ''; ?>">Hubungi Kami</a>
                <a href="?q=t_kami" class="nav-item nav-link <?php echo ((isset($_GET['q']) && $_GET['q'] == 't_kami')) ? 'active' : ''; ?>">Hubungi Kami</a> -->
                </div>



                <a href="ad/"
                    class="btn btn-primary rounded-pill text-white py-2 px-4 flex-wrap flex-sm-shrink-0">Login</a>
            </div>
        </nav>
    </div>
    <!-- Navbar & Hero End -->


    <?php include 'link.php'; ?>



    <!-- Footer Start -->
    <div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-md-6 col-lg-6 col-xl-5">
                    <div class="footer-item d-flex flex-column">
                        <h4 class="text-white mb-4"><i class="fas fa-star-of-life me-3"></i>DINAS PARIWISATA KOTA BITUNG
                        </h4>
                        <p class="text-white">Dinas Pariwisata Kota Bitung City government office in Bitung, North
                            Sulawesi
                        </p>
                        <p class="text-white">City government office in Bitung, North Sulawesi
                        </p>
                        <div class="d-flex align-items-center">
                            <i class="fas fa-share fa-2x text-white me-2"></i>
                            <!-- <a class="btn-square btn btn-primary text-white rounded-circle mx-1" href=""><i
                                    class="fab fa-facebook-f"></i></a> -->
                            <!-- <a class="btn-square btn btn-primary text-white rounded-circle mx-1" href=""><i
                                    class="fab fa-twitter"></i></a> -->
                            <a class="btn-square btn btn-primary text-white rounded-circle mx-1"
                                href="https://www.instagram.com/dispar.bitung/?hl=en"><i
                                    class="fab fa-instagram"></i></a>
                            <!-- <a class="btn-square btn btn-primary text-white rounded-circle mx-1" href=""><i
                                    class="fab fa-linkedin-in"></i></a> -->
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item d-flex flex-column">
                        <h4 class="mb-4 text-white">Quick Links</h4>
                        <a href="?q=beranda"><i class="fas fa-angle-right me-2"></i> Beranda</a>
                        <a href="?q=about"><i class="fas fa-angle-right me-2"></i> Tentang Kami</a>
                        <a href="?q=rekom"><i class="fas fa-angle-right me-2"></i> Destinasi</a>
                        <a href="?q=contact"><i class="fas fa-angle-right me-2"></i> Kontak Kami</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item d-flex flex-column">
                        <h4 class="mb-4 text-white">Contact Info</h4>
                        <a href=""><i class="fa fa-map-marker-alt me-2"></i>Jl. Sam Ratulangi No. 45, Bitung, Sulawesi
                            Utara, Indonesia 95511</a>
                        <!-- <a href=""><i class="fas fa-envelope me-2"></i> info@example.com</a>
                        <a href=""><i class="fas fa-envelope me-2"></i> info@example.com</a> -->
                        <a href=""><i class="fas fa-phone me-2"></i> 082338751503</a>
                        <!-- <a href="" class="mb-3"><i class="fas fa-print me-2"></i> +012 345 67890</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-md-6 text-center text-md-start mb-md-0">
                    <span class="text-white"><a href="#"><i class="fas fa-copyright text-light me-2"></i>Karmel</a>, All
                        right reserved.</span>
                </div>
                <div class="col-md-6 text-center text-md-end text-white">
                    Designed By <a class="border-bottom" href="#">Karmel</a> Distributed By <a class="border-bottom"
                        href="">Karmel</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-lg-square back-to-top text-white"><i class="fa fa-arrow-up"></i></a>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>

<script>
let sliderIndex = 0;
const slides = document.querySelectorAll('.slide');

function showSlide() {
    slides.forEach(slide => slide.style.transform = `translateX(-${sliderIndex * 100}%)`);
}

function nextSlide() {
    if (sliderIndex < slides.length - 1) {
        sliderIndex++;
    } else {
        sliderIndex = 0;
    }
    showSlide();
}

function prevSlide() {
    if (sliderIndex > 0) {
        sliderIndex--;
    } else {
        sliderIndex = slides.length - 1;
    }
    showSlide();
}
</script>