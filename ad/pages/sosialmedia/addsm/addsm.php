<?php
// Include file konfigurasi database
include '../conf/conf.php';

// Periksa apakah form telah dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangkap nilai yang dikirimkan melalui form
    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];
    $twitter = $_POST['twitter'];
    $tiktok = $_POST['tiktok'];

    // Query untuk menyimpan data ke database
    $sql = "INSERT INTO socialmedia (facebook, instagram, twitter, tiktok) VALUES ('$facebook', '$instagram', '$twitter', '$tiktok')";

    if ($conn->query($sql) === TRUE) {
        // Jika data berhasil ditambahkan, redirect ke halaman beranda
        echo "<script>window.location.href = '?q=sosialmedia';</script>";
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Data Sosial Media</h4>
                    <p class="card-description">Tambahkan link sosial media baru</p>
                    <!-- Form untuk tambah data -->
                    <form action="?q=addsm" method="POST">
                        <div class="form-group">
                            <label for="facebook">Facebook:</label>
                            <input type="text" class="form-control" id="facebook" name="facebook" required>
                        </div>
                        <div class="form-group">
                            <label for="instagram">Instagram:</label>
                            <input type="text" class="form-control" id="instagram" name="instagram" required>
                        </div>
                        <div class="form-group">
                            <label for="twitter">Twitter:</label>
                            <input type="text" class="form-control" id="twitter" name="twitter" required>
                        </div>
                        <div class="form-group">
                            <label for="tiktok">TikTok:</label>
                            <input type="text" class="form-control" id="tiktok" name="tiktok" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                        <a href="?q=beranda" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>