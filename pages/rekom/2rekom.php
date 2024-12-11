<?php
// Pastikan koneksi database sudah dilakukan sebelumnya
include './conf/conf.php';

$input_description = "pantai";

// Fungsi untuk menghitung cosine similarity antara dua vektor
function cosine_similarity($vec1, $vec2)
{
    // Hitung dot product
    $dot_product = 0;
    foreach ($vec1 as $key => $value) {
        $dot_product += $value * $vec2[$key];
    }

    // Hitung magnitude (panjang) dari masing-masing vektor
    $magnitude1 = 0;
    $magnitude2 = 0;
    foreach ($vec1 as $value) {
        $magnitude1 += $value * $value;
    }
    $magnitude1 = sqrt($magnitude1);

    foreach ($vec2 as $value) {
        $magnitude2 += $value * $value;
    }
    $magnitude2 = sqrt($magnitude2);

    // Hitung cosine similarity
    if ($magnitude1 == 0 || $magnitude2 == 0) {
        return 0; // Karena salah satu vektor memiliki magnitude nol, similarity adalah nol.
    } else {
        return $dot_product / ($magnitude1 * $magnitude2);
    }
}

// Fungsi untuk melakukan preprocessing pada teks
function preprocess($text)
{
    // Lakukan langkah-langkah preprocessing yang diperlukan di sini
    // Contoh sederhana: mengonversi teks menjadi huruf kecil dan membersihkan tanda baca
    $processed_text = strtolower($text);
    $processed_text = preg_replace("/[^a-zA-Z\s]/", "", $processed_text); // Hapus karakter selain huruf dan spasi
    return explode(" ", $processed_text); // Ubah teks menjadi array kata-kata
}

// Preprocess input description
$input_vector = preprocess($input_description);

$similarities = [];

// Query untuk mengambil data dari tabel tempat_wisata
$sql_wisata = "SELECT * FROM tempat_wisata";
$result_wisata = $conn->query($sql_wisata);

if (!$result_wisata) {
    echo "Error: " . $sql_wisata . "<br>" . $conn->error;
}

// Ambil data wisata dan hitung similarity
if ($result_wisata->num_rows > 0) {
    while ($w = $result_wisata->fetch_assoc()) {
        $vector = preprocess($w['deskripsi']);
        $similarity = cosine_similarity($input_vector, $vector);
        $similarities[$w['id']] = $similarity;
    }
}

// Sort similarities in descending order
arsort($similarities);

// Get the top 5 recommendations
$top_ids = array_slice(array_keys($similarities), 0, 5);

if (!empty($top_ids)) {
    $ids = implode(",", $top_ids);
    $sql_rekomendasi = "SELECT * FROM tempat_wisata WHERE id IN ($ids)";
    $result_rekomendasi = $conn->query($sql_rekomendasi);

    if ($result_rekomendasi->num_rows > 0) {
        while ($row = $result_rekomendasi->fetch_assoc()) {
            echo "Nama: " . $row["nama"] . " - Deskripsi: " . $row["deskripsi_full"] . "<br>";
        }
    }
}

$conn->close();
