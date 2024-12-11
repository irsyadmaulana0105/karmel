<?php
// Include file konfigurasi database
include './conf/conf.php';

// Periksa apakah parameter id disertakan dalam URL dan apakah data dengan id tersebut ada dalam database
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data tentang kami berdasarkan id
    $sql_delete = "DELETE FROM about_us WHERE id = $id";

    if ($conn->query($sql_delete) === TRUE) {
        // Jika penghapusan berhasil, redirect kembali ke halaman about_us
        echo "<script>window.location.href = '?q=t_kami';</script>";
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    // Jika parameter id tidak disertakan dalam URL
    echo "ID tidak ditemukan.";
    exit();
}
