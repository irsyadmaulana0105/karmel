<?php
// Include file konfigurasi database
include './conf/conf.php';

// Periksa apakah parameter id disertakan dalam URL
if (isset($_GET['id'])) {
    // Tangkap nilai id dari URL
    $id = $_GET['id'];

    // Query untuk menghapus data rekom berdasarkan id
    $sql = "DELETE FROM rekom WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // Jika penghapusan berhasil, redirect ke halaman rekom
        echo "<script>window.location.href = '?q=rekom';</script>";
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
