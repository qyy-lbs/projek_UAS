<?php
$host = "localhost:3306"; // default XAMPP host
$user = "root"; // default XAMPP user
$pass = "";     // default XAMPP password (kosong)
$db   = "review_db"; // nama database kamu

$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>

