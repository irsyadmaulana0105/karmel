<?php
// Include file konfigurasi database
include './conf/conf.php';

// Periksa apakah parameter id disertakan dalam URL dan apakah pengguna yakin untuk menghapus data
if (isset($_GET['id']) && isset($_GET['q']) && $_GET['q'] === 'deleteslide_satu') {
    // Tangkap nilai id dari URL
    $id = $_GET['id'];

    // Query untuk mendapatkan path gambar berdasarkan id
    $sql = "SELECT image_path FROM slides_satu WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $image_path = $row['image_path'];

        // Hapus file gambar
        if (!empty($image_path) && file_exists($image_path)) {
            unlink($image_path);
        }

        // Query untuk menghapus data dari database
        $sql_delete = "DELETE FROM slides_satu WHERE id=$id";

        if ($conn->query($sql_delete) === TRUE) {
            // Jika penghapusan berhasil, redirect ke halaman beranda
            echo "<script>window.location.href = '?q=slide_satu';</script>";
            exit();
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    } else {
        echo "Data tidak ditemukan.";
        exit();
    }
}
