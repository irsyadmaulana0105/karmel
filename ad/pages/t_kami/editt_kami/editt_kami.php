<?php
// Include file konfigurasi database
include './conf/conf.php';

// Variabel untuk menampung data dari database
$id = $image_1_path = $image_2_path = $title = $sub_title = $description = "";

// Periksa apakah parameter id disertakan dalam URL
if (isset($_GET['id'])) {
    // Tangkap nilai id dari URL
    $id = $_GET['id'];

    // Query untuk mendapatkan data tentang kami berdasarkan id
    $sql = "SELECT * FROM about_us WHERE id = $id";
    $result = $conn->query($sql);

    // Periksa apakah data ditemukan
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $image_1_path = $row['image_1_path'];
        $image_2_path = $row['image_2_path'];
        $title = isset($row['title']) ? $row['title'] : "";
        $sub_title = isset($row['sub_title']) ? $row['sub_title'] : "";
        $description = isset($row['description']) ? $row['description'] : "";

        // Jika formulir telah dikirimkan
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Tangkap nilai yang diubah melalui formulir
            $new_title = $_POST['title'];
            $new_sub_title = $_POST['sub_title'];
            $new_description = $_POST['description'];

            // Tangkap file gambar yang diunggah
            $target_dir = "uploads/";
            $new_image_1 = $_FILES["image_1"];
            $new_image_2 = $_FILES["image_2"];

            // Proses upload gambar 1
            if (!empty($new_image_1["name"])) {
                $image_1_name = basename($new_image_1["name"]);
                $target_file_1 = $target_dir . $image_1_name;
                if (move_uploaded_file($new_image_1["tmp_name"], $target_file_1)) {
                    $image_1_path = $target_file_1;
                }
            }

            // Proses upload gambar 2
            if (!empty($new_image_2["name"])) {
                $image_2_name = basename($new_image_2["name"]);
                $target_file_2 = $target_dir . $image_2_name;
                if (move_uploaded_file($new_image_2["tmp_name"], $target_file_2)) {
                    $image_2_path = $target_file_2;
                }
            }

            // Query untuk melakukan update data
            $sql_update = "UPDATE about_us SET image_1_path='$image_1_path', image_2_path='$image_2_path', title='$new_title', sub_title='$new_sub_title', description='$new_description' WHERE id=$id";

            if ($conn->query($sql_update) === TRUE) {
                // Jika perubahan berhasil disimpan, redirect ke halaman beranda
                echo "<script>window.location.href = '?q=t_kami';</script>";
                exit();
            } else {
                echo "Error updating record: " . $conn->error;
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
                    <h4 class="card-title">Tambah Data Tentang Kami</h4>
                    <!-- Form untuk edit data tentang kami -->
                    <form action="?q=editt_kami&id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <div class="form-group">
                            <label for="image_1">Image 1:</label>
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" id="image-1-name" disabled placeholder="Upload Image">
                                <label class="input-group-append">
                                    <span class="btn btn-gradient-primary">
                                        Browse <input type="file" style="display: none;" name="image_1" id="image-1-input" accept="image/*" class="file-upload-browse btn btn-gradient-primary">
                                    </span>
                                </label>
                            </div>
                            <img class="img-fluid" id="preview-image-1" src="<?php echo $image_1_path; ?>" alt="Image 1">
                        </div>
                        <div class="form-group">
                            <label for="image_2">Image 2:</label>
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" id="image-2-name" disabled placeholder="Upload Image">
                                <label class="input-group-append">
                                    <span class="btn btn-gradient-primary">
                                        Browse <input type="file" style="display: none;" name="image_2" id="image-2-input" accept="image/*" class="file-upload-browse btn btn-gradient-primary">
                                    </span>
                                </label>
                            </div>
                            <img class="img-fluid" id="preview-image-2" src="<?php echo $image_2_path; ?>" alt="Image 2">
                        </div>
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?php echo $title; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="sub_title">sub_title:</label>
                            <input type="text" class="form-control" id="sub_title" name="sub_title" value="<?php echo $sub_title; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" id="description" name="description" rows="4" required><?php echo $description; ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <a href="?q=about_us" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('image-1-input').addEventListener('change', function() {
        var fileName = this.files[0].name;
        document.getElementById('image-1-name').value = fileName;

        // Preview image
        var previewImage = document.getElementById('preview-image-1');
        var file = this.files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
            previewImage.src = e.target.result;
        };

        reader.readAsDataURL(file);
    });

    document.getElementById('image-2-input').addEventListener('change', function() {
        var fileName = this.files[0].name;
        document.getElementById('image-2-name').value = fileName;

        // Preview image
        var previewImage = document.getElementById('preview-image-2');
        var file = this.files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
            previewImage.src = e.target.result;
        };

        reader.readAsDataURL(file);
    });
</script>