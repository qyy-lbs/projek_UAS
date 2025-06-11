<?php
require 'connect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $film_id = $_POST['film_id'];
    $user_id = $_POST['user_id']; // akan terisi karena kita kirim dari form
    $rating = $_POST['rating'];
    $ulasan = $_POST['ulasan']; // nama ini harus sama dengan name di <textarea>

    $stmt = $conn->prepare("INSERT INTO review (film_id, user_id, rating, ulasan, created_at) VALUES (?, ?, ?, ?, NOW())");
    $stmt->bind_param("iiis", $film_id, $user_id, $rating, $ulasan);

    if ($stmt->execute()) {
        header("Location: ulasan.php?id=$film_id");
        exit;
    } else {
        echo "Gagal menyimpan ulasan: " . $stmt->error;
    }
}
?>
