<?php
include '../conf/conf.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangkap nilai yang diinputkan melalui formulir
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $description = $_POST['description'];

    // Proses unggah gambar 1
    $target_dir_1 = "uploads/";
    $target_file_1 = $target_dir_1 . basename($_FILES["image_1"]["name"]);
    move_uploaded_file($_FILES["image_1"]["tmp_name"], $target_file_1);

    // Proses unggah gambar 2
    $target_dir_2 = "uploads/";
    $target_file_2 = $target_dir_2 . basename($_FILES["image_2"]["name"]);
    move_uploaded_file($_FILES["image_2"]["tmp_name"], $target_file_2);

    // Query untuk menambahkan data baru ke dalam tabel about_us
    $sql = "INSERT INTO about_us (image_1_path, image_2_path, title, sub_title, description) VALUES ('$target_file_1', '$target_file_2', '$title', '$subtitle', '$description')";

    if ($conn->query($sql) === TRUE) {
        // Jika penambahan berhasil, redirect ke halaman tentang kami
        echo "<script>window.location.href = '?q=t_kami';</script>";
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Data Tentang Kami</h4>
                    <form action="?q=addt_kami" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="image_1">Image 1:</label>
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" id="image_1-name" disabled placeholder="Upload Image 1">
                                <label class="input-group-append">
                                    <span class="btn btn-gradient-primary">
                                        Browse <input type="file" style="display: none;" name="image_1" id="image_1-input" required accept="image/*" class="file-upload-browse btn btn-gradient-primary">
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image_2">Image 2:</label>
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" id="image_2-name" disabled placeholder="Upload Image 2">
                                <label class="input-group-append">
                                    <span class="btn btn-gradient-primary">
                                        Browse <input type="file" style="display: none;" name="image_2" id="image_2-input" required accept="image/*" class="file-upload-browse btn btn-gradient-primary">
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
                        <a href="?q=about_us" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Fungsi untuk menampilkan nama file saat pengguna memilih file
    function displayFileName(input, target) {
        const fileName = input.files[0].name;
        document.getElementById(target).value = fileName;
    }

    // Event listener untuk input file Image 1
    document.getElementById('image_1-input').addEventListener('change', function() {
        displayFileName(this, 'image_1-name');
    });

    // Event listener untuk input file Image 2
    document.getElementById('image_2-input').addEventListener('change', function() {
        displayFileName(this, 'image_2-name');
    });
</script>