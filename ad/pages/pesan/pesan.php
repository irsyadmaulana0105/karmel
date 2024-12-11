<!-- Tabel CRUD Kontak Informasi -->
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Pesan </h4>
                    <p class="card-description"> dari Public
                    </p>
                    <!-- <div class="mb-3">
                        <a href="?q=add_rekom" class="btn btn-success">Tambah</a>
                    </div> -->
                    <table class="table table-hover">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Subjek</th>
                                <th>Pesan</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">

                            <?php
                            include './conf/conf.php';
                            // Mendapatkan data dari tabel ContactInfo
                            $sql = "SELECT * FROM pesan ORDER by id DESC";
                            $result = $conn->query($sql);

                            // Memeriksa apakah ada baris yang dikembalikan
                            if ($result->num_rows > 0) {
                                // Output data setiap baris
                                $counter = 1;
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <tr>
                                        <td><?php echo $counter; ?></td>
                                        <td><?php echo $row["name"]; ?></td>
                                        <td><?php echo $row["email"]; ?></td>
                                        <td><?php echo $row["phone"]; ?></td>
                                        <td><?php echo $row["subject"]; ?></td>
                                        <td><?php echo $row["message"]; ?></td>
                                        <td><?php echo $row["date"]; ?></td>
                                        <!-- <td>
                                            <a href="?q=edit_rekom&id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="?q=delete_rekom&id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</a>
                                        </td> -->
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