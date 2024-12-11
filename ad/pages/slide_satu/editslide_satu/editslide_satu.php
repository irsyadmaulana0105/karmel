<?php
// Include file konfigurasi database
include './conf/conf.php';

// Variabel untuk menampung data dari database
$image_path = "";
$title = "";
$subtitle = "";
$description = "";

// Periksa apakah parameter id disertakan dalam URL
if (isset($_GET['id'])) {
    // Tangkap nilai id dari URL
    $id = $_GET['id'];

    // Query untuk mendapatkan data slide berdasarkan id
    $sql = "SELECT * FROM slides_satu WHERE id = $id";
    $result = $conn->query($sql);

    // Periksa apakah data ditemukan
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $image_path = $row['image_path'];
        $title = $row['title'];
        $subtitle = $row['subtitle'];
        $description = $row['description'];

        // Jika formulir telah dikirimkan
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Tangkap nilai yang diubah melalui formulir
            $new_title = $_POST['title'];
            $new_subtitle = $_POST['subtitle'];
            $new_description = $_POST['description'];

            // Tangkap file gambar yang diunggah
            $target_dir = "uploads/";
            $new_image = $_FILES["image"];
            $new_image_name = basename($new_image["name"]);
            $target_file = $target_dir . $new_image_name;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Cek apakah file gambar baru telah dipilih
            if ($new_image["size"] > 0) {
                // Pindahkan file gambar baru ke folder uploads
                if (move_uploaded_file($new_image["tmp_name"], $target_file)) {
                    // Buat nama file baru sesuai kebutuhan, misalnya dengan menambahkan timestamp
                    $timestamp = time(); // Waktu saat ini
                    $new_image_path = $target_dir . "new_image_" . $timestamp . "." . $imageFileType;

                    // Ubah nama file gambar baru di folder uploads
                    rename($target_file, $new_image_path);

                    // Hapus file gambar lama jika sudah ada
                    if (!empty($image_path)) {
                        unlink($image_path);
                    }

                    // Update kolom image_path dengan nama file gambar baru di database
                    $sql_update = "UPDATE slides_satu SET image_path='$new_image_path', title='$new_title', subtitle='$new_subtitle', description='$new_description' WHERE id=$id";

                    if ($conn->query($sql_update) === TRUE) {
                        // Jika perubahan berhasil disimpan, redirect ke halaman beranda
                        echo "<script>window.location.href = '?q=slide_satu';</script>";
                        exit();
                    } else {
                        echo "Error updating record: " . $conn->error;
                    }
                } else {
                    echo "Maaf, terjadi kesalahan saat mengunggah gambar.";
                }
            } else {
                // Jika file gambar tidak dipilih, hanya perbarui data teks tanpa mengubah gambar
                $sql_update = "UPDATE slides_satu SET title='$new_title', subtitle='$new_subtitle', description='$new_description' WHERE id=$id";

                if ($conn->query($sql_update) === TRUE) {
                    // Jika perubahan berhasil disimpan, redirect ke halaman beranda
                    echo "<script>window.location.href = '?q=slide_satu';</script>";
                    exit();
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
        }
    } else {
        echo "Data tidak ditemukan.";
        exit();
    }
}
?>

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Data Slide</h4>
                    <p class="card-description">Edit data slide yang telah ada</p>
                    <!-- Form untuk edit data -->
                    <form action="?q=editslide_satu&id=<?php echo $row['id']; ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="image">Image:</label>
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image" id="image-name" value="<?php echo $image_path; ?>">
                                <label class="input-group-append">
                                    <span class="btn btn-gradient-primary">
                                        Browse <input type="file" style="display: none;" name="image" id="image-input" accept="image/*" class="file-upload-browse btn btn-gradient-primary">
                                    </span>
                                </label>
                            </div>
                            <img id="preview-image" src="<?php echo $image_path; ?>" class="img-fluid mt-3" alt="Image">
                        </div>

                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?php echo $title; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="subtitle">Subtitle:</label>
                            <input type="text" class="form-control" id="subtitle" name="subtitle" value="<?php echo $subtitle; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" id="description" name="description" rows="4" required><?php echo $description; ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <a href="?q=slide_satu" class="btn btn-secondary">Batal</a>
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

        // Preview image
        var previewImage = document.getElementById('preview-image');
        var file = this.files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
            previewImage.src = e.target.result;
        };

        reader.readAsDataURL(file);
    });
</script>