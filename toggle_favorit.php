<?php
session_start();
include 'connect.php';

$user_id = $_SESSION['user_id'];
$film_id = $_POST['film_id'];

$stmt = $conn->prepare("SELECT * FROM favorit WHERE user_id = ? AND film_id = ?");
$stmt->bind_param("ii", $user_id, $film_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Hapus dari favorit
    $stmt = $conn->prepare("DELETE FROM favorit WHERE user_id = ? AND film_id = ?");
    $stmt->bind_param("ii", $user_id, $film_id);
    $stmt->execute();
} else {
    // Tambah ke favorit
    $stmt = $conn->prepare("INSERT INTO favorit (user_id, film_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $user_id, $film_id);
    $stmt->execute();
}

header("Location: detail.php?id=$film_id"); // kembali ke halaman film
exit();
