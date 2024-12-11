<?php
// Include file konfigurasi database
include './conf/conf.php';

// Periksa apakah parameter id disertakan dalam URL
if (isset($_GET['id'])) {
    // Tangkap nilai id dari URL
    $id = $_GET['id'];

    // Query untuk mendapatkan data tambahan berdasarkan id
    $sql = "SELECT * FROM additional_info WHERE id = $id";
    $result = $conn->query($sql);

    // Periksa apakah data ditemukan
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $additional_info = $row['text'];

        // Jika formulir telah dikirimkan untuk update
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Tangkap nilai yang diubah melalui formulir
            $new_additional_info = $_POST['additional_info'];

            // Query untuk melakukan update data tambahan
            $sql_update = "UPDATE additional_info SET text='$new_additional_info' WHERE id=$id";

            if ($conn->query($sql_update) === TRUE) {
                // Jika perubahan berhasil disimpan, redirect ke halaman beranda atau halaman lainnya
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
                    <h4 class="card-title">Edit Data Tambahan</h4>
                    <p class="card-description">Edit Data Tambahan</p>
                    <!-- Form untuk edit data tambahan -->
                    <form action="?q=edit_info&id=<?php echo $id; ?>" method="POST">
                        <div class="form-group">
                            <label for="additional_info">Info Tambahan:</label>
                            <input type="text" class="form-control" id="additional_info" name="additional_info" value="<?php echo $additional_info; ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <a href="?q=t_kami" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>