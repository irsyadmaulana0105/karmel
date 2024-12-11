<!-- Tabel CRUD Kontak Informasi -->
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Kontak Informasi</h4>
                    <p class="card-description"> Email, Telp, Location.
                    </p>
                    <table class="table table-hover">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Location</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">

                            <?php
                        include './conf/conf.php';
                        // Mendapatkan data dari tabel ContactInfo
                        $sql = "SELECT * FROM contactinfo";
                        $result = $conn->query($sql);

                        // Memeriksa apakah ada baris yang dikembalikan
                        if ($result->num_rows > 0) {
                            // Output data setiap baris
                            $counter = 1;
                            while ($row = $result->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo $counter; ?></td>
                                <td><?php echo $row["email"]; ?></td>
                                <td><?php echo $row["phone_number"]; ?></td>
                                <td><?php echo $row["location"]; ?></td>
                                <td>
                                    <a href="?q=editkontakinf&id=<?php echo $row['id']; ?>"
                                        class="btn btn-primary btn-sm">Edit</a>
                                    <a href="?q=deletekontakinf&id=<?php echo $row['id']; ?>"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</a>
                                </td>
                            </tr>
                            <?php
                                $counter++;
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="4">Tidak ada data yang ditemukan</td>
                            </tr>
                            <?php
                        }
                        $conn->close();
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- End Tabel CRUD Kontak Informasi -->
    </div>
</div>