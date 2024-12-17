<?php
$servername = "localhost";
$username = "root";  // Username phpMyAdmin Anda
$password = "";      // Password phpMyAdmin Anda (kosong jika tidak ada)
$dbname = "bank_sampahh";  // Nama database

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
