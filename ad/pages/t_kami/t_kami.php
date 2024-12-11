<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tentang Kami</h4>
                    <p class="card-description"> Images, Title, Subtitle, Deskripsi, Points
                    </p>
                    <div class="d-flex justify-content-end mb-3">
                        <a href="?q=addt_kami" class="btn btn-success">Tambah</a>
                    </div>
                    <table class="table table-hover table-responsive">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Image 1</th>
                                <th>Image 2</th>
                                <th>Title</th>
                                <th>Subtitle</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">

                            <?php
                            include './conf/conf.php';
                            // Mendapatkan data dari tabel ContactInfo
                            $sql = "SELECT * FROM about_us";
                            $result = $conn->query($sql);

                            // Memeriksa apakah ada baris yang dikembalikan
                            if ($result->num_rows > 0) {
                                // Output data setiap baris
                                $counter = 1;
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <tr>
                                        <td><?php echo $counter; ?></td>
                                        <td><img src="<?php echo $row["image_1_path"]; ?>" alt="Image 1" style="max-width: 100px;"></td>
                                        <td><img src="<?php echo $row["image_2_path"]; ?>" alt="Image 2" style="max-width: 100px;"></td>
                                        <td><?php echo $row["sub_title"]; ?></td>
                                        <td><?php echo $row["title"]; ?></td>
                                        <td><?php echo substr($row["description"], 0, 20); ?>..</td>
                                        <td>
                                            <a href="?q=editt_kami&id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="?q=deletet_kami&id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</a>
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


    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Points</h4>
                    <p class="card-description"> Point-Point
                    </p>
                    <div class="d-flex justify-content-end mb-3">
                        <a href="?q=add_info" class="btn btn-success">Tambah</a>
                    </div>
                    <table class="table table-hover">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>List</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">

                            <?php
                            include './conf/conf.php';
                            // Mendapatkan data dari tabel ContactInfo
                            $sql = "SELECT * FROM additional_info";
                            $result = $conn->query($sql);

                            // Memeriksa apakah ada baris yang dikembalikan
                            if ($result->num_rows > 0) {
                                // Output data setiap baris
                                $counter = 1;
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <tr>
                                        <td><?php echo $counter; ?></td>
                                        <td><?php echo substr($row["text"], 0,20); ?></td>
                                        <td>
                                            <a href="?q=edit_info&id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="?q=delete_info&id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</a>
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