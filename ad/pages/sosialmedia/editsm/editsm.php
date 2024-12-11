<?php
// Include file konfigurasi database
include '../conf/conf.php';

// Periksa apakah parameter id disertakan dalam URL
if (isset($_GET['id'])) {
    // Tangkap nilai id dari URL
    $id = $_GET['id'];

    // Query untuk mendapatkan data sosial media berdasarkan id
    $sql = "SELECT * FROM socialmedia WHERE id = $id";
    $result = $conn->query($sql);

    // Periksa apakah data ditemukan
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $facebook = $row['facebook'];
        $instagram = $row['instagram'];
        $twitter = $row['twitter'];
        $tiktok = $row['tiktok'];
    } else {
        echo "Data tidak ditemukan.";
        exit();
    }
}


// Periksa apakah form telah dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangkap nilai yang dikirimkan melalui form
    $id = $_POST['id'];
    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];
    $twitter = $_POST['twitter'];
    $tiktok = $_POST['tiktok'];

    // Query untuk menyimpan perubahan ke database
    $sql = "UPDATE socialmedia SET facebook='$facebook', instagram='$instagram', twitter='$twitter', tiktok='$tiktok' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        // Jika perubahan berhasil disimpan, redirect ke halaman beranda
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
                    <h4 class="card-title">Edit Data Sosial Media</h4>
                    <p class="card-description">Ubah link sosial media</p>
                    <!-- Form untuk edit data -->
                    <form action="?q=editsm" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <div class="form-group">
                            <label for="facebook">Facebook:</label>
                            <input type="text" class="form-control" id="facebook" name="facebook" value="<?php echo $facebook; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="instagram">Instagram:</label>
                            <input type="text" class="form-control" id="instagram" name="instagram" value="<?php echo $instagram; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="twitter">Twitter:</label>
                            <input type="text" class="form-control" id="twitter" name="twitter" value="<?php echo $twitter; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="tiktok">TikTok:</label>
                            <input type="text" class="form-control" id="tiktok" name="tiktok" value="<?php echo $tiktok; ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <a href="?q=beranda" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>