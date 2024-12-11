  <!-- Tabel CRUD Sosial Media -->
  <div class="content-wrapper">
      <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                  <div class="card-body">
                      <h4 class="card-title">Slide Satu</h4>
                      <p class="card-description"> Title, Subtitle, Image, Deskripsi
                      </p>
                      <div class="mb-3">
                          <a href="?q=addslide_satu" class="btn btn-success">Tambah Data</a>
                      </div>
                      <table class="table table-hover">
                          <thead class="text-center">
                              <tr>
                                  <th>No</th>
                                  <th>Image</th>
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
                                $sql = "SELECT * FROM slides_satu";
                                $result = $conn->query($sql);

                                // Memeriksa apakah ada baris yang dikembalikan
                                if ($result->num_rows > 0) {
                                    // Output data setiap baris
                                    $counter = 1;
                                    while ($row = $result->fetch_assoc()) {
                                ?>
                                      <tr>
                                          <td><?php echo $counter; ?></td>
                                          <td>
                                              <img src="<?php echo $row["image_path"]; ?>" alt="Image">
                                          </td>
                                          <td><?php echo $row["title"]; ?></td>
                                          <td><?php echo $row["subtitle"]; ?></td>
                                          <td><?php echo $row["description"]; ?></td>
                                          <td>
                                              <a href="?q=editslide_satu&id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                              <a href="?q=deleteslide_satu&id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</a>
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