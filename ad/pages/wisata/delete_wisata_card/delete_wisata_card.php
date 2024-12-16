<?php
include './conf/conf.php';


// Proses delete data tempat wisata
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['delete_id_card'])) {
    $delete_id = $_GET['delete_id_card'];

    // Hapus gambar terlebih dahulu
    $sql_select_image = "SELECT gambar FROM rekomendasi_bitung WHERE id='$delete_id'";
    $result_select_image = $conn->query($sql_select_image);
    if ($result_select_image->num_rows > 0) {
        $row_image = $result_select_image->fetch_assoc();
        $image_path = $row_image['gambar'];
        unlink($image_path); // Hapus gambar dari direktori
    }

    // Hapus data dari database
    $sql_delete = "DELETE FROM rekomendasi_bitung WHERE id='$delete_id'";
    if ($conn->query($sql_delete) === TRUE) {
        // Redirect ke halaman lain jika proses berhasil
        echo "<script>window.location.href = '?q=wisata';</script>";
    } else {
        // Redirect ke halaman lain jika terjadi kesalahan
        echo "<script>window.location.href = '?q=wisata';</script>";
    }
    $conn->close();
}
