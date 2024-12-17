<?php
include('db_connection.php');

// Ambil data dari form
$nomor_rekening = $_POST['no_rekening'];
$password = $_POST['password'];  // Password dari form

// Hash password sebelum disimpan ke database
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Query untuk menyimpan nasabah baru
$sql = "INSERT INTO nasabahz (nomor_rekening, password) VALUES ('$nomor_rekening', '$hashed_password')";

if ($conn->query($sql) === TRUE) {
    echo "Pendaftaran berhasil!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
