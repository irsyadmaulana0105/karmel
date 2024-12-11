<?php
include './conf/conf.php';

// Periksa apakah parameter id disertakan dalam URL
if (isset($_GET['id'])) {
    // Tangkap nilai id dari URL
    $id = $_GET['id'];

    // Query untuk menghapus data kontak berdasarkan id
    $sql = "DELETE FROM socialmedia WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // Jika penghapusan berhasil, redirect ke halaman beranda
        echo "<script>window.location.href = '?q=sosialmedia';</script>";
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "ID tidak ditemukan dalam URL.";
    exit();
}
