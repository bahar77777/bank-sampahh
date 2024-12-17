<?php
session_start();
include 'config.php'; // File koneksi database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $no_rekening = $_POST['no_rekening'];
    $password = $_POST['password'];

    // Validasi login menggunakan No Rekening
    $query = "SELECT * FROM nasabah_bank_sampah WHERE No_rekening = '$no_rekening' AND No_rekening = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $_SESSION['No_rekening'] = $no_rekening; // Simpan No Rekening di session
        header('Location: profil_nasabah.php'); // Redirect ke halaman profil
        exit();
    } else {
        echo "<script>alert('Login gagal! No Rekening salah.');</script>";
    }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Sampah</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }
        .container {
            background-color: white;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        .container h1 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }
        .container input[type="text"],
        .container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .container button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            font-size: 16px;
        }
        .container .links {
            display: flex;
            justify-content: space-between;
        }
        .container a {
            color: #007bff;
            text-decoration: none;
        }
        .container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bank Sampah</h1>
        <form method="POST" action="">
            <label for="no_rekening">No Rekening:</label>
            <input type="text" name="no_rekening" placeholder="Masukkan No Rekening" required>
            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="Masukkan Password" required>
            <button type="submit">Login</button>
        </form>
        <div class="links">
            <a href="SignUp.html">Sign up</a>
            <a href="#">Forgot Password</a>
        </div>
    </div>
</body>
</html>
