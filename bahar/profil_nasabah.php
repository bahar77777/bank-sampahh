<?php
session_start();
include 'config.php'; // Koneksi database

// Cek jika user sudah login
if (!isset($_SESSION['No_rekening'])) {
    header('Location: login.php');
    exit();
}

// Ambil No Rekening dari session
$no_rekening = $_SESSION['No_rekening'];

// Ambil data nasabah berdasarkan No Rekening
$query = "SELECT * FROM nasabah_bank_sampah WHERE No_rekening = '$no_rekening'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
} else {
    echo "Data nasabah tidak ditemukan.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nasabah Dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #0d1d39, #107892);
            color: white;
        }
        .dashboard {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .profile-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .profile-header img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 5px solid #f4c542;
        }
        .profile-header h1 {
            font-size: 2.5rem;
            margin: 10px 0 5px;
        }
        .profile-header h3 {
            font-weight: 400;
        }
        .stats {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin: 20px 0;
        }
        .stats .stat {
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            width: 120px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }
        .stats .stat h2 {
            font-size: 1.8rem;
            margin-bottom: 5px;
            color: #f4c542;
        }
        .stats .stat p {
            font-size: 1rem;
        }
        .actions {
            display: flex;
            gap: 20px;
            margin-top: 30px;
        }
        .actions a {
            background: #f4c542;
            color: #1e3c72;
            text-decoration: none;
            padding: 15px 25px;
            border-radius: 5px;
            font-weight: bold;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            transition: all 0.3s;
        }
        .actions a:hover {
            background: #ffb400;
            transform: scale(1.1);
        }
        footer {
            margin-top: 30px;
            text-align: center;
            font-size: 0.9rem;
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <div class="profile-header">
            <img src="https://via.placeholder.com/150" alt="Profile Picture">
            <h1>Selamat Datang</h1>
            <td><?php echo $data['Nama']; ?></td>
        </div>

        <div class="stats">
            <div class="stat">
                <h2>No Rekening</h2>
                <td><?php echo $data['No_rekening']; ?></td>
            </div>
            <div class="stat">
                <h2>Alamat</h2>
                <td><?php echo $data['Alamat']; ?></td>
            </div>
            <div class="stat">
                <h2>RT/RW</h2>
                <td><?php echo $data['RT']; ?></td>
            </div>
            <div class="stat">
                <h2>Kelurahan</h2>
                <td><?php echo $data['Kelurahan']; ?></td>
            </div>
            <div class="stat">
                <h2>Kecamatan</h2>
                <td><?php echo $data['Kecamatan']; ?></td>
            </div>
            <div class="stat">
                <h2>No Telepon</h2>
                <td><?php echo $data['No_Telp']; ?></td>
            </div>
        </div>

        <div class="actions">
            <a href="#">Tambah Setoran</a>
            <a href="#">Riwayat Transaksi</a>
            <a href="#">Edit Profil</a>
        </div>

        <footer>
            &copy; 2024 Bank Sampah. Semua Hak Dilindungi.
        </footer>
    </div>
</body>
</html>
