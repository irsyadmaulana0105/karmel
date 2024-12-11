<?php
// Include file konfigurasi database
include './conf/conf.php';

// Periksa apakah formulir telah dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangkap nilai yang diinput melalui formulir
    $additional_info = $_POST['additional_info'];

    // Query untuk menambahkan data baru ke dalam tabel additional_info
    $sql = "INSERT INTO additional_info (text) VALUES ('$additional_info')";

    if ($conn->query($sql) === TRUE) {
        // Jika data berhasil ditambahkan, redirect ke halaman beranda atau halaman lainnya
        echo "<script>window.location.href = '?q=t_kami';</script>";
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
                    <h4 class="card-title">Tambah List</h4>
                    <p class="card-description">Tambahkan List</p>
                    <form action="?q=add_info" method="POST">
                        <div class="form-group">
                            <label for="additional_info">Tambahkan Info Tambahan:</label>
                            <input type="text" class="form-control" id="additional_info" name="additional_info" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>