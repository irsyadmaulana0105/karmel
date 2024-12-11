<!-- Tabel CRUD Kontak Informasi -->
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Judul Section Wisata</h4>
                    <p class="card-description"> Title, Subtitle, Description.
                    </p>
                    <div class="mb-3">
                        <a href="?q=add_wisata" class="btn btn-success">Tambah</a>
                    </div>
                    <table class="table table-hover">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Subtitle</th>
                                <th>Description</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">

                            <?php
                            include './conf/conf.php';
                            // Mendapatkan data dari tabel ContactInfo
                            $sql = "SELECT * FROM wisata";
                            $result = $conn->query($sql);

                            // Memeriksa apakah ada baris yang dikembalikan
                            if ($result->num_rows > 0) {
                                // Output data setiap baris
                                $counter = 1;
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <tr>
                                        <td><?php echo $counter; ?></td>
                                        <td><?php echo $row["title"]; ?></td>
                                        <td><?php echo $row["sub_title"]; ?></td>
                                        <td><?php echo $row["description"]; ?></td>
                                        <td>
                                            <a href="?q=edit_wisata&id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="?q=delete_wisata&id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</a>
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

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Card Wisata</h4>
                    <p class="card-description"> Judul, Deskripsi, Jumlah Klik.
                    </p>
                    <div class="mb-3">
                        <a href="?q=add_wisata_card" class="btn btn-success">Tambah</a>
                    </div>
                    <table class="table table-hover table-responsive">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Gambar</th>
                                <th>Jumlah Klik</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">

                            <?php
                            include './conf/conf.php';
                            // Mendapatkan data dari tabel ContactInfo
                            $sql = "SELECT * FROM rekomendasi_bitung";
                            $result = $conn->query($sql);

                            // Memeriksa apakah ada baris yang dikembalikan
                            if ($result->num_rows > 0) {
                                // Output data setiap baris
                                $counter = 1;
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <tr>
                                        <td><?php echo $counter; ?></td>
                                        <td><?php echo $row['kategori']; ?></td>
                                        <td><?php echo $row["nama"]; ?></td>
                                        <td><?php echo substr($row["deskripsi"], 0, 20); ?>..</td>
                                        <td><img src="<?php echo $row["gambar"]; ?>" alt="Gambar"></td>
                                        <td><?php echo $row["jumlah_klik"]; ?></td>
                                        <td>
                                            <a href="?q=edit_wisata_card&edit_id_card=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="?q=delete_wisata_card&delete_id_card=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</a>
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
    </div>
</div>