<?php
include './conf/conf.php';

// Periksa apakah parameter id disertakan dalam URL
if (isset($_GET['id'])) {
    // Tangkap nilai id dari URL
    $id = $_GET['id'];

    // Query untuk mendapatkan data kontak berdasarkan id
    $sql = "SELECT * FROM ContactInfo WHERE id = $id";
    $result = $conn->query($sql);

    // Periksa apakah data ditemukan
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $email = $row['email'];
        $phone_number = $row['phone_number'];
        $location = $row['location'];
    } else {
        echo "Data tidak ditemukan.";
        exit();
    }
}

// Periksa apakah parameter id disertakan dalam form
if (isset($_POST['id'])) {
    // Tangkap nilai id dari form
    $id = $_POST['id'];

    // Tangkap nilai yang diubah dari form
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $location = $_POST['location'];

    // Query untuk menyimpan perubahan ke database
    $sql = "UPDATE contactinfo SET email='$email', phone_number='$phone_number', location='$location' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        // Jika perubahan berhasil disimpan, redirect ke halaman beranda
        echo "<script>window.location.href = '?q=kontakinf';</script>";
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
                    <h4 class="card-title">Edit Informasi</h4>
                    <p class="card-description">Email, Telp, Location.</p>
                    <!-- Tampilkan form untuk edit data -->
                    <form action="?q=editkontakinf" method="POST">
                        <!-- Sertakan input hidden untuk menyimpan ID yang akan diedit -->
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Nomor Telepon:</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?php echo $phone_number; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="location">Lokasi:</label>
                            <input type="text" class="form-control" id="location" name="location" value="<?php echo $location; ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <a href="?q=beranda" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Tabel CRUD -->
    </div>
</div>