<!-- Rekomendasi Start -->
<div class="container-fluid service py-5 mt-5">
    <div class="container py-5">
        <div class="section-title mb-5 wow fadeInUp" data-wow-delay="0.2s">
            <?php
            include './conf/conf.php';

            // Ambil data dari tabel rekom
            $sql = "SELECT * FROM rekom";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<h4 class='sub-title px-3 mb-0'>" . $row['title'] . "</h4>";
                    echo "<h1 class='display-3 mb-4'>" . $row['sub_title'] . "</h1>";
                    echo "<p class='mb-0'>" . $row['description'] . "</p>";
                }
            } else {
                echo "No data found in the 'rekom' table.";
            }
            ?>

            <!-- Dropdown untuk sortir berdasarkan kategori -->
            <form action="http://localhost/karmel/" method="GET">
    <input type="hidden" name="q" value="rekom"> <!-- Menambahkan parameter q=rekom -->
    <select name="kategori" class="form-select mb-4" onchange="this.form.submit()">
        <option value="">-- Pilih Kategori --</option>
        <option value="kuliner" <?php echo (isset($_GET['kategori']) && $_GET['kategori'] == 'kuliner') ? 'selected' : ''; ?>>Kuliner</option>
        <option value="pasar" <?php echo (isset($_GET['kategori']) && $_GET['kategori'] == 'pasar') ? 'selected' : ''; ?>>Pasar</option>
        <option value="oleh_oleh" <?php echo (isset($_GET['kategori']) && $_GET['kategori'] == 'oleh_oleh') ? 'selected' : ''; ?>>Oleh-Oleh</option>
        <option value="aktivitas" <?php echo (isset($_GET['kategori']) && $_GET['kategori'] == 'aktivitas') ? 'selected' : ''; ?>>Aktivitas</option>
        <option value="wisata_religi" <?php echo (isset($_GET['kategori']) && $_GET['kategori'] == 'wisata_religi') ? 'selected' : ''; ?>>Wisata Religi</option>
        <option value="pusat_perbelanjaan" <?php echo (isset($_GET['kategori']) && $_GET['kategori'] == 'pusat_perbelanjaan') ? 'selected' : ''; ?>>Pusat Perbelanjaan</option>
        <option value="kegiatan_budaya" <?php echo (isset($_GET['kategori']) && $_GET['kategori'] == 'kegiatan_budaya') ? 'selected' : ''; ?>>Kegiatan Budaya</option>
        <option value="relaksasi" <?php echo (isset($_GET['kategori']) && $_GET['kategori'] == 'relaksasi') ? 'selected' : ''; ?>>Relaksasi</option>
    </select>
</form>


        <div class="row g-4 justify-content-center">
            <?php
            $user_id = 1; // Ganti dengan ID pengguna yang sebenarnya

            // Mengambil kategori yang dipilih dari form
            $kategori_terpilih = isset($_GET['kategori']) ? $_GET['kategori'] : '';

            // Ambil data tempat wisata yang sudah dikunjungi pengguna
            $sql = "SELECT tempat_id FROM kunjungan WHERE user_id = $user_id";
            $result = $conn->query($sql);

            $tempat_wisata_pengguna = [];
            while ($row = $result->fetch_assoc()) {
                $tempat_wisata_pengguna[] = $row['tempat_id'];
            }

            // Query untuk mengambil data berdasarkan kategori yang dipilih dan sortir berdasarkan jumlah klik
            $sql = "SELECT * FROM rekomendasi_bitung WHERE kategori LIKE '%$kategori_terpilih%' ORDER BY jumlah_klik DESC";
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
                    echo "<div class='d-flex align-items-center'></i><span class='ml-1'>"  . "</span></div></h5>";
                    echo "<p class='mb-4'>" . substr($tempat['deskripsi'], 0, 200) . "...</p>";
                    echo "<form action='?q=detail' method='post'>";
                    echo "<input type='hidden' name='tempat_id' value='" . $tempat['id'] . "'>";
                    echo "<button type='submit' class='btn btn-primary rounded-pill text-white py-2 px-4 mb-2'>Read More</button>";
                    echo "</form></div></div></div></div>";
                }
            } else {
                $sql_total = "SELECT COUNT(*) AS total FROM rekomendasi_bitung";
                $result_total = $conn->query($sql_total);
                $total_tempat = $result_total->fetch_assoc()['total'];

                $sql_available = "SELECT COUNT(*) AS available FROM rekomendasi_bitung WHERE jumlah_klik > 0 ORDER BY jumlah_klik DESC";
                $result_available = $conn->query($sql_available);
                $total_available = $result_available->fetch_assoc()['available'];

                if ($total_tempat == 0) {
                    echo "Tidak ada tempat wisata yang tersedia saat ini.";
                } elseif ($total_available == 0) {
                    echo "Tidak ada tempat wisata dengan jumlah klik lebih dari 0 saat ini.";
                } elseif (count($tempat_wisata_pengguna) == $total_tempat) {
                    echo "Anda telah mengunjungi semua tempat wisata yang tersedia. Tidak ada rekomendasi saat ini.";
                } else {
                    echo "Tidak ada rekomendasi saat ini.";
                }
            }

            $conn->close();
            ?>

        </div>
    </div>
</div>
<!-- Rekomendasi End -->
