<?php
include '../conf/conf.php';

session_start();

// Periksa apakah pengguna sudah login
if (isset($_SESSION["user_id"])) {
    // Jika sudah, redirect ke halaman dashboard.php.php
    header("Location: ../dashboard.php");
    exit();
}

// Proses login
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    // Escape input user untuk mencegah SQL Injection
    $username = $conn->real_escape_string($_POST["username"]);
    $password = $conn->real_escape_string($_POST["password"]);

    // Query untuk mencari pengguna dengan username yang cocok
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            // Masukkan data pengguna ke dalam session
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["username"] = $row["username"];
            $_SESSION["role"] = $row["role"];

            // Redirect ke halaman sesuai peran
            if ($row["role"] == "admin") {
                header("Location: ../dashboard.php");
            } else {
                header("Location: ../dashboard.php");
            }
            exit();
        } else {
            header("Location: ../login.php?false=true");
            $error = "Password salah";
        }
    } else {
        $error = "Username tidak ditemukan";
        header("Location: ../login.php?false=true");
    }
    $conn->close();
}
