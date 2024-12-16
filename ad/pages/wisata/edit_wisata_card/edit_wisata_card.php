<?php
include './conf/conf.php';

// Memeriksa apakah ada parameter edit_id_card yang diterima melalui GET
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['edit_id_card'])) {
    $edit_id = $conn->real_escape_string($_GET['edit_id_card']);
    $sql = "SELECT * FROM rekomendasi_bitung WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $edit_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $kategori = $row['kategori'];
        $deskripsi = $row['deskripsi'];
        $gambar = $row['gambar'];
        $kategori = $row['kategori'];
    } else {
        echo "Data tidak ditemukan.";
        exit();
    }
    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $edit_id = $conn->real_escape_string($_POST['edit_id_card']);
    $nama = $conn->real_escape_string($_POST['nama']);
    $deskripsi = $conn->real_escape_string($_POST['deskripsi']);
    $kategori = $conn->real_escape_string($_POST['kategori']);

    if ($_FILES['gambar']['name']) {
        // Jika gambar baru diunggah
        $gambar_name = $_FILES['gambar']['name'];
        $gambar_tmp_name = $_FILES['gambar']['tmp_name'];
        $allowed_extensions = array("jpg", "jpeg", "png", "gif");
        $gambar_extension = strtolower(pathinfo($gambar_name, PATHINFO_EXTENSION));
        $upload_directory = "uploads/";
    
        if (!in_array($gambar_extension, $allowed_extensions)) {
            echo "Error: File yang diunggah bukan gambar.";
            exit();
        }
    
        if ($_FILES['gambar']['size'] > 2097152) { // Maksimal 2MB
            echo "Error: Ukuran file terlalu besar.";
            exit();
        }
    
        if (!file_exists($upload_directory)) {
            mkdir($upload_directory, 0755, true);
        }
    
        $gambar_path = $upload_directory . uniqid() . "." . $gambar_extension;
    
        if (move_uploaded_file($gambar_tmp_name, $gambar_path)) {
            // Hapus gambar lama
            $sql_delete_old_image = "SELECT gambar FROM rekomendasi_bitung WHERE id=?";
            $stmt = $conn->prepare($sql_delete_old_image);
            $stmt->bind_param("i", $edit_id);
            $stmt->execute();
            $result = $stmt->get_result();
    
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if (file_exists($row['gambar'])) {
                    unlink($row['gambar']); // Hapus gambar lama
                }
            }
    
            // Update dengan gambar baru
            $sql = "UPDATE rekomendasi_bitung SET nama=?, deskripsi=?, kategori=?, gambar=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssi", $nama, $deskripsi, $kategori, $gambar_path, $edit_id);
        } else {
            echo "Error: Terjadi kesalahan saat mengunggah gambar baru.";
            exit();
        }
    } else {
        // Update tanpa gambar baru
        $sql = "UPDATE rekomendasi_bitung SET nama=?, deskripsi=?, kategori=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $nama, $deskripsi, $kategori, $edit_id);
    }    

    if ($stmt->execute()) {
        echo "<script>window.location.href = '?q=wisata';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}
?>



<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Tempat Wisata</h4>
                    <!-- Menambahkan parameter edit_id pada action form -->
                    <form action="?q=edit_wisata_card&edit_id_card=<?php echo $edit_id; ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="edit_id_card" value="<?php echo $edit_id; ?>">
                        <div class="form-group">
                            <label for="nama">Nama Tempat</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required><?php echo $deskripsi; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" id="gambar-name" disabled placeholder="Upload Gambar">
                                <label class="input-group-append">
                                    <span class="btn btn-gradient-primary">
                                        Browse <input type="file" style="display: none;" name="gambar" id="gambar-input" accept="image/*" class="file-upload-browse btn btn-gradient-primary">
                                    </span>
                                </label>
                            </div>
                            <img id="gambar-preview" src="<?php echo $gambar; ?>" alt="Gambar Tempat Wisata" class="img-fluid mb-2">
                        </div>

                        <!-- Menambahkan dropdown untuk kategori -->
                        <div class="form-group">
                            <label for="kategori">Kategori:</label>
                            <select class="form-control" id="kategori" name="kategori" required>
                                <option value="">Pilih Kategori</option>
                                <?php
                                // Mengambil data kategori yang unik dari tabel rekomendasi_bitung
                                $kategori_sql = "SELECT DISTINCT kategori FROM rekomendasi_bitung";
                                $kategori_result = $conn->query($kategori_sql);

                                if ($kategori_result->num_rows > 0) {
                                    while ($kat = $kategori_result->fetch_assoc()) {
                                        // Perbaiki variabel $current_kategori menjadi $kategori
                                        $selected = ($kat['kategori'] == $kategori) ? 'selected' : '';
                                        echo "<option value='" . $kat['kategori'] . "' $selected>" . $kat['kategori'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>


                        <button type="submit" class="btn btn-primary">Simpan</button>
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
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('gambar-preview').setAttribute('src', e.target.result);
                    document.getElementById('gambar-preview').style.display =
                        'block'; // Menampilkan pratinjau gambar
                };
                reader.readAsDataURL(this.files[0]);
            }
            var inputText = document.getElementById('gambar-name');
            inputText.value = fileName;
        });
    });
</script>