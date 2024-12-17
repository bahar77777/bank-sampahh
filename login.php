<?php
session_start();
include('db_connection.php');  // Menyertakan koneksi database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomor_rekening = $_POST['no_rekening'];
    $password = $_POST['password'];

    // Sanitasi input untuk mencegah SQL injection
    $nomor_rekening = mysqli_real_escape_string($conn, $nomor_rekening);
    $password = mysqli_real_escape_string($conn, $password);

    // Query untuk mengambil data user berdasarkan nomor rekening
    $sql = "SELECT * FROM nasabahz WHERE nomor_rekening = '$nomor_rekening'";
    $result = $conn->query($sql);

    // Cek apakah user ada
    if ($result->num_rows > 0) {
        // Ambil data user
        $user = $result->fetch_assoc();
        
        // Verifikasi password menggunakan password_verify()
        if (password_verify($password, $user['password'])) {
            // Password valid, login berhasil
            $_SESSION['id'] = $user['id'];
            $_SESSION['nomor_rekening'] = $user['nomor_rekening'];
            $_SESSION['nama'] = $user['nama'];
            $_SESSION['saldo'] = $user['saldo'];
            
            // Redirect ke halaman profil nasabah
            header("Location: profil_nasabah.php");
            exit();
        } else {
            echo "Kredensial login tidak valid.";
        }
    } else {
        echo "Kredensial login tidak valid.";
    }
}

$conn->close();
?>
