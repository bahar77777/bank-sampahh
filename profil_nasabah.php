<?php
session_start(); // Mulai sesi

// Cek jika pengguna belum login
if (!isset($_SESSION['no_rekening'])) {
    header("Location: login.html");
    exit();
}

include 'koneksi.php'; // Koneksi database

$no_rekening = $_SESSION['no_rekening'];

// Query untuk ambil data nasabah
$query = "SELECT * FROM nasabah WHERE no_rekening = '$no_rekening'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);
} else {
    echo "Data tidak ditemukan.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Nasabah</title>
</head>
<body>
    <h1>Selamat Datang, <?php echo $data['nama']; ?></h1>
    <p>Nomor Rekening: <?php echo $data['no_rekening']; ?></p>
    <p>Setoran Sampah: <?php echo $data['setoran']; ?> kali</p>
    <p>Total Sampah: <?php echo $data['total_sampah']; ?> kg</p>
    <p>Saldo: Rp <?php echo number_format($data['saldo'], 0, ',', '.'); ?></p>
</body>
</html>
