<?php
// Include file konfigurasi database
include './conf/conf.php';

// Periksa apakah parameter id disertakan dalam URL
if (isset($_GET['id'])) {
    // Tangkap nilai id dari URL
    $id = $_GET['id'];

    // Query untuk mendapatkan data wisata berdasarkan id
    $sql = "SELECT * FROM wisata WHERE id = $id";
    $result = $conn->query($sql);

    // Periksa apakah data ditemukan
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $title = $row['title'];
        $sub_title = $row['sub_title'];
        $description = $row['description'];

        // Jika formulir telah dikirimkan
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Tangkap nilai yang diubah melalui formulir
            $new_title = $_POST['title'];
            $new_sub_title = $_POST['sub_title'];
            $new_description = $_POST['description'];

            // Query untuk melakukan update data
            $sql_update = "UPDATE wisata SET title='$new_title', sub_title='$new_sub_title', description='$new_description' WHERE id=$id";

            if ($conn->query($sql_update) === TRUE) {
                // Jika perubahan berhasil disimpan, redirect ke halaman wisata
                echo "<script>window.location.href = '?q=wisata';</script>";
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
                    <h4 class="card-title">Edit Judul Section Wisata</h4>
                    <p class="card-description">Edit Judul, Sub Judul, Deskripsi</p>
                    <form action="?q=edit_wisata&id=<?php echo $id; ?>" method="POST">
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?php echo $title; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="sub_title">Subtitle:</label>
                            <input type="text" class="form-control" id="sub_title" name="sub_title" value="<?php echo $sub_title; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" id="description" name="description" rows="4" required><?php echo $description; ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <a href="?q=wisata" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>