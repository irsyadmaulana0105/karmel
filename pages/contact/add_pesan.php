<?php
// Include file konfigurasi database
include './conf/conf.php';

// Periksa apakah formulir telah dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangkap nilai yang diinput melalui formulir
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    echo $name;
    // Query untuk menambahkan data baru ke dalam tabel Rekom
    $sql = "INSERT INTO pesan (id, name, email, phone, subject, message) VALUES ('', '$name', '$email', '$phone', '$subject', '$message')";

    if ($conn->query($sql) === TRUE) {
        // Jika data berhasil ditambahkan, redirect ke halaman beranda atau halaman lainnya
        echo "<script>Terima Kasih Masukan Anda !!!</script>";
        echo "<script>window.location.href = '?q=contact';</script>";
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
                    <h4 class="card-title">Tambah Judul Section Rekom</h4>
                    <p class="card-description">Tambahkan Judul, Sub Judul, Deskripsi</p>
                    <form action="?q=add_rekom" method="POST">
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
                        <?= $name ?>
                        <?= $email ?>
                        <?= $phone ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>