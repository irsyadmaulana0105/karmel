<?php
// Mulai session
session_start();

// Hapus semua session
session_unset();

// Hancurkan session
session_destroy();

// Redirect ke halaman login
header("Location: index.php");
exit();
