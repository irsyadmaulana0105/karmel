<?php
include './conf/conf.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $kategori_id = $_POST['kategori']; // Tangkap ID kategori yang dipilih

    // Proses gambar
    $gambar_name = $_FILES['gambar']['name'];
    $gambar_tmp_name = $_FILES['gambar']['tmp_name'];
    $gambar_size = $_FILES['gambar']['size'];
    $gambar_type = $_FILES['gambar']['type'];
    $gambar_error = $_FILES['gambar']['error'];

    // Cek apakah file yang diunggah adalah gambar
    $allowed_extensions = array("jpg", "jpeg", "png", "gif");
    $gambar_extension = strtolower(pathinfo($gambar_name, PATHINFO_EXTENSION));
    if (!in_array($gambar_extension, $allowed_extensions)) {
        echo "Error: File yang diunggah bukan gambar.";
        exit();
    }

    // Tentukan lokasi penyimpanan gambar
    $upload_directory = "uploads/";
    $gambar_path = $upload_directory . $gambar_name;

    // Pindahkan gambar ke direktori upload
    if (move_uploaded_file($gambar_tmp_name, $gambar_path)) {
        // Insert data ke database
        $sql = "INSERT INTO tempat_wisata (nama, deskripsi, gambar, kategori_id) VALUES ('$nama', '$deskripsi', '$gambar_path', '$kategori_id')";
        if ($conn->query($sql) === TRUE) {
            echo "Data berhasil ditambahkan.";
            // Redirect ke halaman lain jika proses berhasil
            echo "<script>window.location.href = '?q=wisata';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error: Terjadi kesalahan saat mengunggah gambar.";
    }

    $conn->close();
}
?>

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Judul Section Wisata</h4>
                    <p class="card-description">Tambahkan Nama Tempat, Deskripsi, Gambar, dan Kategori</p>
                    <form action="?q=add_wisata_card" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nama">Nama Tempat</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" id="gambar-name" disabled placeholder="Upload Gambar">
                                <label class="input-group-append">
                                    <span class="btn btn-gradient-primary">
                                        Browse <input type="file" style="display: none;" name="gambar" id="gambar-input" required accept="image/*" class="file-upload-browse btn btn-gradient-primary">
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori:</label>
                            <select class="form-control" id="kategori" name="kategori" required>
                                <option value="">Pilih Kategori</option>
                                <?php
                                // Mengambil data kategori yang unik dari tabel rekomendasi_bitung
                                $kategori_sql = "SELECT DISTINCT kategori FROM rekomendasi_bitung";
                                $kategori_result = $conn->query($kategori_sql);

                                if ($kategori_result->num_rows > 0) {
                                    while ($kategori = $kategori_result->fetch_assoc()) {
                                        echo "<option value='" . $kategori['kategori'] . "'>" . $kategori['kategori'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById('gambar-input').addEventListener('change', function(e) {
            var fileName = '';
            if (this.files && this.files.length > 0) {
                fileName = this.files[0].name;
            }
            var inputText = document.getElementById('gambar-name');
            inputText.value = fileName;
        });
    });
</script>
