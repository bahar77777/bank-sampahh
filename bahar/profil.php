<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}
?>

<h2>Profil Admin</h2>
<p>Selamat datang, <?php echo $_SESSION['nama']; ?>!</p>
<p>Role: <?php echo $_SESSION['role']; ?></p>
<a href="logout.php">Logout</a>
