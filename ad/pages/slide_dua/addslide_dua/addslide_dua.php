<?php
// Include file konfigurasi database
include './conf/conf.php';

// Periksa apakah form telah dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangkap nilai yang dikirimkan melalui form
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $description = $_POST['description'];

    // Tangkap file yang diunggah
    $target_dir = "uploads/"; // Folder tempat menyimpan gambar
    $target_file = $target_dir . basename($_FILES["image"]["name"]); // Path lengkap gambar yang akan diunggah
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); // Ekstensi file gambar

    // Periksa apakah file yang diunggah adalah gambar
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        // Jika file adalah gambar, lanjutkan proses
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            // Jika gambar berhasil diunggah, masukkan data ke database
            $sql = "INSERT INTO slides_dua (image_path, title, subtitle, description) VALUES ('$target_file', '$title', '$subtitle', '$description')";
            if ($conn->query($sql) === TRUE) {
                // Jika data berhasil ditambahkan, redirect ke halaman beranda
                echo "<script>window.location.href = '?q=slide_dua';</script>";
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Maaf, terjadi kesalahan saat mengunggah gambar.";
        }
    } else {
        echo "File yang diunggah bukan gambar.";
    }
}

?>
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Data Slide Satu</h4>
                    <p class="card-description">Tambahkan Image, Title, Subtitle, Deskripsi</p>
                    <!-- Form untuk tambah data -->
                    <form action="?q=addslide_dua" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="image">Image:</label>
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" id="image-name" disabled placeholder="Upload Image">
                                <label class="input-group-append">
                                    <span class="btn btn-gradient-primary">
                                        Browse <input type="file" style="display: none;" name="image" id="image-input" required accept="image/*" class="file-upload-browse btn btn-gradient-primary">
                                    </span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="subtitle">Subtitle:</label>
                            <input type="text" class="form-control" id="subtitle" name="subtitle" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                        <a href="?q=beranda" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('image-input').addEventListener('change', function() {
        var fileName = this.files[0].name;
        document.getElementById('image-name').value = fileName;
    });
</script>