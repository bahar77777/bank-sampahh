<?php
$host = "localhost";
$user = "root";
$password = ""; // Password MySQL Anda (kosong jika default)
$database = "bank_sampah";

// Membuat koneksi
$conn = new mysqli($host, $user, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
