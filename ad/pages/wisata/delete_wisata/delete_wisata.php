<?php
// Include file konfigurasi database
include './conf/conf.php';

// Periksa apakah parameter id disertakan dalam URL
if (isset($_GET['id'])) {
    // Tangkap nilai id dari URL
    $id = $_GET['id'];

    // Query untuk menghapus data wisata berdasarkan id
    $sql = "DELETE FROM wisata WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // Jika penghapusan berhasil, redirect ke halaman wisata
        echo "<script>window.location.href = '?q=wisata';</script>";
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
