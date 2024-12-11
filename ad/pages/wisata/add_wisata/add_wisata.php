<?php
// Include file konfigurasi database
include './conf/conf.php';

// Periksa apakah formulir telah dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangkap nilai yang diinput melalui formulir
    $title = $_POST['title'];
    $sub_title = $_POST['sub_title'];
    $description = $_POST['description'];

    // Query untuk menambahkan data baru ke dalam tabel wisata
    $sql = "INSERT INTO wisata (title, sub_title, description) VALUES ('$title', '$sub_title', '$description')";

    if ($conn->query($sql) === TRUE) {
        // Jika data berhasil ditambahkan, redirect ke halaman beranda atau halaman lainnya
        echo "<script>window.location.href = '?q=wisata';</script>";
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>



<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Judul Section Wisata</h4>
                    <p class="card-description">Tambahkan Judul, Sub Judul, Deskripsi</p>
                    <form action="?q=add_wisata" method="POST">
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="sub_title">Subtitle:</label>
                            <input type="text" class="form-control" id="sub_title" name="sub_title" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>